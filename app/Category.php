<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = "categories";
	
    protected $fillable = [
        'name', 'description',
    ];
	
	public function getContents(){
		return $this->hasMany(Content::class);
	}
}
