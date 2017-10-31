<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategory;
use Illuminate\Contracts\Encryption\DecryptException;
use \Crypt;

class MasterCategoryController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
		return view('category/index')
					->with('title','Categories')
					->with('categories',$categories);	
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category/create')
				->with('title','Create Catagory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategory $request)
    {
         Category::create([
            'name' => $request['name'],
            'description' => $request['description'],
        ]);
		
		return redirect()->route('category')->with('alert-success','New category has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
			$id = Crypt::decrypt($id);
		} catch (DecryptException $e) {
			return 0;
		}
		
		$category = Category::find($id);
		return view('category/edit')
					->with('title','Edit Category')
					->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update($id, StoreCategory $request)
    {
        $category = Category::find($id);
		if(empty($category)){
			return back()->with('alert-danger',
								"Something Error, Catagory's ID is not found!");
		}
        Category::where('id',$id)
				->update([
					'name' => $request['name'],
					'description' => $request['description'],
				]);
				
		return redirect()->route('category')->with('alert-success','Catagory has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
			$id = Crypt::decrypt($id);
		} catch (DecryptException $e) {
			return 0;
		}
		
		$category = Category::find($id);
		$category->delete();
		return 1;
    }
}
