<?php

st()->elem('h4')->content('SVG Icons', 'strong')->render();
st()->elem('h5')->content('The most recommended way to use Bootstrap Icons in
SimpleTag is with SVG format. This way does not require you to include any 
file to your HTML. Simply define a URL that pointed to bootstrap-icons.svg directory 
and you can use Bootstrap Icons everywhere. With SVG, you can also get the power of CSS currentColor
that will match icons\' color to the other HTML elements, so you do not have to set their color manually. 
You can check these examples source code
at', null)
->content(' "components/icons/icons-sample.php"', 'strong')->render();
echo '<br>';

// using SVG Icons
$icons = icons()->useSvg(baseUrl('bootstrap/icons/'));

st()->elem('h4')->content('Default size', null)->render();

// render SVG icon with default size (24px x 24px)
$icons->render('toggles');
$icons->render('bell-fill');
$icons->render('bookmark-check');
$icons->render('calendar-date-fill');
$icons->render('cart-check');

echo '<br><br>';

st()->elem('h4')->content('Different sizes', null)->render();
$icons->render('toggles', 24, 24);
$icons->render('bell-fill', 32, 32);
$icons->render('bookmark-check', 48, 48);
$icons->render('calendar-date-fill', 60, 60);
$icons->render('cart-check', 100, 100);

echo '<br><br>';

st()->elem('h4')
    ->content('Overwrite default size', null)->render();
$icons2 = $icons->setDefaultSize(48, 48);
$icons2->render('toggles');
$icons2->render('bell-fill');
$icons2->render('bookmark-check');
$icons2->render('calendar-date-fill');
$icons2->render('cart-check');

echo '<br><br><br>';

st()->elem('h4')->content('Webfont Icons', 'strong')->render();
st()->elem('h5')->content('In addition to the SVG format, you can still use Webfont
format to generate your icons. This is also a good choice if you prefer a shorter code
to generate Bootstrap icons, but you still have to include Bootstrap Icons CSS file 
to your HTML. Webfont icons also do not support currentColor to automatically
match icons color with other HTML elements and overwriting default size. So you have to 
do it all manually.', null)->render();

echo '<br>';
st()->elem('h4')->content('Default size', null)->render();

icons()->font('toggles');
icons()->font('bell-fill');
icons()->font('bookmark-check');
icons()->font('calendar-date-fill');
icons()->font('cart-check');

echo '<br><br>';

st()->elem('h4')->content('Different sizes', null)->render();
icons()->font('toggles', '24px');
icons()->font('bell-fill', '32px');
icons()->font('bookmark-check', '48px');
icons()->font('calendar-date-fill', '60px');
icons()->font('cart-check', '100px');

echo '<br><br>';

st()->elem('h4')->content('Different colors', null)->render();
icons()->font('toggles', '24px', 'cornflowerblue');
icons()->font('bell-fill', '32px', 'cornflowerblue');
icons()->font('bookmark-check', '48px', 'cornflowerblue');
icons()->font('calendar-date-fill', '60px', 'cornflowerblue');
icons()->font('cart-check', '100px', 'cornflowerblue');