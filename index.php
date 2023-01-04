<?php
require_once 'functions.php';
require_once 'data.php';





// шаг 8
$page_content = renderTemplate('/templates/index.php', ['items' => $items]);

$layout_content = renderTemplate('/templates/layout.php',
    [
        'is_auth' => isAuth(),
        'user_name' => getName(),
        'user_avatar' => getAvatar(),
        'categories' => $categories,
        'title' => 'Главная',
        'content' => $page_content,
    ]
);

print($layout_content);
