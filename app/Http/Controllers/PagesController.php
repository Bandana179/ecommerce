<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomUser;

class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }
    public function about(){
        return view('pages.about');
    }
    public function userDashboard(){
        return view('pages.userDashboard');
    }
    public function adminDashboard(){
        $data = ['LoggedUserInfo'=>CustomUser::where('id','=',session('LoggedUser'))->first()];
        // return $data;
        return view('pages.adminDashboard',$data);
    }
    
}
