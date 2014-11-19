<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'usuario';
	public $timestamps = false;
        protected $fillable = ['username', 'password','rol'];
        protected $guarded = ['remember_token'];

	public static $rules=array(
		'username' => 'required|min:5|max:40', 
		'password' => 'required|min:6|confirmed',
		'rol'	   => 'required'
		);

	
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	protected $hidden = array('password', 'remember_token');
        
        public function entidadUsuario()
        {
            return $this->morphTo();
        }
}
