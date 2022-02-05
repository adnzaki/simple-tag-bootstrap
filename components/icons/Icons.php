<?php

/**
 * Bootstrap's Icons
 * 
 * @author      Adnan Zaki
 * @since       Jan-2022
 * @package     Icons
 */
class Icons
{
    private $baseSvgUrl = '';

    private $defaultWidth = 16;

    private $defaultHeight = 16;

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
     * @return void
     */
    public function render(string $iconName, int $width = 0, int $height = 0)
    {
        $svgSrc = $this->baseSvgUrl . 'bootstrap-icons.svg#' . $iconName;        

        st()->elem([
            'svg' => [
                'class' => 'bi',
                'width' => $width > 0 ? (string)$width : (string)$this->defaultWidth,
                'height'=> $height > 0 ? (string)$height : (string)$this->defaultHeight,
                'fill'  => 'currentColor'
            ],
            'use' => ['xlink:href' => $svgSrc]
        ])->render();
    }

    /**
     * Render Webfont Icons only
     * 
     * @param string $iconName
     * @param string $size
     * @param string $color
     * 
     * @return void
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

        $baseClass = ['class' => 'bi-'.$iconName];

        count($style) > 0
            ? $attrs = array_merge($baseClass, ['style' => $style])
            : $attrs = $baseClass;

        st()->elem('i', $attrs)->render();
    }
}

if(! function_exists('icons')) {
    function icons()
    {
        return new Icons;
    }
}