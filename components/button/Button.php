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
    private $outlined = false;

    private $disabled = false;

    private $btnSize = '';

    private $btnTag = 'button';

    private $textWrapping = true;

    public function outline()
    {
        $this->outlined = true;

        return $this;
    }

    public function disable()
    {
        $this->disabled = true;

        return $this;
    }

    public function size(string $size)
    {
        if($size === 'sm' || $size === 'lg') {
            $this->btnSize = " btn-$size";
    
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
        $this->textWrapping = false;

        return $this;
    }

    /**
     * The button renderer function
     * 
     * @param string $color
     * @param string $label Button label
     * @param string $type The button type: button, submit, reset
     * 
     * @return string
     */
    public function render(string $color, string $label, string $type = 'button')
    {
        $baseClass = 'btn btn-';

        $this->outlined
            ? $baseClass .= "outline-$color"
            : $baseClass .= $color;

        if(! empty($this->btnSize)) {
            $baseClass .= $this->btnSize;
        }

        if(! $this->textWrapping) {
            $baseClass .= ' text-nowrap';
        }

        $this->disabled ? $anchorDisabled = ' disabled' : $anchorDisabled = '';

        $attrs = [
            'a' => [
                'class' => $baseClass . $anchorDisabled . $this->additionalClass,
                'role'  => 'button',
                'href'  => '#'
            ],
            'button' => [
                'class' => $baseClass . $this->additionalClass,
                'type'  => $type
            ],
            'input' => [
                'class' => $baseClass . $this->additionalClass,
                'type'  => $type,
                'value' => $label
            ]
        ];

        if($this->disabled && $this->btnTag !== 'a') {
            $attrs[$this->btnTag] = array_merge($attrs[$this->btnTag], ['disabled' => 'true']);
        } elseif($this->btnTag === 'a' && $this->disabled) {
            $attrs[$this->btnTag] = array_merge($attrs[$this->btnTag], ['aria-disabled' => 'true']);
        }

        if(! empty($this->elemId)) {
            $attrs[$this->btnTag] = array_merge($attrs[$this->btnTag], ['id' => $this->elemId]);
        }

        // don't forget to include event handling
        $attrs[$this->btnTag] = array_merge($attrs[$this->btnTag], $this->events);

        $this->btnTag === 'input'
            ? $content = ''
            : $content = $label;

        st()->elem($this->btnTag, $attrs[$this->btnTag])
            ->content($content, $this->slots)
            ->render();
    }
}

if(! function_exists('button')) {
    function button()
    {
        return new Button;
    }
}