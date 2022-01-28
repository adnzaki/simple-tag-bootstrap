<?php

if(! function_exists('basePath')) {
    function basePath(string $target = '')
    {
        $rootDir = explode('/', $_SERVER['PHP_SELF']);

        $basePath = $_SERVER['DOCUMENT_ROOT'] . '/' . $rootDir[1] . '/';

        return $basePath . $target;
    }
}

if(! function_exists('close_tag')) {
    function close_tag(string $tag = 'div', int $depth = 1)
    {
        $closeTag = '';

        for($i = 0; $i < $depth; $i++) {
            $closeTag .= "</{$tag}>";
        }

        echo $closeTag;
    }
}