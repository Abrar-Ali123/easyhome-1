<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function adminIndex()
    {
        $contacts = Contact::all();

        return view('dashboard.contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contact');
    }

    public function adminUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|string',
            'note' => 'nullable|string',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($validatedData);

        return response()->json(['success' => true]);
    }

    public function store(Request $request)
    {
        // Validate the form input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'message' => 'required|string',
        ]);

        // Create the contact
        Contact::create($validatedData);

        // Redirect or show a success message
        return redirect()->back()->with('success', 'Contact added successfully!');
    }
}
