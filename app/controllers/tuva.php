<?php

class tuva
{
    public static function url($value = '')
    {
        global $app;
        if ($value) {
            $req = $app->request->getUrl().$app->request->getRootUri().$value;
        } else {
            $req = $app->request->getUrl().$app->request->getRootUri();
        }

        return $req;
    }

    public static function lang($value = '')
    {
        if ($value) {
            $lang = Lang::where('lang', LANG)->where('root', $value)->first();
            $req = $lang->content;
        } else {
            $req = '{ empty lang }';
        }

        return $req;
    }

    public static function dil()
    {
        global $app;

        if (empty($app->getCookie('lang'))) {
            $req = 'tr';
        } else {
            $req = $app->getCookie('lang');
        }

        return $req;
    }

    public static function assets($value = '')
    {
        global $app;
        if ($value) {
            $req = $app->request->getUrl().$app->request->getRootUri().'/assets/'.$value;
        } else {
            $req = $app->request->getUrl().$app->request->getRootUri().'/assets/';
        }

        return $req;
    }

    public static function css($value = '')
    {
        global $app;
        $req = $app->request->getUrl().$app->request->getRootUri().'/assets/'.$value;
        $tuv = '<link rel="stylesheet" href="'.$req.'"> ';

        return $tuv;
    }

    public static function js($value = '')
    {
        global $app;
        $req = $app->request->getUrl().$app->request->getRootUri().'/assets/'.$value;
        $tuv = '<script type="text/javascript" src="'.$req.'"></script> ';

        return $tuv;
    }
}
