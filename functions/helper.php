<?php
function include_template($name, $data = [])
{
    $name = '../templates/'.$name;
    try {
        if (!is_readable($name)) {
           throw new Exception("Файл $name не существует");
        }

        ob_start();
        extract($data);
        include $name;

        return ob_get_clean();

    } catch (Exception $error) {
        echo $error->getMessage();
    }

    return null;
}


function validate_string($value, $min, $max)
{
    $len = mb_strlen($value);

    if ($len < $min or $len > $max) {
        return "Строка может содержать от $min до $max символов";
    }

    return null;
}


function validate_phone($value)
{
    if (!preg_match('/^7([\d]{3})[\d]{3}[\d]{2}[\d]{2}$/', $value)) {
        return 'Введите формат номер в формате 7**********';
    }

    return null;
}


function get_errors($form, $rules, $required)
{
    $errors = [];

    foreach ($form as $field => $value) {
        if (isset($rules[$field])) {
            $rule = $rules[$field];
            $errors[$field] = $rule($value);
        }

        if (in_array($field, $required) && empty($value)) {
            $errors[$field] = 'Поле нужно заполнить!';
        }
    }

    return array_filter($errors);
}