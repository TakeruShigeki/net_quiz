<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;
    protected $fillable = [
        'quiz_id',
        'answer',
        'answer_flag',
        'importance',
    ];
    public function quiz() {
        return $this->belongsTo(Quiz::class);
    }
}
