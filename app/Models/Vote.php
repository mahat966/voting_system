<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'poll_id',
        'option_id'
    ];

    public function option()
    {
        return $this->belongsTo(Option::class);
    }

    public function poll ()
    {
        return $this->belongsTo(Poll::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
