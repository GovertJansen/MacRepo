<?php

require 'Database.php';
require 'functions.php';
// require 'router.php';



$db = new Database();
$posts = $db->query("select * from posts")->fetchall(PDO::FETCH_ASSOC);

dd($posts);
