<?php

use core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);
$userid = "1";

$note = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $_POST['removeid']])->findOrFail();

authorize($note['user_id'] === $userid);

$db->query("DELETE FROM notes WHERE id = :id", ['id' => $_POST['removeid']]);

header('Location: /notes');
