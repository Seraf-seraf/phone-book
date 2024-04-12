<?php
require_once '../functions/helper.php';
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('../data/data.json'), true);

    $required = ['name', 'phone'];

    $rules = [
        'name' => function ($value) {
            return validate_string($value, 1, 36);
        },
        'phone' => function ($value) {
            return validate_phone($value);
        }
    ];

    $new_contact = filter_input_array(
        INPUT_POST, [
            'name' => FILTER_DEFAULT,
            'phone' => FILTER_DEFAULT
        ]
    );

    $errors = get_errors($new_contact, $rules, $required);

    if (count($errors) === 0) {
        $data[] = $new_contact;

        file_put_contents('../data/data.json', json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        header('Location: ../pages/contacts.php');
    }
}


$content = include_template('create.php', [
    'errors' => $errors
]);

$layout = include_template('main.php', [
   'content' => $content
]);

print($layout);