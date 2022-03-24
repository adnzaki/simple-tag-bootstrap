<?php

st()->elem('h4')->content('Standard buttons', null)->render();
button('primary', 'Primary')->id('my-button')->render(); // with ID
button('secondary', 'Secondary')->addClass('text-nowrap')->render('secondary', 'Secondary'); // add .text-nowrap class
button('success', 'Success')->render();
button('danger', 'Danger')->render();
button('warning', 'Warning')->render();
button('info', 'Info')->render();
button('light', 'Light')->render();
button('dark', 'Dark')->render();
button('link', 'Link')->render();

echo '<br><br>';
st()->elem('h4')->content('Button tags', null)->render();
button('primary', 'Link')->tag('a')->render();
button('primary', 'Button')->type('submit')->render();
button('primary', 'Input')->tag('input')->render();
button('primary', 'Submit')->tag('input')->render();
button('primary', 'Reset')->tag('input')->type('reset')->render();

echo '<br><br>';
st()->elem('h4')->content('Outline buttons', null)->render();
button('primary', 'Primary')->outline()->slot('strong')->render();
button('secondary', 'Secondary')->outline()->render();
button('success', 'Success')->outline()->render();
button('danger', 'Danger')->outline()->render();
button('warning', 'Warning')->outline()->render();
button('info', 'Info')->outline()->render();
button('light', 'Light')->outline()->render();
button('dark', 'Dark')->outline()->render();
button('link', 'Link')->outline()->render();

echo '<br><br>';
st()->elem('h4')->content('Sizes', null)->render();
button('primary', 'Large button')->size('lg')->render();
button('secondary', 'Small button')->size('sm')->render();

echo '<br><br>';
st()->elem('h4')->content('Disabled state', null)->render();
button('primary', 'Disabled button')->disable()->render();
button('secondary', 'Disabled button using ' . htmlspecialchars('<a>') . ' element')->tag('a')->disable()->render();

echo '<br><br>';
st()->elem('h4')->content('Event handling', null)->render();
button('primary', 'Combine event handing with Vue.js')->attr(['@click' => 'greetings'])->render();
button('primary', 'Event handing using standard Javascript')->attr(['onclick' => 'hello'])->render();