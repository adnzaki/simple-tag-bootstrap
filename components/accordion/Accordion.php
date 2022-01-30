<?php

/**
 * Bootstrap's Accordion component
 * 
 * @author      Adnan Zaki
 * @since       Jan-2022
 * @package     Component
 */
class Accordion
{
    private $accordionId = 'my-accordion';

    private $alwaysOpen = false;

    public function open(bool $flush = false)
    {
        $flush
            ? $accordionType = 'accordion accordion-flush'
            : $accordionType = 'accordion';

        echo '<div class="' . $accordionType . '" id="'. $this->accordionId .'">';
    }

    public function id(string $id)
    {
        $this->accordionId = $id;

        return $this;
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
        bool $show = false,
        $slots = ''
    ) {
        echo '<div class="accordion-item">';
    
        // generate header
        $show ? $btnState = '' : $btnState = ' collapsed';
        st()->elem([
            'h2' => ['class' => 'accordion-header', 'id' => $headerId]
        ])->content($btnLabel, [
            'button' => [
                'type' => 'button',
                'class' => "accordion-button$btnState",
                'data-bs-toggle' => 'collapse',
                'data-bs-target' => "#$bodyId",
                'aria-expanded' => $show ? 'true' : 'false',
                'aria-controls' => $bodyId,
            ]
        ])->render(); 
    
        // generate body
        $show ? $showAccordion = ' show' : $showAccordion = '';
        $root = st()->elem([
            'div-1' => [
                'id' => $bodyId,
                'class' => 'accordion-collapse collapse' . $showAccordion,
                'aria-labelledby' => $headerId,
                'data-bs-parent' => $this->alwaysOpen ? '' : "#$this->accordionId"
            ],
            'div-2' => ['class' => 'accordion-body']
        ]);
    
        is_array($slots) || ! empty($slots)
            ? $content = $root->content($content, $slots)
            : $content = $root->content($content);
    
        $content->render();
    
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
