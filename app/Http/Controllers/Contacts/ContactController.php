<?php

namespace App\Http\Controllers\Contacts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
    	$contacts = Contact::all();
    	$birthdays = Contact::getNextBirthday();
    	return view('index')->with('contacts', $contacts)->with('birthdays', $birthdays);
    }

    public function form()
    {

    	return view('form');
    }

    public function save(ContactRequest $request)
    {
    	//dd($request);
    	$contact = new Contact();
    
    	$contact->first_name	= $request->firstName;
    	$contact->last_name		= $request->lastName;
    	$contact->email			= $request->email;
		$date = \DateTime::createFromFormat('d/m/Y', $request->date);
    	$contact->date			= $date->format('Y-m-d');
    	$contact->job			= $request->job;
    	$contact->company		= $request->company;
    	$contact->phone			= $request->phone;
    	$contact->cellphone		= $request->cellphone;
    	$contact->neighborhood	= $request->neighborhood;
    	$contact->city			= $request->city;
    	$contact->state			= $request->state;
    	$contact->obs			= $request->obs;
    	
    	if($contact->save())
    	{
            $request->session()->flash('alert-success', 'Contato cadastrado com sucesso!!');
    		return redirect('/inicio');
    	}
    }

    public function edit($id)
    {
    	$contact = Contact::find($id);
    	$date = \DateTime::createFromFormat('Y-m-d H:i:s', $contact->date);
    	return view('edit')->withContact($contact)->with('formatedDate', $date->format('d/m/Y'));
    }

    public function update(Request $request)
    {
    	$contact = Contact::find($request->contact_id);
    
    	$contact->first_name	= $request->firstName;
    	$contact->last_name		= $request->lastName;
    	$contact->email			= $request->email;
		$date = \DateTime::createFromFormat('d/m/Y', $request->date);
    	$contact->date			= $date->format('Y-m-d');
    	$contact->job			= $request->job;
    	$contact->company		= $request->company;
    	$contact->phone			= $request->phone;
    	$contact->cellphone		= $request->cellphone;
    	$contact->neighborhood	= $request->neighborhood;
    	$contact->city			= $request->city;
    	$contact->state			= $request->state;
    	$contact->obs			= $request->obs;
    	
    	if($contact->save())
    	{
            $request->session()->flash('alert-success', 'Contato '. $contact->first_name.' '.$contact->last_name .' alterado com sucesso!!');
    		return redirect('/inicio');
    	}
    }

    public function remove($id)
    {
    	$contact = Contact::find($id);
    	
    	if($contact->delete())
    	{
			\Session::flash('alert-danger', 'Contato '. $contact->first_name.' '.$contact->last_name .' removido com sucesso!!');
    		return redirect('/inicio');    	
    	}
    }
}
