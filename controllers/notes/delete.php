<?php

use core\App;
use core\Database;

$db = App::resolve(Database::class);
$userid = "1";

$note = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $_POST['removeid']])->findOrFail();

authorize($note['user_id'] === $userid);

$db->query("DELETE FROM notes WHERE id = :id", ['id' => $_POST['removeid']]);

header('Location: /notes');
