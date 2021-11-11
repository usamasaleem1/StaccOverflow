<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function questionVotes()
    {
        return $this->hasMany(QuestionVote::class);
    }

    public function questionComments()
    {
        return $this->hasMany(QuestionComment::class);
    }

    public function getTotalLikes(): int
    {
        $questions = $this->questions;
        $likes     = 0;

        foreach ($questions as $question) {
            $votes = $question->questionVotes;

            foreach ($votes as $vote) {
                if ($vote->type == QuestionVote::UPVOTE)
                    $likes++;
            }
        }

        return $likes;
    }

    public function getTotalDislikes()
    {
        $questions = $this->questions;
        $dislikes  = 0;

        foreach ($questions as $question) {
            $votes = $question->questionVotes;

            foreach ($votes as $vote) {
                if ($vote->type == QuestionVote::DOWNVOTE)
                    $dislikes++;
            }
        }

        return $dislikes;
    }

    public function getLocation()
    {
        $str = $this->location == "127.0.0.1" ? "Milky Way Galaxy" : $this->location;


        return $str;
    }
}
