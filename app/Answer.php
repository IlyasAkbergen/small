<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'message', 'question_id', 'user_id'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
