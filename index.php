<?php
require_once 'functions.php';
require_once 'data.php';

$is_auth = (bool) rand(0, 1);

$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

$categories = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'];



// шаг 8
$page_content = renderTemplate('/templates/index.php', ['items' => $items]);

$layout_content = renderTemplate('/templates/layout.php',
    ['is_auth' => $is_auth,
     'user_name' => $user_name,
     'user_avatar' => $user_avatar,
     'categories' => $categories,
     'title' => 'Главная',
     'content' => $page_content,
    ]);

print($layout_content);
