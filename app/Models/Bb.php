<?php

namespace App\Models;

use App\Models\User;
use App\Models\Rubric;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bb extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'pic', 'content', 'price', 'user_id', 'rubric_id'];

    public function scopeExpensive($query) 
    {
        return $query->where('price', '>', 45000);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rubric()
    {
        return $this->belongsTo(Rubric::class);
    }
}
