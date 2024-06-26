<?php

use core\Validate;
use core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);
$userid = 1;
$errors = [];

if (! Validate::string($_POST['notebody'], 1, 255))
{
    $errors['body'] = "Note body can't be empty and not more than 255 characters";
}

if($errors)
{
    return view('notes/create-view.php',[
        'headerText' => "Create a New Note",
        'errors' => $errors
    ]);
}

$db->query("INSERT INTO notes (body, user_id) VALUES (:notebody, :userid)", [
    'notebody' => $_POST['notebody'],
    'userid' => $userid
]);

header('Location: /notes');
