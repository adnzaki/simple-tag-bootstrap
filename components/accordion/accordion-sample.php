<?php

// You can choose to write your HTML in SimpleTag or separate file
$content1 = file_get_contents(basePath('custom-slots/list.php'));

$content2 = 'This is the second item\'s accordion body.';

// create custom accordion ID (optional)
// skip this step if you want to use default ID
$accordion = accordion()->id('accordionSample');

// use code below to make custom ID and always open accordion 
// $accordion = accordion()->id('accordionSample')->setAlwaysOpen();

// use code below to set accordion to be always open after it has opened
// $accordion = accordion()->setAlwaysOpen();

// generate accordion open tag
$accordion->open();

// use code below to set accordion flush
// $accordion->open(true);

// accordion item
$accordion->item('headingOne', 'collapseOne', 'Button 1', $content1, true);
$accordion->slot('p')->item('headingTwo', 'collapseTwo', 'Button 2', $content2, false);
$accordion->slot('h4 > strong')->item('headingThree', 'collapseThree', 'Button 3', 'Hello World!', false);

// close accordion tag
close_tag();