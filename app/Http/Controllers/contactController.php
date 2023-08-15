<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;

use App\Models\UserInfo;

class contactController extends Controller
{
    public function getAllContacts()
    {
    
       $contacts = UserInfo::with('user')->get();

       return response()->json(['contacts' => $contacts]);
    }

    public function destroy ($id){

        $contact = Contact::findOrFail($id);
        $contact->delete();
    
        return response()->json(['message' => 'Contact deleted successfully']);
    }
}
