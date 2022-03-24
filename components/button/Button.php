<?php

/**
 * Bootstrap's Button component
 * 
 * @author      Adnan Zaki
 * @since       Jan-2022
 * @package     Component
 */
class Button extends \BaseClass
{
    private $baseClass = 'btn btn-';

    private $btnLabel = '';

    private $btnColor = '';

    private $btnTag = 'button';

    public function __construct(string $color, string $label)
    {
        $this->baseClass .= $color;
        $this->btnLabel = $label;
        $this->btnColor = $color;
        $this->attributes['type'] = 'button';

        return $this;
    }

    public function type(string $type)
    {
        $this->attributes['type'] = $type;
        
        return $this;
    }

    /**
     * CAUTION!!
     * This method will overwrite the button class,
     * you must use this method before other modifier 
     * like disable(), size() and noWrap()
     * 
     * @return this
     */
    public function outline()
    {
        $this->baseClass = "btn btn-outline-$this->btnColor";

        return $this;
    }

    public function disable()
    {
        $this->baseClass .= ' disabled';

        $disabled = $this->btnTag === 'a'
            ? ['aria-disabled' => 'true']
            : ['disabled'];

        return $this->attr($disabled);
    }

    public function size(string $size)
    {
        if($size === 'sm' || $size === 'lg') {
            $this->baseClass .= " btn-$size";
    
            return $this;
        }
    }

    public function tag(string $tagName)
    {
        $validTag = ['a', 'button', 'input'];
        if(array_search($tagName, $validTag) !== false) {
            $this->btnTag = $tagName;

            return $this;
        }        
    }

    public function noWrap()
    {
        $this->baseClass .= ' text-nowrap';

        return $this;
    }

    /**
     * The button renderer
     * 
     * @param boolean $raw Whether to render button to the browser directly or not
     * 
     * @return string|void
     */
    public function render($raw = false)
    {
        $baseAttrs = [
            'a' => [
                'class' => $this->baseClass . $this->additionalClass,
                'role'  => 'button',
                'href'  => '#'
            ],
            'button' => [
                'class' => $this->baseClass . $this->additionalClass,
                'type'  => $this->attributes['type']
            ],
            'input' => [
                'class' => $this->baseClass . $this->additionalClass,
                'type'  => $this->attributes['type'],
                'value' => $this->btnLabel
            ]
        ];

        $attrs = array_merge(
            $baseAttrs[$this->btnTag],
            $this->attributes
        );

        $this->btnTag === 'input'
            ? $content = ''
            : $content = $this->btnLabel;

        return st()->elem($this->btnTag, $attrs)
            ->content($content, $this->slots)
            ->render($raw);
    }
}

if(! function_exists('button')) {
    function button($color, $label)
    {
        return new Button($color, $label);
    }
}