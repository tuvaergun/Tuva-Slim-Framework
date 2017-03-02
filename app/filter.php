<?php

/**
 * İlk Çalışacak Filtre.
 */
$app->hook('slim.before', function () use ($app) {
    echo 'ilk <br> ';

    /*
     * Eger dil seçilmemiş ise otomatik olarak tr ön tanımlı hale geliyor.
     */
    if (empty($app->getCookie('lang'))) {
        $app->setCookie('lang', 'tr', '1 days');
    }
});

/*
* Son çalışacak Filtre
*/
$app->hook('slim.after', function () use ($app) {
    echo '<br> son ';
});
