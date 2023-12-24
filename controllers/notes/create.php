<?php

use Core\Database;
use Core\Validator;

$config = require base_path('config.php');
$db = new Database($config['database'], $config['database']['user'], $config['database']['password']);
$errors = [];

view("notes/create.view.php", [
    'heading' => 'Create a Note',
    'errors' => $errors
]);