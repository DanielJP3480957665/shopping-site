<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create(){
        return view('contact.create');
    }
    
    public function store(ContactFormRequest $request) {
        $data =[
            
        'name' => $request->get('name'),
        'email'=> $request->get('email'),
      'massage'=> $request->get('message'),
            
    ];
    
    \Mail::send('emails.contact',$data,function ($message)
    {
        $massage->from(env('MAIL_FROM'));
        $massage->to(env('MAIL_FROM'),env('MAIL_NAME'));
        $massage->subject('WeDewLawns.com Inquiry');
    });
    
    return \Redirect::route('contact')
    ->with('massage','thanks for contacting us');
    
    }
    
}
