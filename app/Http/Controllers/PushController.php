<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PushController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        DB::table('push_subscriptions')->insert([
            'endpoint' => $data['endpoint'],
            'public_key' => $data['keys']['p256dh'],
            'auth_token' => $data['keys']['auth'],
            'content_encoding' => $data['contentEncoding'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['success' => true], 201);
    }
}
