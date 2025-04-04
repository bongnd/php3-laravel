<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController 
{
   public function showForm(){
        return view('form');
   }
   public function handelSubmit(Request $request){
        $name = $request->input('name');
        $age = $request->input('age');
        return view('kq',compact('name','age'));
   }
}
