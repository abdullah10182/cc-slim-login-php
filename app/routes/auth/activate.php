<?php 

$app->get('/activate', function() use($app){
	
	$request = $app->request;

	$email = $request->get('email');
	$identifier = $request->get('identifier');



	$hashedIdentifier = $app->hash->hash($identifier);

	$user = $app->user
		->where('email', $email)
		->where('active', false)
		->first();

	if(!$user || !$app->hash->hashCheck($user->active_hash, $hashedIdentifier)){
		$app->flash('global', 'there was a problem redirecting you account');
		$app->response->redirect($app->urlFor('home'));
	} else{
		$user->activateAccount();
		$app->flash('global', 'Your account has been activated');
		$app->response->redirect($app->urlFor('home'));
	}


})->name('activate');