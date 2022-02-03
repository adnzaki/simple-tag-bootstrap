<?php

if(! function_exists('baseUrl')) {
    function baseUrl(string $path = '')
    {
        $root = (is_https() ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

        return $root . $path;
    }
}

if (! function_exists('is_https'))
{
	/**
	 * Is HTTPS?
	 *
	 * Determines if the application is accessed via an encrypted
	 * (HTTPS) connection.
     * 
     * Note: This function was taken from CodeIgniter 3 common function 
	 *
	 * @return	bool
	 */
	function is_https()
	{
		if ( ! empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off')
		{
			return TRUE;
		}
		elseif (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) === 'https')
		{
			return TRUE;
		}
		elseif ( ! empty($_SERVER['HTTP_FRONT_END_HTTPS']) && strtolower($_SERVER['HTTP_FRONT_END_HTTPS']) !== 'off')
		{
			return TRUE;
		}

		return FALSE;
	}
}

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