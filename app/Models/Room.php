<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'id', 'name', 'known_language', 'foreign_language', 'max_players', 'created_by', 'status', 'game_mode'
    ];

    public function known_lang() {
        return $this->hasOne('App\Models\Language', 'id', 'known_language');
    }

    public function foreign_lang() {
        return $this->hasOne('App\Models\Language', 'id', 'foreign_language');
    }

    public function created_by_user() {
        return $this->hasOne('App\User', 'id','created_by');
    }
}
