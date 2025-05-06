<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ], [
            'email.unique' => 'এই ইমেইলটি ইতিমধ্যেই সাবস্ক্রাইব করা হয়েছে।',
        ]);

        Subscriber::create([
            'email' => $request->email
        ]);

        return back()->with('success', 'আপনি সফলভাবে সাবস্ক্রাইব করেছেন!');
    }
}
