<?php

/**
 * Bootstrap's Icons
 * 
 * @author      Adnan Zaki
 * @since       Jan-2022
 * @package     Icons
 */
class Icons extends \BaseClass
{
    private $baseSvgUrl = '';

    private $defaultWidth = 16;

    private $defaultHeight = 16;

    /**
     * Use SVG icon-based
     * 
     * @param string $baseUrl Path to your bootstrap-icons.svg directory
     * 
     * @return \Icons
     */
    public function useSvg(string $baseUrl)
    {
        $this->baseSvgUrl = $baseUrl;

        return $this;
    }

    public function setDefaultSize(int $width, int $height)
    {
        $this->defaultWidth = $width;
        $this->defaultHeight = $height;

        return $this;
    }

    /**
     * Render SVG Icons only
     * 
     * @param string $iconName
     * @param int $width
     * @param int $height
     * 
     * @return string
     */
    public function render(string $iconName, int $width = 0, int $height = 0)
    {
        $svgSrc = $this->baseSvgUrl . 'bootstrap-icons.svg#' . $iconName;        

        return st()->elem([
            'svg' => [
                'class' => 'bi' . $this->additionalClass,
                'width' => $width > 0 ? $width : $this->defaultWidth,
                'height'=> $height > 0 ? $height : $this->defaultHeight,
                'fill'  => 'currentColor',
                'role'  => 'img'
            ],
            'use' => ['xlink:href' => $svgSrc]
        ])->render(true);
    }

    /**
     * Render Webfont Icons only
     * 
     * @param string $iconName
     * @param string $size
     * @param string $color
     * 
     * @return string
     */
    public function font(string $iconName, string $size = '', string $color = '')
    {
        $style = [];
        if(! empty($size)) {
            $style['font-size'] = $size;
        }

        if(! empty($color)) {
            $style['color'] = $color;
        }

        $baseClass = ['class' => 'bi-'.$iconName . $this->additionalClass];

        count($style) > 0
            ? $attrs = array_merge($baseClass, ['style' => $style])
            : $attrs = $baseClass;

        return st()->elem('i', $attrs)->render(true);
    }
}

if(! function_exists('icons')) {
    function icons()
    {
        return new Icons;
    }
}