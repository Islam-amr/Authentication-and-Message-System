<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\User;

use Illuminate\Support\Facades\Auth;


class MessagesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $messages = Message::with('userFrom')->where('user_id_to', Auth::id())->get();
        //dd($messages);
        return view('home')->with('messages',$messages);
    }
    public function create (int $id = 0 , String $subject = '')
    {
        if($id === 0){
            $users = User::where('id','!=',Auth::id())->get();
        }else{
            $users = User::where('id',$id)->get();
        }
        if($subject !== '') $subject = 'Re: ' .$subject;
        return view('create')->with(['users'=>$users,'subject'=>$subject]);
    }
    public function send (Request $request)
    {
        $this->validate($request,[
            'subject' => 'required',
            'message' => 'required'
        ]);
        $messages = new Message () ;
        $messages->user_id_from = Auth::id();
        $messages->user_id_to = $request->input('to');
        $messages->subject = $request->input('subject');
        $messages->body= $request->input('message');
        $messages->save();

        return redirect()->to('/home')->with('status','Message Sent Successfully !');
    }
    public function sent ()
    {
        $messages = Message::with('userTo')->where('user_id_from',Auth::id())->get();
        return view('sent')->with('messages',$messages);
    }
    public function read (int $id)
    {
        $messages = Message::with('userFrom')->findOrfail($id);
        return view('read')->with('messages',$messages);
    }
}
