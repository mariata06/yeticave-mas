<?php

function show_price($price) {
    $price = ceil($price);
    if ($price < 1000) {
        return $price . ' ' . '<b class="rub">р</b>';
    } else {
        $thousands = floor($price / 1000);
        return $thousands . ' ' . substr($price,-3,3) . ' ' . '<b class="rub">р</b>';
    }
}

// функция шаблонизатор
function renderTemplate($page_url, $data_array) {
    $pathTemplate = __DIR__ . $page_url;
    if(empty($page_url || !file_exists($pathTemplate))) {
        return '';
    }

    extract($data_array, EXTR_OVERWRITE);

    ob_start();
    include $pathTemplate;

    return ob_get_clean();
}

// 2 задание
date_default_timezone_set("Europe/Moscow");

function getLeftTime($midnight) {
    if (!$midnight) {
        $midnight = mktime(0, 0, 0, date('n'), date('j') + 1, date('Y'));
    }

    $left = $midnight - time();
    // $left = $midnight; // - time();

    return floor($left / 3600) . ':'. floor($left % 3600 / 60);
    // return floor($left / 86400) . ' days ' . floor($left / 86400 / 3600) . ':'. floor($left / 86400 % 3600 / 60);
}

// 4 задание с отправкой формы с добавлением лота
function hasError() {
    global $errors;
    return (count($errors));
}

function checkError($field) {
    global $errors;
    return !empty($errors[$field]) ? 'form__item--invalid' : '';
}

// 5 задание с показом увиденных сохраненных лотов на отдельной странице history
function getItemsHistory() {
    $history = $_COOKIE['items-history'] ?? [];

    $history = empty($history) ? [] : unserialize($history, ['allowed_classes' => false]);
    return $history;
}

function addItemsHistory($id) {
    $history = getItemsHistory();

    $history[] = $id;
    $history = array_unique($history, SORT_NUMERIC);

    setcookie('items-history', serialize($history), time() + 7 * 86400);
}
