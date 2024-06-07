<?php

$config = require 'config.php';
$db = new Database($config['database']);
$userid = "1";

$note = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $_GET['id']])->findOrFail();

authorize($note['user_id'] === $userid);

$headerText = "Single Note";

require 'views/notes/show-view.php';