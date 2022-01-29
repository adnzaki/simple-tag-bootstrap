<?php

if(! function_exists('accordion')) {
    function accordion(
        string $headerId,
        string $bodyId,
        string $btnLabel,
        string $content = 'This is a text content',
        bool $show = false,
        $slots = '',
        string $accordionId = 'my-accordion'
    ) {
        echo '<div class="accordion-item">';
        accordion_header($headerId, $bodyId, $btnLabel, $show);
        accordion_body($bodyId, $headerId, $accordionId, $content, $slots, $show);
        close_tag();
    }
}

if(! function_exists('accordion_open')) {
    function accordion_open(string $id = 'my-accordion')
    {
        echo '<div class="accordion" id="'. $id .'">';
    }
}

if(! function_exists('accordion_header')) {
    function accordion_header(
        string $headerId, 
        string $bodyId, 
        string $btnLabel,
        bool $show = false
    ) {
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
    }
}

if(! function_exists('accordion_body')) {
    function accordion_body(
        string $bodyId,
        string $headerId, 
        string $accordionId, 
        string $content, 
        $slots = '',
        bool $show = false
    ) {
        $show ? $showAccordion = ' show' : $showAccordion = '';
        $root = st()->elem([
            'div-1' => [
                'id' => $bodyId,
                'class' => 'accordion-collapse collapse' . $showAccordion,
                'aria-labelledby' => $headerId,
                'data-bs-parent' => "#$accordionId"
            ],
            'div-2' => ['class' => 'accordion-body']
        ]);

        is_array($slots) || ! empty($slots)
            ? $content = $root->content($content, $slots)
            : $content = $root->content($content);

        $content->render();
    }
}