<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function index(){
        return view('index');
    }
    public function authenticate(Request $request){
        $info = $request->validate([
            'email'=>['required','email'],
            'password'=>['required'],
        ]);
        if($request->email=='admin@gmail.com' && $request->password=='admin'){
            return redirect()->route('back');
        }
        else{
            $iduser = DB::table('users')->select('iduser')
            ->where('emailuser','=', $request->email)
            ->where('mdpuser','=', $request->password)
            ->get();
        if(count($iduser)==1){
        $array = json_decode($iduser,true);
        $id = $array[0]['iduser'];
        Session::put('iduser',$id);
        // session()->save();
        $ida = session('iduser');
        return redirect()->route('front')->with('mot',$ida);
    }
        }
         return redirect()->back()->withErrors('erreur');
    }
}
