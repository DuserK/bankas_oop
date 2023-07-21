<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6b553b78cb.js" crossorigin="anonymous"></script>
    <script src="/app.js"></script>  
    <title><?= $pageTitle ?? 'Untitled'?></title>
</head>
<body>
    <div class="container content">
        <?php if(!isset($inLogin)): ?>
        <?php require 'nav.php' ?>
        <?php endif ?>
        <?php require 'Messages.php' ?>
       
 
        