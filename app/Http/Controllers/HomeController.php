<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function send(Request $request)
    {

        try{
        // validate data before send it to email

        $this->validate($request, [

            'name' => 'required|min:3',
            'email' => 'required|email',
            'subject' => 'required',

        ]);

        // set all this data in $data array to use it in email

        $data = array(

            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject

        );

        Mail::to('myemail@gmail.com')->send(new SendEmail($data));

        return redirect()->route('home')->with(['success' => 'E-mail Sent successfully']);

    }catch(\Exception $ex){
        
        return redirect()->route('home')->with(['error' => 'Somthing Went Wrong!']);
    }
    
    }

}
