<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactsController extends Controller
{
  
    public function create()
    {
        return view('contacts.create');
    }



     public function store(Request $request)
    {
          if(Auth::check()){


            $validatedData = $request->validate([
            'full_name' => 'required',
            'mobile_no' => 'required|numeric',
            'email' => 'required|email',
           ]);


             $contact = new Contact;

             $contact->full_name = $validatedData['full_name'];
             $contact->mobile_no = $validatedData['mobile_no'];
             $conract->email = $validatedData['email'];
             $contact->user_id =Auth::user()->id;

            if($contact->save()){
                return redirect()->route('contacts.show', ['user_id'=> $contact->id])
                ->with('success' , 'Contact created successfully');
            }
           
        }

    }



    public function show()
    {
        //
        if(Auth::check()){
        $contacts = contact::where('user_id', Auth::user()->id)->get();
        return view('contacts.show',['contacts' => $contacts]);
       }
       else{
        return view('auth.login');
       }
    }


    
}
