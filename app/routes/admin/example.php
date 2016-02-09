<?php 

$app->get('/admin/example', $admin(), function() use ($app){
	
	if ($app->auth->hasPermission('is_test_role')) {
		echo "test role echo from route file";
	}

	$app->render('admin/example.php');
})->name('admin.example');