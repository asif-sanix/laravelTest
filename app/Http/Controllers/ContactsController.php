<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactsController extends Controller
{
  

   public function index()
    {
       
        if(Auth::check()){
        $contacts = Contact::where('user_id', Auth::user()->id)->get();
        return view('contacts.index',['contacts' => $contacts]);
       }
       else{
        return view('auth.login');
       }
    }

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
            'contact_email' => 'required|email',
           ]);


             $contact = new Contact;
             $contact->user_id = Auth::user()->id;
             $contact->full_name = $validatedData['full_name'];
             $contact->mobile_no = $validatedData['mobile_no'];
             $contact->contact_email = $validatedData['contact_email'];
            if($contact->save()){
                return redirect()->route('contacts.index')
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


    public function destroy(Contact $contact)
    {
        //
        $findContact = Contact::find( $contact->id);
        if($findContact->delete()){
            
            //redirect
            return redirect()->route('contacts.index')
            ->with('success' , 'Contact deleted successfully');
        }
        return back()->withInput()->with('error' , 'Contact could not be deleted');
    }


    
}
