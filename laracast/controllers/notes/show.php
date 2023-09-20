<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Note';


$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

if (!$note) {
    abort();
}

$currentUserId = 4;

if ($note['user_id'] !== $currentUserId) {
    abort(Response::FORBIDDEN);
}
authorize($note['user_id'] === $currentUserId);

require "views/notes/show.view.php";
