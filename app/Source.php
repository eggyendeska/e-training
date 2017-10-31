<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
	protected $table = "sources";
	
    protected $fillable = [
        'name', 'url', 'embed_code','example'
    ];
	
	public function content(){
		return $this->hasMany('App\Content');
	}
}
