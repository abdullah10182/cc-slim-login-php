<?php 

namespace Triangon\User;

use Illuminate\Database\Eloquent\Model as Eloquent;

class UserPermission extends Eloquent
{
	protected $table = 'users_permissions';

	protected $fillable = [
		'is_admin',
		'is_test_role'
	];

	public static $defaults = [
		'is_admin' => false
	];
}