<?php

namespace App;

use function foo\func;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function contents()
    {
        return $this->hasMany(Content::class,'users_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'users_id');
    }

    protected static function boot(){
        parent::boot();

        static::deleting(function($user){
            $user->contents()->delete();
            $user->comments()->delete();
        });
    }

	public function isAdmin()
    {
		if($this->role == "admin")
		{
			return true;
		}
		else
        {
            return redirect('home')->with('alert-danger',
                'Unauthorized Access is Denied!');
		}
	}
	
}
