<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTweetRequest;
use App\Models\Tweet;
use Illuminate\Support\Facades\Auth;
class TweetController extends Controller
{
    function index()
    {
        $tweets = Tweet::query()
            ->where('parent_tweet_id', null)
            ->orderByDesc('created_at')
            ->limit(20)
            ->get();

        return view('index', compact('tweets'));
    }

    function view(Tweet $tweet)
    {
        return view('tweet.view', compact('tweet'));
    }

function store(StoreTweetRequest $request)
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'You must be logged in to post a tweet.');
    }

    $tweet = Auth::user()->tweets()->create($request->validated());

    if ($tweet->parentTweet()->exists()) {
        $tweet->baseTweet()->associate($tweet->parentTweet->base_tweet_id)->save();
    } else {
        $tweet->baseTweet()->associate($tweet)->save();
    }

    return redirect()->back();
}
}