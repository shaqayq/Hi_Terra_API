<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\contact;

use App\Models\UserInfo;

class contactController extends Controller
{
    public function getAllContacts()
    {
    
        $contacts = Contact::select('contact.*', 'user_info.email', 'user_info.address', 'user_info.mobileNo' )
        ->join('user_info', 'contact.userID', '=', 'user_info.userID')
        ->get();

       return response()->json(['contacts' => $contacts]);
    }

    public function getContactDetail($id){

        $contacts = Contact::select('contact.*', 'user_info.email', 'user_info.address', 'user_info.mobileNo' )
        ->join('user_info', 'contact.userID', '=', 'user_info.userID')
        ->where('contact.id',$id)
        ->first();
        return response()->json($contacts);
    }

    public function destroy($id){

       
        $contact = Contact::findOrFail($id);
        $result =   $contact->delete();
        if($result){
         
              return response()->json(['message' => 'Contact deleted successfully']);
             
        }
        else {
            return response()->json(['message' => 'Contact not found'] , 404);
        }
     
    
      
    }
}
