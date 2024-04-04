<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/baumarkt2/public/styles/style.css">
    <link rel="stylesheet" type="text/css" href="/baumarkt2/public/styles/home.css">
    <link rel="stylesheet" type="text/css" href="/baumarkt2/public/styles/products.css">
    <link rel="stylesheet" type="text/css" href="/baumarkt2/public/styles/product.css">
    <link rel="stylesheet" type="text/css" href="/baumarkt2/public/styles/bestellung.css">
    <link rel="stylesheet" type="text/css" href="/baumarkt2/public/styles/bestellungen.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&family=Patrick+Hand&family=Roboto&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/cfc2c361a5.js" crossorigin="anonymous"></script>
    <title><?php echo $page['title'] ?></title>
</head>
<body>
    <!-- // Header // -->
    <?php include_once VIEW_PATH . 'layouts/header.php' ?>

    <!-- // Section // -->
    <section class="padding <?php echo $data['section'] ?>">

        <!-- // Content // -->
        <?php
            include_once VIEW_PATH . $file . '.php';
        ?>

    </section>

    <!-- // Footer // -->
    <?php include_once VIEW_PATH  . 'layouts/footer.php' ?>
</body>
</html>