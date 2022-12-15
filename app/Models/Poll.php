<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'questions',
        'opens',
        'closes'

    ];

    Public function scopeActive($query)
    {
        return $query->where('opens', '<=', Carbon::now())
            ->where('closes', '>=', Carbon::now());
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function vote()
    {
        return $this->hasOne(Vote::class);
    }
}
