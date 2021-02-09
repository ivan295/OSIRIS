<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
class DatatableController extends Controller
{
    public function user(){
    	// $users = DB::table('users')
    	// ->join('type_users','type_users.id','=','users.idtipoUsuario')
    	// ->select('users.*','type_users.tipo_usuario as TipoUser')
    	// ->get();

    	// return datatables()->of($users)->toJson();
    }
}
