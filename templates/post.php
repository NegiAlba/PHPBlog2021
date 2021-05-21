    <?php
        require 'includes/header.php';
    ?>
    <article class=" container message is-warning my-5">
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
    <div class="buttons container">
    <button class="button is-small backToHome is-primary is-light"><a href="/phpblog2021/">Retour à
            l'accueil</a></button>
    <a class="button is-small is-warning" href="/phpblog2021/public/edit/<?php echo $article->getId(); ?>">Editer l'article</button>
    <a class="button is-small is-danger" href="/phpblog2021/public/delete/<?php echo $article->getId(); ?>">Supprimer l'article</a>
    </div>

    <section id="comments">
        <div class="container block">
        
                <p><small>Ajouter un nouveau commentaire</small></p>
                <form action="" method="post" class="box">
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="e.g Alex Smith" name="author">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Comment</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="e.g. I really loved your content, keep up the good work ! 💕" name="content">
                    </div>
                </div>
                <div class="control">
					<button type="submit" class="button is-link is-small" name="comment_submit">Send Message</button>
				</div>
                </form>
            <?php
            foreach ($comments as $comment) {
                ?>
            <div class="box">
                <div class="media-content">
                    <div class="content">
                    <div class="block">
                    <form action="" method="post">
                    <span class="tag is-danger">
                        Delete
                        <input type="hidden" value="<?php echo $comment->getId(); ?>" name="comment_id">
                        <button type="submit" class="delete is-small" name="comment_delete"></button>
                    </span>
                    </form>
                    </div>
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