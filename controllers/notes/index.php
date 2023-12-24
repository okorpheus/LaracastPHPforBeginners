<?php
$config = require base_path('config.php');
$db = new Database($config['database'], $config['database']['user'], $config['database']['password']);
$notes = $db->query('select * from notes where user_id = 1')->get();

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);