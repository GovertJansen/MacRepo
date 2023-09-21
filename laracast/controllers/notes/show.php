<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Note';

$currentUserId = 4;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

if (!$note) {
    abort();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($note['user_id'] !== $currentUserId) {
        abort(Response::FORBIDDEN);
    }

    authorize($note['user_id'] === $currentUserId);

    $db->query('delete from notes where id = :id', [
        'id' => $_GET['id']
    ]);

    header('location: /laracast/notes');
    exit();
} else {

    if ($note['user_id'] !== $currentUserId) {
        abort(Response::FORBIDDEN);
    }
    authorize($note['user_id'] === $currentUserId);

    require "views/notes/show.view.php";
}
