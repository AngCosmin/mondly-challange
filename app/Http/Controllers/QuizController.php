<?php

namespace App\Http\Controllers;

use App\Models\Enums\GameMode;
use App\Models\Language;
use App\Models\Phrase;
use App\Models\Room;
use App\Models\Word;
use App\User;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\TranslateClient;

class QuizController extends Controller
{
    public function generateQuizQuestion(Request $request)
    {

        $translate_answers = new TranslateClient($request->main_language, $request->foreign_language);
        $translate_questions = new TranslateClient('en', $request->main_language);
        $quiz_question = [];

        switch ($request->game_mode){
            case GameMode::TRANSLATE_W:
                $word = Word::inRandomOrder()->limit(1)->first()->word;
                $quiz_question['question'] = $translate_questions->translate('How can you translate the next word?');
                $quiz_question['word'] = $translate_questions->translate($word);
                $quiz_question['answer'] = $translate_answers->translate($word);

                $other_words = Word::inRandomOrder()->limit(3)->get();
                foreach ($other_words as $other_word){
                    $quiz_question['options'][] = $translate_answers->translate($other_word->word);
                }
                $quiz_question['options'][] = $quiz_question['answer'];
                break;

            case GameMode::TRANSLATE_P:
                $phrase = Phrase::inRandomOrder()->limit(1)->first();
                $quiz_question['question'] = $translate_questions->translate('Translate the next phrase:');
                $quiz_question['phrase'] = $translate_questions->translate($phrase);
                $quiz_question['answer'] = $translate_answers->translate($quiz_question['phrase']->phrase);

                break;

            case GameMode::PICTURE:
                $word = Word::inRandomOrder()->limit(1)->first();
                $quiz_question['question'] = $translate_questions->translate(('Write down the object you see in this picture'));
                $quiz_question['answer'] = $translate_answers->translate($word->word);
                $quiz_question['picture'] = $word->piture;
                break;
        }

        return json_encode($quiz_question);
    }

    public function addPoints(Request $request){
        $user = User::find($request->user_id);
        $user->total_points += 5;
        $user->save();
    }
}
