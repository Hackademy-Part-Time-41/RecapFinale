<?php

namespace App\Http\Controllers;

use App\Mail\FeedbackMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function home(){
        return view('homepage');
    }

    public function esempio($primo ,$secondo = 'Default'){
        // dd(compact('primo','secondo'));
        return view('prova',compact('primo','secondo'));
    }

    public function feedback(){
        return view('feedback');
    }

    public function feedbackSend(Request $request){
        // dd($request->all());

        Mail::to('admin@example.com')->send(new FeedbackMail($request->name,$request->text));
        return redirect()->back()->with('success','Feedback inviato correttamente!');
    }
}
