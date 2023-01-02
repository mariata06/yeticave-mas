<!-- массив с лотами -->
<?php
require_once 'data.php';
require_once 'functions.php';

$id = (int)$_GET['id'];
if(!isset($items[$id])) {
    http_response_code(404);
    die;
}

$item = $items[$id];

$lot_content = renderTemplate('/templates/lot.php', ['item' => $item, 'bets' => $bets]);

$layout_content = renderTemplate('/templates/layout.php',
    [
        'is_auth' => $is_auth,
        'user_name' => $user_name,
        'user_avatar' => $user_avatar,
        'categories' => $categories,
        'title' => 'Лот',
        'content' => $lot_content,
    ]
);

print($layout_content);
