<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Tweet;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Tweet $tweet)
    {
        Like::create([
            'tweet_id'=>$tweet->id
        ]);

        return redirect(url()->previous());
    }


}
