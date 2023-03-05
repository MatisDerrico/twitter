<?php

namespace App\Models;

use App\Models\Tweet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Like extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['tweet_id'];

    public function tweet()
    {
        return $this->belongsTo(Tweet::class);
    }
}


