<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // عرض جميع البيانات
    public function index()
    {
        $contacts = Contact::all();

        return view('contacts.index', compact('contacts'));
    }

    // عرض صفحة إنشاء جديد
    public function create()
    {
        return view('contact');
    }

    // تخزين البيانات الجديدة
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'dob' => 'required|date',
            'message' => 'required|string',
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index')->with('success', 'تمت إضافة جهة الاتصال بنجاح');
    }

    // عرض صفحة التعديل
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    // تحديث البيانات
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'dob' => 'required|date',
            'message' => 'required|string',
        ]);

        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('success', 'تم تحديث بيانات جهة الاتصال');
    }

    // حذف البيانات
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'تم حذف جهة الاتصال بنجاح');
    }
}
