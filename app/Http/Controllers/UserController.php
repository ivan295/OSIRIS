<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
class UserController extends Controller
{
    public function index(){
    	$users = DB::table('users')
    	->join('type_users','type_users.id','=','users.idtipoUsuario')
    	->select('users.id','users.name','users.lastname','users.email','users.created_at','type_users.tipo_usuario as TipoUser')
        ->get();
    	return view('User.CreateUser',compact('users'));
    }

    public function store(Request $request){
    	
    	$request->validate([
    		'name' => 'required',
    		'lastname' => 'required',
    		'email' => 'required',
    		'password' => 'required',
    		'TipoUsuario' => 'required',
    		'genero' => 'required',
    	]);
    	$user = new User;
    	$user->name = $request->name;
    	$user->lastname = $request->lastname;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->idtipoUsuario = $request->TipoUsuario;
    	$user->genero = $request->genero;
    	$user->save();

    	return redirect('/User/index')->with('success','usuario creado con exito');

    	
    }

    public function show(){
    	$users = DB::table('users')
    	->join('type_users','type_users.id','=','users.idtipoUsuario')
    	->select('users.id','users.name','users.lastname','users.email','users.created_at','type_users.tipo_usuario as TipoUser')
        ->get();
    	return view('User.CreateUser',compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);
         // dd($user);
         return view('User.edituser', compact('user'));
    }

}
