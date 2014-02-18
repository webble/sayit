<?php

class UserRepository
{
	/**
	 * @return User
	 * @throws Exception
	 */
	public static function fromInput()
	{
		$email = Input::get('user');

		if(!$email) {
			throw new Exception('Must have user e-mail');
		}

		$user = User::whereEmail($email)->first();
		if(!$user) {

			$username = substr($email, 0, strpos($email, '@'));
			$user = User::create(compact('email', 'username'));
		}

		return $user;
	}
}