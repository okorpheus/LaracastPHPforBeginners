<?php
require_once 'Validator.php';
$config = require('config.php');
$db = new Database($config['database'], $config['database']['user'], $config['database']['password']);
$heading = 'Create a Note';

if($_SERVER['REQUEST_METHOD'] === 'POST'
) {
    $errors = [];


    if (! Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A body of no more than 1,000 characters is required';
    }

    if (empty($errors)) {
        $db->query('INSERT INTO notes(body, user_id) VALUES (?, ?)', [
            $_POST['body'], 1
        ]);
    }
}

require "views/notes/create.view.php";