<?php 

namespace Triangon\Validation;

use Violin\Violin;
use Triangon\User\User;
use Triangon\Helpers\Hash;

class Validator extends Violin
{
	protected $user;

	protected $hash;

	protected $auth;

	public function __construct(User $user, Hash $hash, $auth = null)
	{
		$this->user = $user;
		$this->hash = $hash;
		$this->auth = $auth;

		$this->addFieldMessages([
				'email' => [
					'uniqueEmail' => 'That email is already in use.'
				],
				'username' => [
					'uniqueUsername' => 'That username is already taken.'
				]
			]);

		$this->addRuleMessages([
			'matchesCurrentPassword' => 'That doe not match your current password'
		]);
	}

	public function validate_uniqueEmail($value, $input, $args)
	{
		$user = $this->user->where('email', $value);

		//check if email is not current user's email for updating
		if ($this->auth && $this->auth->email === $value) {
			return true;
		}

		return ! (bool) $user->count(); //cast to bool, return true if count = 1
	}

	public function validate_uniqueUsername($value, $input, $args)
	{
		return ! (bool) $this->user->where('username', $value)->count();
	}

	public function validate_matchesCurrentPassword($value, $input, $args)
	{
		if ($this->auth && $this->hash->passwordCheck($value, $this->auth->password)) {
			return true;
		} 

		return false;
	}
}

