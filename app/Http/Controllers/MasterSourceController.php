<?php

namespace App\Http\Controllers;

use App\Source;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSource;
use Illuminate\Contracts\Encryption\DecryptException;
use \Crypt;

class MasterSourceController extends Controller
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
        $sources = Source::all();
		return view('source/index')
					->with('title','Sources')
					->with('sources',$sources);	
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('source/create')
				->with('title','Create Source');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSource $request)
    {
         Source::create([
            'name' => $request['name'],
            'url' => $request['url'],
            'embed_code' => $request['embed_code'],
            'example' => $request['example'],
        ]);
		
		return redirect()->route('source')->with('alert-success','New source has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function show(Source $source)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
			$id = Crypt::decrypt($id);
		} catch (DecryptException $e) {
			return 0;
		}
		
		$source = Source::find($id);
		return view('source/edit')
					->with('title','Edit Source')
					->with('source',$source);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function update($id, StoreSource $request)
    {
        $source = Source::find($id);
		if(empty($source)){
			return back()->with('alert-danger',
								"Something Error, Source's ID is not found!");
		}
        Source::where('id',$id)
				->update([
					'name' => $request['name'],
					'url' => $request['url'],
					'embed_code' => $request['embed_code'],
					'example' => $request['example'],
				]);
				
		return redirect()->route('source')->with('alert-success','Source has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
			$id = Crypt::decrypt($id);
		} catch (DecryptException $e) {
			return 0;
		}
		
		$source = Source::find($id);
		$source->delete();
		return 1;
    }
}
