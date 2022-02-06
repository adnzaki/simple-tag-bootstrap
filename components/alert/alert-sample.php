<?php

// basic alert
alert()->text('Hello, this is a basic alert!')->render('primary');

// alert with link
alert()->text('A simple light alert with ')
       ->link('#', 'an example link.')
       ->text('Give it a click if you like.')
       ->render('success');

// alert with additional content
// ---------------------------------------------
// Create additional content with SimpleTag to avoid using HTML between PHP codes
// ---------------------------------------------
// Note:
// you can also create additional content with plain HTML string
// or with separated PHP file that contains HTML and grab its content
// to be passed to text() method
$additionalContent = st()->elem('div')
                         ->content('Well done!', ['h4' => ['class' => 'alert-heading']])
                         ->content('This is alert with additional content', 'p')
                         ->content('', 'hr')
                         ->content('You can add unlimited content to alert.', ['p' => ['class' => 'mb-0']])
                         ->render(true);

alert()->text($additionalContent)->render('info');

// Alert with icon
// ---------------------------------------------
// Init alert and icons
$alert = alert()->addClass('d-flex align-items-center');
$icons = icons()->useSvg(baseUrl('bootstrap/icons/'))->addClass('flex-shrink-0 me-2');

$alert->text($icons->render('bookmark-check-fill', 32, 32))
      ->text('An example alert with SVG icon', 'div')
      ->render('danger');

$alert->text(icons()->addClass('flex-shrink-0 me-2')->font('calendar-date-fill', '2rem'))
      ->text('An example alert with webfont icon', 'div')
      ->render('secondary');

// create dismissible alert
alert()->dismiss('warning') // pass the color here in Dismissible Alert
       ->text('Hello, ', 'strong')
       ->text('this is a dimissible alert created with SimpleTagBootstrap!.')
       ->render(); // let $color argument empty in Dismissible Alert