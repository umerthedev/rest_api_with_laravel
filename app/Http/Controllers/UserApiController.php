<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserApiController extends Controller
{
   public function showUser($id=null){

     if($id==''){
        $users = User::get();
        return response()->json(['users'=>$users],200);
     }else{
        $users = User::find($id);
        return response()->json(['users'=>$users],200);
     }
     
   }
   public function addUsers(Request $request){
      if($request->ismethod('post')){
         $data = $request->all();
         // return $data;
         $rules = [
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
         ];
         $customMessage =[
            'name.required'=>'Name is required',
            'email.required'=>'Email is required',
            'email.email'=>'Valid Email is required',
            'email.unique'=>'Email already exists',
            'password.required'=>'Password is required',
            'password.min'=>'Password must be at least 6 characters',
         
         ];
         $validator = Validator::make($data,$rules,$customMessage);

         if($validator->fails()){
            return response()->json(['error'=>$validator->errors()],401);
         }         
         $user = new User;
         $user->name = $data['name'];
         $user->email = $data['email'];
         $user->password = bcrypt($data['password']);
         $user->save();
         $message = 'User Added Succesfully';
         return response()->json(['message'=>$message],201);
      }
      
   }
}
