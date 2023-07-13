<?php

namespace App\Models;

use App\Models\Machine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Spare extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function machines() {
        return $this->belongsToMany(Machine::class);
    }
}
