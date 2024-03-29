<?php

/**
 * Bootstrap's Accordion component
 * 
 * @author      Adnan Zaki
 * @since       Jan-2022
 * @package     Component
 */
class Accordion extends \BaseClass
{
    private $alwaysOpen = false;

    public function open(bool $flush = false)
    {
        if(! array_key_exists('id', $this->attributes)) {
            $this->attributes['id'] = 'my-accordion';
        }

        $flush
            ? $accordionType = 'accordion accordion-flush'
            : $accordionType = 'accordion';

        echo '<div class="' . $accordionType . '" id="'. $this->attributes['id'] .'">';
    }

    public function setAlwaysOpen()
    {
        $this->alwaysOpen = true;

        return $this;
    }

    public function item(
        string $headerId,
        string $bodyId,
        string $btnLabel,
        string $content = 'This is a text content',
        bool $show = false
    ) {
        echo '<div class="accordion-item">';
    
        // generate header
        $show ? $btnState = '' : $btnState = ' collapsed';
        st()->elem([
            'h2' => ['class' => 'accordion-header', 'id' => $headerId]
        ])->content($btnLabel, [
            'button' => [
                'type' => 'button',
                'class' => "accordion-button$btnState" . $this->additionalClass,
                'data-bs-toggle' => 'collapse',
                'data-bs-target' => "#$bodyId",
                'aria-expanded' => $show ? 'true' : 'false',
                'aria-controls' => $bodyId,
            ]
        ])->render(); 
    
        // generate body
        $show ? $showAccordion = ' show' : $showAccordion = '';
        st()->elem([
            'div-1' => [
                'id' => $bodyId,
                'class' => 'accordion-collapse collapse' . $showAccordion . $this->additionalClass,
                'aria-labelledby' => $headerId,
                'data-bs-parent' => $this->alwaysOpen ? '' : '#' . $this->attributes['id']
            ],
            'div-2' => ['class' => 'accordion-body']
        ])->content($content, $this->slots)->render();
    
        // close end tag
        close_tag();
    }
}

// create a shortcut
if(! function_exists('accordion')) {
    function accordion()
    {
        return new Accordion;
    }
}
