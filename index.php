<!DOCTYPE html>
<html>

<head>
    <title>Kursverwaltunge</title>
    <meta charset="UTF-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML, CSS, XML, JavaScript">
    <meta name="author" content="saro">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/mycss.css">
</head>
<body>

<nav>
    <?php
    include 'navigation.php';
    ?>
</nav>

<?php
include 'config.php';
include 'functions/function.php';

if(isset($_GET['seite']))
{
    switch($_GET['seite'])
    {
        case 'list':
            include 'src/list.php';
            break;
        case 'registration':
            include 'src/registration.php';
            break;
        case 'join':
            include  'src/join.php';
            break;
        case 'start':
            include 'src/start.php';
            default;
    }
}
?>

</body>
</html>