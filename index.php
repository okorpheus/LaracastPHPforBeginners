<?php
require_once('functions.php');
require_once('Database.php');
require('Response.php');
require('router.php');
$config = require('config.php');
$db = new Database($config['database'], $config['database']['user'], $config['database']['password']);