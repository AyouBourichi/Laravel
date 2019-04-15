<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function showContacts(){
        $contacts = Contact::all();
        return view('contacts.show_contacts', ['contacts' => $contacts]);
    }

    public function updateContactForm($id){
        $contact = Contact::find($id);
        return view('contacts.update_contact', ['contact' => $contact]);
    }

    public function updateContact(){
        $contact = Contact::find(Input::get('contact_id'));
        $contact->civilite            = Input::get('civilite');
        $contact->nom                 = Input::get('nom');
        $contact->prenom              = Input::get('prenom');
        $contact->fonction            = Input::get('fonction');
        $contact->service             = Input::get('service');
        $contact->email               = Input::get('email');
        $contact->telephone           = Input::get('telephone');
        $contact->date_naissance      = date("Y-m-d H:i:s", strtotime(Input::get('date_naissance')));
        $contact->societe_nom         = Input::get('societe_nom');
        $contact->societe_adresse     = Input::get('societe_adresse');
        $contact->societe_code_postal = Input::get('societe_code_postal');
        $contact->societe_ville       = Input::get('societe_ville');
        $contact->societe_telephone   = Input::get('societe_telephone');
        $contact->societe_site_web    = Input::get('societe_site_web');
        $contact->save();
        Session::flash('alert-success', 'Le contact a été mis à jour avec succès..');
        return redirect()->route('update_contact_form', [$contact->id] );
    }

    public function storeContact(){
        $contact = new Contact();
        $contact->civilite            = Input::get('civilite');
        $contact->nom                 = Input::get('nom');
        $contact->prenom              = Input::get('prenom');
        $contact->fonction            = Input::get('fonction');
        $contact->service             = Input::get('service');
        $contact->email               = Input::get('email');
        $contact->telephone           = Input::get('telephone');
        $contact->date_naissance      = date("Y-m-d H:i:s", strtotime(Input::get('date_naissance')));
        $contact->societe_nom         = Input::get('societe_nom');
        $contact->societe_adresse     = Input::get('societe_adresse');
        $contact->societe_code_postal = Input::get('societe_code_postal');
        $contact->societe_ville       = Input::get('societe_ville');
        $contact->societe_telephone   = Input::get('societe_telephone');
        $contact->societe_site_web    = Input::get('societe_site_web');
        $contact->save();
        Session::flash('alert-success', 'Le contact à bien été enregistrée..');
        return redirect()->route('new_contact');
    }

    public function deleteContact($id){
        $contact = Contact::find($id);
        $contact->delete();
    }
}
