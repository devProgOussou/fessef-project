<?php

namespace App\Http\Controllers\Message;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $userid = Auth::user()->id;
        $messsend = Message::with('user')->where('sender_id', Auth::user()->id)->get();

        $messreceiver = Message::with('user')->where('receiver_id', Auth::user()->id)->get();
        $users = Message::with('user')->where('receiver_id', Auth::user()->id)->where('user_id', '!=', Auth::user()->id)->get();

        return Inertia::render('Message/Index', [
            'users' => $users,
            'messsender' => $messsend,
            'messreceiver' => $messreceiver,
            'userid' => $userid,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

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
     * @param Message $message
     * @return RedirectResponse|Response|\Inertia\Response
     */
    public function show(Message $message, $id)
    {
        $messsend = Message::with('user')->where('sender_id', Auth::user()->id)->get();

        $messreceiver = Message::with('user')->where('receiver_id', Auth::user()->id)->where('statut', 1)->get();
        Message::where('sender_id', $id)->update(['isRead' => 1]);

        $userid = Auth::user()->id;
        $messages = Message::with('user')->where('statut', 1)->get();
        $users = Message::with('user')->where('user_id', '!=', Auth::user()->id)->get();

        return Inertia::render('Message/Show', [
            'messages' => $messages,
            'userid' => $userid,
            'users' => $users,
            'messsender' => $messsend,
            'messreceiver' => $messreceiver,
        ]);
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Message $message
     * @return Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Message $message
     * @return Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Message $message
     * @return Response
     */
    public function updatestatut(Message $message, $id)
    {
        Message::where('id', $id)->update(['statut' => 0]);
        return back();
    }
    public function destroy(Message $message, $id)
    {
        Message::where('id', $id)->delete();
        return back();
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
