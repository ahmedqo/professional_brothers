<?php

namespace App\Functions;

class SysFn
{
    public static function lang($lang = 'en')
    {
        return app()->getLocale() == $lang;
    }
}
