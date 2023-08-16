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
        return response()->json(['contacts' => $contacts]);
    }

    public function store(Request $request)
    {
      
        // $validator = Validator::make($request->all(), [
        //     'user_id' => 'required|integer', 
        //     'contact_name' => 'required|string',
        //     'contact_no' => 'required|string',
        //     'status' => 'required|string',
            
        // ]);

        // if ($validator->fails()) {
        //     return response(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
        // }
        

        $contact = new Contact([
            'userID' => $request->userId,
            'contactName' => $request->contactName,
            'contactNo' => $request->contactNo,
            'status' => $request->status,
            'createdBy'=>$request->createBy,
            'updatedBy'=>$request->updateBy,
        ]);

        $result = $contact->save();

        if($result){
             return response(['message' => 'Contact created successfully', 'contact' => $contact], 201);
        }else {
            return response(['message' => 'Faild to create']);
        }
       

          
    }

    public function updateContact(Request $request, $id)
    {
       
    
        $contact = Contact::find($id);
    
        if (!$contact) {
            return response(['message' => 'Contact not found'], 404);
        }
    
        $contact->userID = $request->userId;
        $contact->contactNo = $request->contactNo;
        $contact->contactName = $request->contactName;
        $contact->status = $request->status;
        $contact->createdBy = $request->createdBy;
        $contact->updatedBy = $request->updatedBy;        

    
        $result = $contact->save();
        if($result){
            return response(['message' => 'Contact updated successfully'], 200);
        }
        return response(['message' => 'Contact cannot update']);
    
        
    }

    public function destroy($id){

       print($id);
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
