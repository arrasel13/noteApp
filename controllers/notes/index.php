<?php

use core\App;
use core\Database;

$db = App::resolve(Database::class);
$userid = "1";

$notes = $db->query("SELECT * FROM notes where user_id = :userid", ['userid' => $userid])->all();

view('notes/index-view.php',[
    'headerText' => "My Notes",
    'notes' => $notes
]);
