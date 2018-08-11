<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['text', 'user_id',];

    /**
     * Get the user that have the message.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
