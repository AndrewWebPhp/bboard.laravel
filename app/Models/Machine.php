<?php

namespace App\Models;

use App\Models\Spare;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Machine extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function spares() {
        return $this->belongsToMany(Spare::class)->withPivot('cnt');
    }
}
