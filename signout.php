<?php

require_once 'app/init.php';

unset($_SESSION['facebook_access_token']);

header('Location: index.php');