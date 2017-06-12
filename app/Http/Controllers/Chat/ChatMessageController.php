<?php

namespace App\Http\Controllers\Chat;

use App\Events\Chat\MessageCreated;
use App\Http\Requests\Chat\StoreMessageRequest;
use App\Models\Chat\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatMessageController extends Controller
{
    public function index()
    {
    	$messages = Message::with(['user'])->latest()->limit(20)->get();

    	return response()->json($messages, 200);
    }

    public function store(StoreMessageRequest $request)
    {
    	$message = $request->user()->messages()->create([
    		'body' => $request->body
    	]);

        broadcast(new MessageCreated($message))->toOthers();

        return response()->json(null, 200);
    }
}
