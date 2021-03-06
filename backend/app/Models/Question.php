<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function questionVotes()
    {
        return $this->hasMany(QuestionVote::class);
    }

    public function questionComments()
    {
        return $this->hasMany(QuestionComment::class);
    }
}
