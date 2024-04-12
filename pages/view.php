<?php
require_once '../functions/helper.php';

$contacts = json_decode(file_get_contents('../data/data.json'), true);

$id = htmlspecialchars($_GET['id']);

$contact = $contacts[$id];

if (!$contact) {
    header('Location: /pages/contacts.php');
}

$content = include_template('view.php', [
    'contact' => $contact
]);

$layout = include_template('main.php', [
   'content' => $content
]);

print($layout);
