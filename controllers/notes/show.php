<?php


use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database'], $config['database']['user'], $config['database']['password']);
$currentUserId = 1;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $note = $db->query('select * from notes where id = :id', [
        'id' => $_POST['id']
    ])->findOrFail();

    authorize($note['user_id'] === $currentUserId);

    $db->query('delete from notes where id = :id', [
        'id' => $_POST['id']
    ]);

    header('location: /notes');
    die();
} else {




    $note = $db->query('select * from notes where id = :id', [
        'id' => $_GET['id']
    ])->findOrFail();

    authorize($note['user_id'] === $currentUserId);

    view("notes/show.view.php", [
        'heading' => 'Note',
        'note' => $note
    ]);
}