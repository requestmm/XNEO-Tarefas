<?php

class Route
{

    private function run($url_path, $callback)
    {
        $callback();
        exit();
    }

    static function GET($url_path, $callback)
    {
        if ($url_path == $_SERVER["REQUEST_URI"]) {
            Route::run($url_path, $callback);
        }
    }

    static function POST($url_path, $callback)
    {
        if ($url_path == explode('?',$_SERVER["REQUEST_URI"])[0]) {
            Route::run($url_path, $callback);
        }
    }

    static function RESOURCE($url_path, $callback)
    {
        if ($url_path == explode('?',$_SERVER["REQUEST_URI"])[0]) {
            require_once dirname(__FILE__) . "/Controllers/" . $callback . ".php";
            class_alias($callback, "Controller");

            $Controller = new Controller($_SERVER);
            
            
            exit();
        }
    }

    static function NOT_FOUND($callback){
        $callback();
    }

}
