<?php

namespace App\Http\Controllers;
use App\Message;

use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function submit(Request $request){
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required'
      ]);

      // Create a new message
      $message = new Message;
      $message->name = $request->input('name');
      $message->email = $request->input('email');
      $message->message = $request->input('message');
      // Save message
      $message->save();

      //Redirect
      return redirect('/')->with('success', 'Message Sent');
    }
    public function getMessages(){
      $messages = Message::all();

      return view('messages')->with('messages', $messages);
    }
}
