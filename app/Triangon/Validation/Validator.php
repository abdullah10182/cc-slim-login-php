<?php 

namespace Triangon\Validation;

use Violin\Violin;
use Triangon\User\User;

class Validator extends Violin
{
	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;

		$this->addFieldMessages([
				'email' => [
					'uniqueEmail' => 'That email is already in use.'
				],
				'username' => [
					'uniqueUsername' => 'That username is already taken.'
				]
			]);
	}

	public function validate_uniqueEmail($value, $input, $args)
	{
		$user = $this->user->where('email', $value);

		return ! (bool) $user->count(); //cast to bool, return true if count = 1
	}

	public function validate_uniqueUsername($value, $input, $args)
	{
		return ! (bool) $this->user->where('username', $value)->count();
	}
}

