<?php

namespace App\Http\Controllers\Message;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messageSend = Message::with('user')->where('sender_id', Auth::user()->id)->orderBy('created_at', 'asc')->get();
        $messageReceive = Message::with('user')->where('receiver_id', Auth::user()->id)->orderBy('created_at', 'asc')->get();

        return Inertia::render('Message/Index', [
            'messageSend' => $messageSend,
            'messageReceive' => $messageReceive,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Message::create([
            'sender_id' => $request->sender_id,
            'receiver_id' => $request->receiver_id,
            'messages' => $request->messages,
            'user_id' => Auth::user()->id,
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message, $id)
    {
        $messageRead = Message::where('sender_id', $id)->first();
        if ($messageRead !== null)
        {
            if ($messageRead->isRead == 0)
            {
                $messageRead->isRead = 1;
                $messageRead->save();
            }
        }

        $messageSend = Message::with('user')->where('sender_id', Auth::user()->id)->where('receiver_id', $id)->orderBy('created_at', 'asc')->distinct()->get();
        $messageReceive = Message::with('user')->where('receiver_id', Auth::user()->id)->where('sender_id', $id)->orderBy('created_at', 'asc')->distinct()->get();

        return Inertia::render('Message/Show', [
            'messageSend' => $messageSend,
            'messageReceive' => $messageReceive,
        ]);
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }

    public function contact(Request $request)
    {
        Message::create([
            'sender_id' => Auth::user()->id,
            'receiver_id' => $request->receiver_id,
            'messages' => $request->messages,
            'user_id' => Auth::user()->id,
        ]);
        return back();
    }
}
