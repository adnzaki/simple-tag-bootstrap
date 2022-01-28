<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
</head>
<body>
<table>
<?php
require 'SimpleTag.php';

$tag = new SimpleTag();
$tr = ['tr' => []];

$tag->elem($tr)
    ->content('No', 'th')
    ->content('Nama', 'th')
    ->render();

    
for($i = 1; $i <= 5; $i++)
{
    $tag->elem($tr)
        ->content($i, 'td')
        ->content('Adnan Zaki ' . $i, 'td')
        ->render();
}

?>
</table>
<script src="./js/app.js"></script>
</body>
</html>