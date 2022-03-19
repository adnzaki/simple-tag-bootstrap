<?php

$options1 = [
    [
        'label' => 'Option 1',
        'value' => '1'
    ],
    [
        'label' => 'Option 2',
        'value' => '2'
    ],
    [
        'label' => 'Option 3',
        'value' => '3'
    ],
    [
        'label' => 'Option 4',
        'value' => '4'
    ],
];

$title = 'Open this select menu';

echo '<h4>Default</h4>';
select()->title($title)->render($options1);
echo '<br>';

echo '<h4>Sizing options with Large ("lg") and Small ("sm")</h4>';
select()->title($title)
        ->size('lg')
        ->aria('.form-select-lg example')
        ->addClass('mb-3')
        ->render($options1);

select()->title($title)
        ->size('sm')
        ->aria('.form-select-sm example')
        ->render($options1);
echo '<br>';

echo '<h4>Multiple select with default size</h4>';
select()->title($title)
        ->multiple()
        ->aria('multiple select example')
        ->render($options1);
echo '<br>';

echo '<h4>Multiple select with custom "size" attribute</h4>';
select()->title($title)
        ->multiple()
        ->setMultipleSize(3)
        ->aria('multiple select example')
        ->render($options1);
echo '<br>';

echo '<h4>Disabled state</h4>';
select()->title($title)->disable()->render($options1);