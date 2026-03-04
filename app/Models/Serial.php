<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serial extends Model
{
    /** @use HasFactory<\Database\Factories\SerialFactory> */
    use HasFactory;

    public function phone()
    {
        return $this->belongsTo(Phone::class);
    }
}
