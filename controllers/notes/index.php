<?php

$config = require 'config.php';
$db = new Database($config['database']);
$userid = 1;

$notes = $db->query("SELECT * FROM notes where user_id = :userid", ['userid' => $userid])->all();

$headerText = "My Notes";

require 'views/notes/index-view.php';