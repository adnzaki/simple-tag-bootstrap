# simple-tag
A simple HTML writer for PHP lovers!

## Description
<strong><i>SimpleTag</i></strong> is a simple way to write HTML codes in PHP.
Rather than mixing HTML and PHP, you can write all of your HTML in fully PHP code.

## Why SimpleTag?
There are many different ways to write programmable HTML. Template engine could be
a good choice to avoid mixing PHP code and HTML. But it is not a good practice if 
you would like to have fast performance views while using template engine needs extra time 
to parse the template syntax into HTML. This is why Wordpress always has good performance because 
they do not use any template engine. But Wordpress' way has some lacks for long-term 
code base and hard to maintain. This is why SimpleTag created, you can still write high performance
views with readable and clean PHP codes!

## How-to
Using SimpleTag is very easy if you have good undestanding with HTML. It uses array
to create structured HTML element. The magic `content()` method simplifies the way you
write inner HTML. Here is a basic example of SimpleTag:
```
require 'SimpleTag.php';

$tag = new SimpleTag();
$elems = [
    'div' => ['class' => 'bold italic', 'id' => 'app'],
    'form' => ['id' => 'student-form', 'method' => 'post', 'action' => 'myweb.com']
];

$content = [
    'div' => [
        'class' => 'title', 
        'id' => 'site-title',
        'style' => [
            'background-color' => 'blue',
        ]
    ],
    'h1' => ['style' => ['text-decoration' => 'underline']]
];

$button = ['button' => ['type' => 'button', 'class' => 'btn', '@click' => 'greetings']];

$tag->elem($elems)
    ->content('Hello world!', $content)
    ->content('Above text written with fully PHP!', 'h2', [
        'h2' => ['font-style' => 'italic']
    ])
    ->content('Click me!', $button)
    ->content('{{ note }}', 'h3')
    ->render();
```
Above codes will produce:
```
<div class="bold italic" id="app">
    <form id="student-form" method="post" action="myweb.com">
        <div class="title" id="site-title" style="background-color: blue;">
            <h1 style="text-decoration: underline;">Hello world!</h1>
        </div>
        <h2 style=" font-style: italic;">Above text written with fully PHP!</h2>
        <button type="button" class="btn" @click="greetings">Click me!</button>
        <h3>{{ note }}</h3>
    </form>
</div>
```

## Using multiple same elements
Since SimpleTag uses array to create elements, so we cannot pass the same element tag in `elem()` method, for example: 
```
$elems = [
        'div' => ['class' => 'my-class'],
        'div' => ['class' => 'other-class'],
    ]
```
Above divs will be rendered as one element, so to resolve this problem, we have to add a "unique ID" on that element. Use code below to make it works:
```
$elems = [
        'div-1' => ['class' => 'my-class'],
        'div-2' => ['class' => 'other-class'],
    ]
```
In this case, you have to add "-" character before your unique ID. You can add anything after "-" character, but we recommend using incremental numbers to make them easy to read. SimpleTag will automatically render those same elements with the correct element tag.

## Text only content
There will be a case where you only want to put some texts into `contet()`. To handle this, you can pass `null` to the second argument of `content()`. By doing this, SimpleTag will not create any HTML element to the inner HTML.

## Vue.js user? You are in the right place!
SimpleTag is fully compatible to work with Vue.js as you can see in the above example. And of course, SimpleTag can also receive native Javascript event handling. Try it from `index.php` file! 

## Notes
This is early version of SimpleTag, it has minimum functionality to create HTML element with PHP,
but many things need to be improved and bugs to fix, so any contributions are welcome here...