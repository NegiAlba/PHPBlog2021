<?php

    require 'config/autoloader.php';

    $article = new Article(['id' => 1, 'title' => 'Voici mon titre', 'content' => 'Un contenu de blog détaillé', 'theme' => 'Santé, Tech', 'createdAt' => new DateTime(), 'updatedAt' => new DateTime()]);

    echo '<pre>';
    var_dump($article);
    echo '</pre>';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>
    <title>DevBlog Fullstack 2021</title>
</head>

<body>
    <section class="hero is-medium is-primary is-bold">
        <div class="hero-body">
            <div class="container">
                <span class="icon is-large">
                    <i class="fab fa-dev fa-3x"></i>
                </span>
                <h1 class="title">
                    DevBlog : A Blog for Developpers
                </h1>
                <h2 class="subtitle">
                    Engineered at Talis Business School
                </h2>
                <p>En construction@Fullstack 2021</p>
            </div>
        </div>
    </section>
</body>

</html>