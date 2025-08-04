<?php

namespace App\Http\Controllers;

use App\Models\Muser;
use Illuminate\Http\Request;

class MuserController extends Controller
{
    public function get_all_user()
    {
        $user=Muser::all();
        return response()->json($user);
    }
    public function create_user(Request $request)
    {
        $newuser=Muser::create($request->all());
        $name=$request->name;

        return response()->json($newuser);
    }
    public function delete_user(Request $request,$id)
    {
        $newuser=Muser::find($id);
        $newuser->delete();
        $res=[
            "meesage"=> "deleted succesufully",
            "status"=>200,
            "data"=>$newuser,
        ];
        return response()->json($res);
    }
}
