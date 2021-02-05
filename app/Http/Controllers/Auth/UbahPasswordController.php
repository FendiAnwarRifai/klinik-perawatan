<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Validator;
use App\User;
use Alert;
class UbahPasswordController extends Controller
{
  /**
  * @return mixed
  */
 public function change()
 {
     return view('auth.passwords.change');
 }

 /**
  * @return mixed Redirect
  */
 public function update()
 {
     // custom validator
     Validator::extend('password', function ($attribute, $value, $parameters, $validator) {
         return Hash::check($value, \Auth::user()->password);
     });

     // message for custom validation
     $messages = [
         'password' => 'Invalid current password.',
     ];

     // validate form
     $validator = Validator::make(request()->all(), [
         'current_password'      => 'required|password',
         'password'              => 'required|min:5|confirmed',
         'password_confirmation' => 'required',

     ], $messages);

     // if validation fails
     if ($validator->fails()) {
         return redirect()
             ->back()
             ->withErrors($validator->errors());
     }

     // update password
     $user = User::find(Auth::id());

     $user->password = bcrypt(request('password'));
     $user->save();
     Alert::success('Password Berhasil Diubah','selamat')->persistent("OK");
     return redirect('/home');
 }
}
