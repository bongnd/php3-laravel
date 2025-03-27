<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
public function list(){
  $list= DB::table('users')->join('phongban', 'users.phongban_id','=', 'phongban.id')
  ->select('users.id', 'users.name', 'users.phongban_id','users.email', 'phongban.ten_donvi')->get();
  return view('users/list-users', compact('list'));
}
public function addUser(){
  $phongban= DB::table('phongban')->select('id','ten_donvi')->get();
    return view('users/add-users', compact('phongban'));
}
public function store(Request $req){
  $data=[
    'name'=> $req->name,
    'email'=> $req->email,
    'phongban_id'=> $req->phongban_id,
    'tuoi'=> $req->tuoi,
      'created_at'=> Carbon::now(),
      'updated_at'=> Carbon::now(),
  ];
  DB::table('users')->insert($data);
  return redirect()->route('users.list-users');
}
public function delete($id){
  DB::table('users')->where('id', $id)->delete();
  return redirect()->route('users.list-users');

}
}
