<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Auth;

use Illuminate\Http\Request;

class contactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('contact.index',['contacts' => contact::all()]);
        return view('contact.index',['contacts' => Auth::user()->contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $validated = $request->validate([

            'phone' => [
                'required',
                'regex:/^(01)[0-2,5]{1}[0-9]{8}$/',
                'max:11',
                'unique:contact'
              ]
        ]);

    // dd(Auth::user()->name);
        //store in DB
        $contact = new Contact();
        $contact->phone = $request->post('phone');
        $contact->user_id = Auth::id();
        $contact->save();

        //Redirect
        return redirect()->route('contacts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        // $contact = Contact::find($id);

        return view('edit', ['contact' => $contact]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        // if ($request->user()->cannot('update', $post)) {
        //     abort(403);
        // }
        $this->authorize('update', $contact);
        return view ('contact.edit' , ['contact'=>$contact]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        // $contact = Contact::find($id);

        $validated = $request->validate([

            'phone' => [
                'required',
                'regex:/^(01)[0-2,5]{1}[0-9]{8}$/',
                'max:11',
                'unique:contact'
                ]
            ]);

        $contact->phone = $request->post('phone');

        $contact->save();

        return \redirect('/contacts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id)->delete();

        return redirect()->back();
    }
}