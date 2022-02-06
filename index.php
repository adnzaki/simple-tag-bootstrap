<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SimpleTag with Boostrap</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/icons/font/bootstrap-icons.css">
    <style>
        .bd-example {
            padding: 1.5rem;
            margin-right: 0;
            margin-left: 0;
            border-width: 1px;
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="bd-example">
        <?php
        require_once 'wrapper.php';

        // Just uncomment one of codes below to see it on the browser
        // require_once 'components/accordion/accordion-sample.php';
        // require_once 'components/button/button-sample.php';
        // require_once 'components/icons/icons-sample.php';
        require_once 'components/alert/alert-sample.php';
        ?>
        </div>
    </div>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>