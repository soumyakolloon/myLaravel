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
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
	
// Add to the "fillable" array
 protected $fillable = array('email', 'password');

// Rest of class cut-off for brevity


/*

@Soumya Kolloon
Added RBAC module funcitonality

*
*/

public function roles() {
        return $this->belongsToMany('Role');
    }

public function hasRole($key)
    {
        foreach ($this->roles as $role) {            
            if ($role->role_name === $key) {
                return true;
            }
        }        
        return false;
    }   


}
