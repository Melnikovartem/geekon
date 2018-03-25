<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        // список контактов
        $contacts = Contact::all();

        return view('index', ['contacts' => $contacts]);
    }

    public function details($id)
    {
        $contact = Contact::findOrFail($id);
        return view('details', ['contact' => $contact]);
    }

    public function addForm()
    {
        return view('add');
    }

    public function add(Request $request)
    {
        // проверяем, что все обязательные поля на месте
        // https://laravel.com/docs/5.6/validation
        $request->validate([
            'name' => 'required',
            'email' => 'email',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->job = $request->job;
        $contact->comment = $request->comment;
        $contact->email = $request->email;
        // сохраняем изменения в бд - создает новую запись
        $contact->save();

        return redirect('/');
    }

    public function editForm($id)
    {
        $contact = Contact::findOrFail($id);
        return view('edit', ['contact' => $contact]);
    }

    public function edit($id, Request $request)
    {
        // проверяем, что все обязательные поля на месте
        // https://laravel.com/docs/5.6/validation
        $request->validate([
            'name' => 'required',
            'email' => 'email',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->name = $request->name;
        $contact->job = $request->job;
        $contact->comment = $request->comment;
        $contact->email = $request->email;
        // сохраняем изменения в бд - создает новую запись
        $contact->save();

        return redirect('/contact/'.$id.'');
    }

    public function delete($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect('/');
    }
}
