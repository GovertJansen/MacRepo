<?php

require 'Database.php';
require 'functions.php';
// require 'router.php';

$config  = require('config.php');

$db = new Database($config['database']);

$posts = $db->query("select * from posts")->fetchall();

dd($posts);
