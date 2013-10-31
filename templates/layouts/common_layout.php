<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?= $data['title'] ?></title>
    </head>
    <body>
        <div style="height: 150px; border:  1px solid blue">
            <?php
            include $data['header'];
            ?>
        </div>
        <div style="border: 1px solid red">
            <?php
            include $data['content'];
            ?>
        </div>

    </body>
</html>