<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //home
    public function home(){
        return view('user.home.home');
    }

    //about
    public function about(){
        return view('user.about');
    }

    //service
    public function service(){
        return view('user.service');
    }

    //blogs
    public function blogs(){
        return view('user.blog.blog');
    }

    //singleBlog
    public function singleBlog(){
        return view('user.blog.single-blog');
    }

    //rooms
    public function rooms(){
        return view('user.pages.rooms');
    }

    //element
    public function element(){
        return view('user.pages.elements');
    }

    //contact
    public function contact(){
        return view('user.contact');
    }
}
