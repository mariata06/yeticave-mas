<?php
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
function getLeftTime() {
    $midnight = mktime(0, 0, 0, date('n'), date('j') + 1, date('Y'));
    $left = $midnight - time();

    return floor($left / 3600) . ':'. floor($left % 3600 / 60);
}
