<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Tag</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
</head>
<body>
    <?php 

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
    ?>
    <script src="./js/app.js"></script>
</body>
</html>