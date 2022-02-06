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

// render SVG icon with default size (16px x 16px)
echo $icons->render('toggles');
echo $icons->render('bell-fill');
echo $icons->render('bookmark-check');
echo $icons->render('calendar-date-fill');
echo $icons->render('cart-check');

echo '<br><br>';

st()->elem('h4')->content('Different sizes', null)->render();
echo $icons->render('toggles', 24, 24);
echo $icons->render('bell-fill', 32, 32);
echo $icons->render('bookmark-check', 48, 48);
echo $icons->render('calendar-date-fill', 60, 60);
echo $icons->render('cart-check', 100, 100);

echo '<br><br>';

st()->elem('h4')
    ->content('Overwrite default size', null)->render();
$icons2 = $icons->setDefaultSize(48, 48);
echo $icons2->render('toggles');
echo $icons2->render('bell-fill');
echo $icons2->render('bookmark-check');
echo $icons2->render('calendar-date-fill');
echo $icons2->render('cart-check');

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

echo icons()->font('toggles');
echo icons()->font('bell-fill');
echo icons()->font('bookmark-check');
echo icons()->font('calendar-date-fill');
echo icons()->font('cart-check');

echo '<br><br>';

st()->elem('h4')->content('Different sizes', null)->render();
echo icons()->font('toggles', '24px');
echo icons()->font('bell-fill', '32px');
echo icons()->font('bookmark-check', '48px');
echo icons()->font('calendar-date-fill', '60px');
echo icons()->font('cart-check', '100px');

echo '<br><br>';

st()->elem('h4')->content('Different colors', null)->render();
echo icons()->font('toggles', '24px', 'cornflowerblue');
echo icons()->font('bell-fill', '32px', 'cornflowerblue');
echo icons()->font('bookmark-check', '48px', 'cornflowerblue');
echo icons()->font('calendar-date-fill', '60px', 'cornflowerblue');
echo icons()->font('cart-check', '100px', 'cornflowerblue');