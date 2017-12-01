<?php

namespace App\Http\Controllers;

use App\Category;
use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('admin');			//for administrator
        $this->middleware('auth'); 		//for operator
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($_GET['cat'])) {
            $cat = $_GET['cat'];
            $contentAll= Content::where('categories_id',$cat)->get();
            $contentMe= Content::where('categories_id',$cat)->where('users_id',Auth::id())->get();
        }else{
            $cat = "";
            $contentAll= Content::all();
            $contentMe= Content::where('users_id',Auth::id())->get();
        }

        $categories = Category::all();
        return view('dashboard/index')
					->with('title','Dashboard')
					->with('contentAll',$contentAll)
					->with('cate',$cat)
					->with('contentMe',$contentMe)
					->with('categories',$categories);
    }
}
