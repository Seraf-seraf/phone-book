<?php
require_once '../functions/helper.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $contacts = json_decode(file_get_contents('../data/data.json'), true);

    unset($contacts[$id]);

    file_put_contents('../data/data.json', json_encode($contacts, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    header('Location: /pages/contacts.php');
}

$contacts = json_decode(file_get_contents('../data/data.json'), true);

$content = include_template('contacts.php', [
    'contacts' => $contacts
]);

$layout = include_template('main.php', [
    'content' => $content,
]);

print($layout);