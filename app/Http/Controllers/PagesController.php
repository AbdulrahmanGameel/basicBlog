<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //


    public function index()
    {
        $header="Man's not hot";
        return view('pages.index',compact('header'));
    }
    public function about()
    {
        return view('pages.about');
    }
    public function services()
    {
        $data = array('title' => 'services','services'=>['Web Design','Programming','SEO'] );
        return view('pages.services')->with($data);
    }










    
    public function user($age,$name) {
        return "the user name is $name and his is $age years old";
    }
}
