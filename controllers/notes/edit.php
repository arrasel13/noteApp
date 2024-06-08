<?php

use core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);
$userid = "1";

$note = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $_GET['id']])->findOrFail();

authorize($note['user_id'] === $userid);

view('notes/edit-view.php',[
    'headerText' => "Edit Note",
    'note' => $note
]);
