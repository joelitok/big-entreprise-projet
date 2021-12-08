<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    //
    // Store Contact Form data
public function ContactUsForm(Request $request) {

        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'subject'=>'nullable',
            'message' => 'required'
         ]);

        //Store data in database
        Contact::create($request->all());
        
     
  //  Send mail to admin
  Mail::send('mail', array(
    'name' => $request->get('name'),
    'email' => $request->get('email'),
    'phone' => $request->get('phone'),
    'subject' => $request->get('subject'),
    'user_query' => $request->get('message'),
), function($message) use ($request){
    $message->from($request->email);
    $message->to('joelnkouatchet1995@gmail.com', 'Admin')->subject($request->get('subject'));
});


return back()->with('status', 'Nous avons bien reçu votre message  et nous vous remercions de nous avoir écrit.');
    
}
    
}
