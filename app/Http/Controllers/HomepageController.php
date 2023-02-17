<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $tweets = Tweet::with('user')->latest()->paginate(10);

        return view('home.index', [
            'tweets' => $tweets,
        ]);
    }
}
