<?php

use core\App;
use core\Database;

$db = App::resolve(Database::class);
$userid = "1";

$note = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $_GET['id']])->findOrFail();

authorize($note['user_id'] === $userid);

view('notes/edit-view.php',[
    'headerText' => "Edit Note",
    'note' => $note
]);
