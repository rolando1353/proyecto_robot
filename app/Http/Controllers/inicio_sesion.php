<?php

namespace App\Http\Controllers;

use App\Models\TreeTable_model;
use App\Models\User;
use Illuminate\Http\Request;

class inicio_sesion extends Controller
{
    public function index()
    {
    	$id = auth()->user()->id;
    	$id_parent = date('Ymd').$id;
    	/*if(auth()->user()->id_parent == null){
	    	$act = User::where('id',$id)->update(['id_parent' => $id_parent]);
    	}*/
    	//return $id;
    	$id_p = TreeTable_model::where('id_user',$id)->get('parent_id')->first();
    	if(empty($id_p)){
    		$node = TreeTable_model::create([
    			'name' => $id_parent,
    			'id_user' => $id,
    		]);
    	}

    	return view('dashboard');
    }
}
