    <?php
        require 'includes/header.php';
    ?>
    <article class="message is-warning my-5">
        <div class="message-header">
            <h2><?php echo $article->getTitle(); ?>
            </h2>
            <p><small>Crée le :
                    <?php echo $article->getCreatedAt(); ?> </small>
            </p>

        </div>
        <div class="message-body">
            <p><?php echo $article->getContent(); ?>
            </p>
        </div>
    </article>
    <button class="button is-small backToHome is-primary is-light"><a href="../index.php">Retour à
            l'accueil</a></button>

    <section id="comments">
        <div class="container">

            <h3>Espace commentaires</h3>
            <?php
            var_dump($comments);
            foreach ($comments as $comment) {
                ?>
            <div class="box">
                <div class="media-content">
                    <div class="content">
                        <p>
                            <strong>
                                <h4><?php echo $comment->getAuthor(); ?>
                                </h4>
                            </strong> <small>
                                <p><?php echo $comment->getCreatedAt(); ?>
                                </p>
                            </small>
                            <br>
                        <p><?php echo $comment->getContent(); ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php
            }
        ?>
        </div>
    </section>
</body>

</html>