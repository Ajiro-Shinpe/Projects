<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.Contact');
    }
    
    public function ContactForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
    
        Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);
    
        return redirect('/')->with('success', 'Your message has been sent successfully.');
    }
    public function viewContacts()
    {
        $Contacts = Contact::all();
        return view('frontend.Fetch_Contact', compact('Contacts'));
    }
        
    public function destroy($id) {
    $contact = Contact::find($id);
    if ($contact) {
        $contact->delete();
        return redirect()->route('admin.contacts')->with('success', 'Contact deleted successfully.');
    }
    return redirect()->route('admin.contacts')->with('error', 'Contact not found.');
}

}
