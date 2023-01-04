<!-- массив с лотами -->
<?php
require_once 'data.php';
require_once 'functions.php';

$id = (int)$_GET['id'];
if(!isset($items[$id])) {
    http_response_code(404);
    die;
}

addItemsHistory($id);

$item = $items[$id];

$lot_content = renderTemplate('/templates/lot.php', ['item' => $item, 'bets' => $bets]);

$layout_content = renderTemplate('/templates/layout.php',
    [
        'is_auth' => isAuth(),
        'user_name' => getName(),
        'user_avatar' => getAvatar(),
        'categories' => $categories,
        'title' => 'Лот',
        'content' => $lot_content,
    ]
);

print($layout_content);
