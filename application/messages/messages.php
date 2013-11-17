<?php defined('SYSPATH') OR die('No direct access allowed.');
return array(
  'image' => array(
    'Upload::not_empty' => ':field не должно быть пустым, :field файл большой (max 1MB) или ошибка загрузки',
    'Upload::valid' => ':field Ошибка загрузки',
    'Upload::size' => 'Файл слишком большой, больше 1MB',
    'Upload::type' => 'Загрузка только jpg, png, gif', 
    'default'  		=> 'Ошибка',
    ),
);
?>
