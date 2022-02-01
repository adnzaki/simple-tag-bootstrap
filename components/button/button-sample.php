<?php

st()->elem('h4')->content('Standard buttons', 'none')->render();
button()->id('my-button')->render('primary', 'Primary'); // with ID
button()->addClass('text-nowrap')->render('secondary', 'Secondary'); // add .text-nowrap class
button()->render('success', 'Success');
button()->render('danger', 'Danger');
button()->render('warning', 'Warning');
button()->render('info', 'Info');
button()->render('light', 'Light');
button()->render('dark', 'Dark');
button()->render('link', 'Link');

echo '<br><br>';
st()->elem('h4')->content('Button tags', 'none')->render();
button()->tag('a')->render('primary', 'Link');
button()->render('primary', 'Button', 'submit');
button()->tag('input')->render('primary', 'Input');
button()->tag('input')->render('primary', 'Submit', 'submit');
button()->tag('input')->render('primary', 'Reset', 'reset');

echo '<br><br>';
st()->elem('h4')->content('Outline buttons', 'none')->render();
button()->outline()->slot('strong')->render('primary', 'Primary');
button()->outline()->render('secondary', 'Secondary');
button()->outline()->render('success', 'Success');
button()->outline()->render('danger', 'Danger');
button()->outline()->render('warning', 'Warning');
button()->outline()->render('info', 'Info');
button()->outline()->render('light', 'Light');
button()->outline()->render('dark', 'Dark');
button()->outline()->render('link', 'Link');

echo '<br><br>';
st()->elem('h4')->content('Sizes', 'none')->render();
button()->size('lg')->render('primary', 'Large button');
button()->size('sm')->render('secondary', 'Small button');

echo '<br><br>';
st()->elem('h4')->content('Disabled state', 'none')->render();
button()->disable()->render('primary', 'Disabled button');
button()->tag('a')->disable()->render('secondary', 'Disabled button using ' . htmlspecialchars('<a>') . ' element');

echo '<br><br>';
st()->elem('h4')->content('Event handling', 'none')->render();
button()->event(['@click' => 'greetings'])->render('primary', 'Combine event handing with Vue.js');
button()->event(['onclick' => 'hello'])->render('primary', 'Event handing using standard Javascript');

// Note:
st()->elem('p')
    ->content('Note: You can pass event handling as many as you 
                want by adding them to event()\'s array argument
                (See the example on source code).', 'i')
    ->render();