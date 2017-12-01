<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
	protected $table = "sources";
	
    protected $fillable = [
        'name', 'url', 'embed_code','example'
    ];
	
	public function getContents(){
		return $this->hasMany(Content::class);
	}
}
