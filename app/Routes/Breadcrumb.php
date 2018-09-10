<?php

namespace App\Routes;

class Breadcrumb
{
    /**
     * breacdcrumb
     * @var array
     */
    protected static $path = [];
    
    /**
     * Set root node
     */
    public static function setRoot($paths)
    {
        foreach ($paths as list($url, $text)) {
            self::add($text, $url);
        }
    }

    /**
     * Add a node
     */
    public static function add($text, $url = null)
    {
        self::$path[] = [
            'url' => $url,
            'text' => $text
        ];
    }

    /**
     * Get list nodes to render
     */
    public static function get() 
    {
        return self::$path;
    }
}
