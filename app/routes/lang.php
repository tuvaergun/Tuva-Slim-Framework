<?php

    $app->get('/lang/:slug', function ($slug) use ($app) {
        $app->setCookie('lang', $slug, '1 days');

        $app->redirect($app->request->getReferrer());
    });
