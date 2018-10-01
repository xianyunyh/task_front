<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>">
        <title>GO!GO!GO</title>
    </head>
    <body>
        <div id="app">
            <router-view></router-view>
        </div>
    </body>
    <script src="<?php echo e(mix('js/app.js')); ?>"></script>
</html>
