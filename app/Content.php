<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
	protected $table = "contents";
    protected $fillable = [
        'users_id', 'title', 'sources_id', 'id_content', 'description', 'categories_id', 'tags', 'watch_count', 'status', 'note'
    ];
	
	public function source(){
		return $this->belongsTo('App\Source');
	}
	
	public function category(){
		return $this->belongsTo('App\Category');
	}
}
