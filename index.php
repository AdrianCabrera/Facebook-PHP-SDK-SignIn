<?php

require_once 'app/init.php';

if(isset($_SESSION['facebook_access_token'])){
	$cardTitle = "Welcome";
	$cardText = "Hello ". $user->getName();
	$cardLink = "/signout.php";
	$cardLinkText = "Log out";
	$cardLinkIcon = '<span class="oi oi-account-logout"></span>';
}else{
	$cardTitle = "Facebook Sign In";
	$cardText = "You are not a member";
	$cardLink = $helper->getLoginUrl($callback, $permissions);
	$cardLinkText = "Sign in with Facebook";
	$cardLinkIcon = '<span class="oi oi-account-login"></span>';
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Facebook PHP Graph SDK</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" integrity="sha256-BJ/G+e+y7bQdrYkS2RBTyNfBHpA9IuGaPmf9htub5MQ=" crossorigin="anonymous" />
</head>
<body>
	<nav class="navbar bg-secondary text-white">
		<h1>Facebook PHP Graph SDK</h1>
	</nav>
	<div class="d-md-flex flex-row justify-content-around align-items-stretch align-content-stretch">
		<div class="card mt-5">
			<img class="card-img-top" src="http://placehold.it/500x250" alt="Card image cap">
			<div class="card-body">
				<h4 class="card-title"><?php echo $cardTitle; ?></h4>
				<p class="card-text"><?php echo $cardText; ?></p>
			</div>
			<div class="card-body">
				<a href="<?php echo $cardLink; ?>" class="card-link"><?php echo $cardLinkIcon; ?> <br/><?php echo $cardLinkText; ?></a>
			</div>
		</div>
	</div>
</body>
</html>