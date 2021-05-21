<?php

require 'includes/header.php';

?>

<form action="" method="post">
<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label">Title of post</label>
  </div>
  <div class="field-body">
    <div class="field">
      <div class="control">
        <input class="input" type="text" placeholder="e.g. Such a wonderful day today." name="title" value="<?php echo isset($article) ? $article->getTitle() : ''; ?>">
      </div>
      <p class="help is-info">
        A great article needs a great title.
      </p>
    </div>
  </div>
</div>
<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label">Themes</label>
  </div>
  <div class="field-body">
    <div class="field">
      <div class="control">
        <input class="input" type="text" placeholder="e.g. Tech, Health" name="theme" value="<?php echo isset($article) ? $article->getTheme() : ''; ?>">
      </div>
      <p class="help is-info">
        You can use commas to separate themes.
      </p>
    </div>
  </div>
</div>

<div class="field is-horizontal">
  <div class="field-label is-normal">
    <label class="label">Post Content</label>
  </div>
  <div class="field-body">
    <div class="field">
      <div class="control">
        <textarea class="textarea" placeholder="Explain how we can help you" name="content"><?php echo isset($article) ? $article->getContent() : ''; ?></textarea>
      </div>
    </div>
  </div>
</div>

<div class="field is-horizontal">
  <div class="field-label">
    <!-- Left empty for spacing -->
  </div>
  <div class="field-body">
    <div class="field">
      <div class="control">
        <button class="button is-primary" type="submit" name="form_submit">
          Send form
        </button>
      </div>
    </div>
  </div>
</div>
</form>