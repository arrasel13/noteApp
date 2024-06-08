<?php

use core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);
$userid = "1";

$notes = $db->query("SELECT * FROM notes where user_id = :userid", ['userid' => $userid])->all();

view('notes/index-view.php',[
    'headerText' => "My Notes",
    'notes' => $notes
]);
