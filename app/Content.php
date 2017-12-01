<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
	protected $table = "contents";
    protected $fillable = [
        'users_id', 'title', 'sources_id', 'id_content', 'description', 'categories_id', 'tags', 'watch_count', 'status', 'note'
    ];
	
	public function getSource(){
		return $this->belongsTo(Source::class, 'sources_id');
	}
	
	public function getCategory(){
		return $this->belongsTo(Category::class, 'categories_id');
	}

	public function getUser(){
	    return $this->belongsTo(User::class,'users_id');
    }

    public function comments(){
	    return $this->morphMany(Comment::class, 'commentable');
    }
}
