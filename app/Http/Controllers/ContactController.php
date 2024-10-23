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

    public function createPage1()
    {
        return view('contact', ['source' => 'page1']);
    }

    public function createPage2()
    {
        return view('contact', ['source' => 'page2']);
    }

    public function store(Request $request)
    {

        $validatedData['updated_by'] = auth()->user()->id;

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'message' => 'required|string',
            'source' => 'required|string',

        ]);

        Contact::create($validatedData);

        return redirect()->back()->with('success', 'تم إرسال رسالتك بنجاح.');
    }

    public function adminUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|string',
            'note' => 'nullable|string',
        ]);

        $contact = Contact::findOrFail($id);
        $validatedData['updated_by'] = auth()->user()->id;

        $contact->update($validatedData);

        return response()->json(['success' => true]);
    }
}
