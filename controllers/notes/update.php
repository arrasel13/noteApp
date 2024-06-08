<?php

use core\Validate;
use core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);
$userid = "1";
$errors = [];

$note = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $_POST['updateid']])->findOrFail();

authorize($note['user_id'] === $userid);

if (!Validate::string($_POST['notebody'], 1, 255)) {
    $errors['body'] = "Note body can't be empty and not more than 255 characters";
}

if ($errors) {
    return view('notes/edit-view.php',[
        'headerText' => "Edit Note",
        'note' => $note
    ]);
}

$db->query("UPDATE notes SET body = :notebody WHERE id = :id", [
    'notebody' => $_POST['notebody'],
    'id' => $_POST['updateid']
]);

header('Location: /notes');
