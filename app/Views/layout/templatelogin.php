<!doctype html>
<html>
<head>
    <meta charset="utf-8">

    <title> Prontuário Médico </title>
    <!-- Bootstrap Core CSS -->
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/public/css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>

<?php if (isset($viewName)) { $path = viewsPath() . $viewName . '.php'; if (file_exists($path)) { require_once $path; } } ?>

<script src="/public/js/bootstrap.min.js"></script>
<scrip src="/public/js/metisMenu.min.js"></scrip>
</body>
</html>