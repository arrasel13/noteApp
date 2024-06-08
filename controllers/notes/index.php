<?php

use core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);
$userid = "1";

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $note = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $_POST['removeid']])->findOrFail();

    authorize($note['user_id'] === $userid);

    $db->query("DELETE FROM notes WHERE id = :id", ['id' => $_POST['removeid']]);

    header('Location: /notes');

} else {

    $notes = $db->query("SELECT * FROM notes where user_id = :userid", ['userid' => $userid])->all();

    view('notes/index-view.php',[
        'headerText' => "My Notes",
        'notes' => $notes
    ]);

}
