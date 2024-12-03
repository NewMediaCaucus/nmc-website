<!-- top section -->
<?php snippet('header') ?>

<!-- nav section -->
<?php snippet('navigation') ?>

<!-- content section -->

<?php snippet('header') ?>

<main>

<h1>Blog</h1>

<!-- articles -->
<?php foreach($articles as $article): ?>

    <?php if($image = $article->image()): ?>
        <!-- TODO: What div should go around this image? -->
        <img  
            src="<?= $image->crop(250,250)->url() ?>" 
            alt="<?= $page->alt()->value() ?>" 
        width="250px">
    <?php endif ?>

<article>
  <h1><a href="<?= $article->url() ?>"><?= $article->title()->html() ?></a></h1>
  <?= $article->text()->excerpt(300) ?>
</article>
<?php endforeach ?>

<!-- sidebar with tagcloud -->
<aside>
  <h1>Tag Cloud</h1>
  <ul class="tags">
    <?php foreach($tags as $tag): ?>
    <li>
      <a href="<?= url($page->url(), ['params' => ['tag' => $tag]]) ?>">
        <?= html($tag) ?>
      </a>
    </li>
    <?php endforeach ?>
  </ul>
</aside>

<!-- pagination -->
<nav class="pagination">
  <?php if($pagination->hasPrevPage()): ?>
  <a href="<?= $pagination->prevPageUrl() ?>">previous posts</a>
  <?php endif ?>

  <?php if($pagination->hasNextPage()): ?>
  <a href="<?= $pagination->nextPageUrl() ?>">next posts</a>
  <?php endif ?>
</nav>

<!-- Submit an opportunity promo -->
<div class="promo">📣 <a href="https://docs.google.com/forms/d/e/1FAIpQLSczR9Ct3qaWETS72DoIO03LlLTeIWF8sSQxMvnTNwfs0aXAHA/viewform" >Got an Opportunity? Post It!</a> 🦄</div>

</main>

<!-- bottom section -->
<?php snippet('footer') ?>
