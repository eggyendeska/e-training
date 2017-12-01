<?php

namespace App\Http\Controllers;

use App\Content;
use App\Category;
use App\Source;
use App\Comment;
use App\Http\Requests\StoreContent;
use Illuminate\Contracts\Encryption\DecryptException;
use illuminate\Support\Facades\Auth;
use \Crypt;
class MasterContentController extends Controller
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
        $contents = Content::with('getSource','getCategory','getUser')->get();
        return view('content/index')
					->with('title','Contents')
					->with('contents',$contents);

    }

    /**
     * Show the form for creating a new recontent.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {	
		$sources = Source::all();
    	$categories = Category::all();
        return view('content/create')
				->with('title','Create Content')
				->with('sources',$sources)
				->with('categories',$categories);	
    }

    /**
     * Store a newly created recontent in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContent $request)
    {
        Content::create([
            'users_id' 		=> Auth::id(),
            'title' 		=> $request['title'],
            'sources_id' 	=> $request['sources_id'],
            'id_content' 	=> $request['id_content'],
            'description' 	=> $request['description'],
            'note' 			=> $request['note'],
            'categories_id' => $request['categories_id'],
            'tags' 			=> $request['tags'],
            'status' 		=> $request['status'],
        ]);
		
		return redirect()->route('content')->with('alert-success','New content has been created!');
    }

    /**
     * Display the specified recontent.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		try {
			$id = Crypt::decrypt($id);
		} catch (DecryptException $e) {
			return 0;
		}
		
        $content = Content::with('getSource','getCategory','getUser')
							->where('contents.id',$id)
							->first();


		$related = Content::with('getSource','getCategory')
                            ->where([
                                ['contents.id','!=', $id],
                                ['contents.categories_id', $content->categories_id]
                            ])
                            ->limit(4)
                            ->get();

        $getComments = Content::with('comments')
                            ->find($id);

		$comments = $getComments->comments->sortByDesc(Comment::CREATED_AT);
        $embed_code = $content->getSource->embed_code;
		$id_content = $content->id_content;	
		$video = $this->getFormat($embed_code, $id_content);

		return view('content/show')
					->with('title','View Contents')
					->with('content', $content)
					->with('video', $video)
		            ->with('related',$related)
		            ->with('comments',$comments);

    }
	
	public function getFormat($embed_code, $id_content)
	{
		return str_replace("[id]", $id_content, $embed_code);
	}

    /**
     * Show the form for editing the specified recontent.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
			$id = Crypt::decrypt($id);
		} catch (DecryptException $e) {
			return 0;
		}
		$sources = Source::all();
    	$categories = Category::all();
		$content = Content::find($id);
		return view('content/edit')
					->with('title','Edit Content')
					->with('content',$content)
					->with('sources',$sources)
					->with('categories',$categories);	
    }

    /**
     * Update the specified recontent in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update($id, StoreContent $request)
    {
        $content = Content::find($id);
		if(empty($content)){
			return back()->with('alert-danger',
								"Something Error, Content's ID is not found!");
		}
        Content::where('id',$id)
				->update([
					'title' 		=> $request['title'],
					'sources_id' 	=> $request['sources_id'],
					'id_content' 	=> $request['id_content'],
					'description' 	=> $request['description'],
					'note' 			=> $request['note'],
					'categories_id' => $request['categories_id'],
					'tags' 			=> $request['tags'],
					'status' 		=> $request['status'],
				]);
				
		return redirect()->route('content')->with('alert-success','Content has been updated!');
    }

    /**
     * Remove the specified recontent from storage.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
			$id = Crypt::decrypt($id);
		} catch (DecryptException $e) {
			return 0;
		}
		
		$content = Content::find($id);
		$content->delete();
		return 1;
    }
}