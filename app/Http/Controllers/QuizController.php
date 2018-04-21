<?php

namespace App\Http\Controllers;

use App\Models\Enums\GameMode;
use App\Models\Language;
use App\Models\Phrase;
use App\Models\Room;
use App\Models\Word;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\TranslateClient;

class QuizController extends Controller
{
    public function generateQuizQuestion(Request $request)
    {

        $tr = new TranslateClient($request->main_language, $request->foreign_language);
        $quiz_question = [];

        switch ($request->game_mode){
            case GameMode::TRANSLATE_W:
                $quiz_question['question'] = 'How can you translate the next word?';
                $quiz_question['word'] = Word::inRandomOrder()->limit(1)->first();
                $quiz_question['answer'] = $tr->translate($quiz_question['word']->word);

                $other_words = Word::inRandomOrder()->limit(3)->get();
                foreach ($other_words as $other_word){
                    $quiz_question['options'][] = $tr->translate($other_word->word);
                }
                $quiz_question['options'][] = $quiz_question['answer'];
                break;

            case GameMode::TRANSLATE_P:
                $quiz_question['question'] = 'Translate the next phrase:';
                $quiz_question['phrase'] = Phrase::inRandomOrder()->limit(1)->first();
                $quiz_question['answer'] = $tr->translate($quiz_question['phrase']->phrase);

                break;

            case GameMode::PICTURE:
                $quiz_question['question'] = 'Write down the object you see in this picture';
                $quiz_question['word'] = Word::inRandomOrder()->limit(1)->first();
                $quiz_question['answer'] = $tr->translate($quiz_question['word']->word);
                break;
        }

        return json_encode($quiz_question);
    }
}
