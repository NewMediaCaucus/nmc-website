<!-- nav section -->
<?php snippet('navigation') ?>

<!-- top section -->
<?php snippet('header') ?>


<!-- content section -->
<main>
    <!-- grab title from opportunities.txt -->
    <div class="opportunities-title">
        <h1><?= $page->title() ?></h1>
    </div>
    <div class="opportunities">
        <!-- grab all children folders and sort by date -->
        <?php $opportunities = $page->children()
                                  ->listed()
                                  ->sortBy('date', 'desc') // Sort by date field, newest first
                                  ->paginate(10); ?>
        <?php foreach ($opportunities as $opportunity): ?>
            <!-- There can be moments when an opp has no image. If so, skip it. -->
            <?php if($image = $opportunity->image()): ?>
                <div class="opportunity">
                    <div class="post-image">
                        <a href="<?= $opportunity->url() ?>">
                            <!-- grab first image in project folder (alphabetically) -->
                            <img src="<?= $image->crop(468)->url() ?>" alt="<?= $opportunity->alt() ?>">

                        </a>
                    </div>
                    <div class="post">
                        <a href="<?= $opportunity->url() ?>">
                            <!-- pull from sections defined in each opportunity text file -->
                            <h2><?= $opportunity->Title() ?></h2>                    
                        </a>   
                        <!-- Display category options -->
                        <?php if ($opportunity->category()->isNotEmpty()): ?>
                            <p class="categories">
                                <?php
                                $field = $opportunity->blueprint()->field('category');
                                $value = $opportunity->category()->value();
                                foreach ($opportunity->category()->split() as $category):
                                    echo $field['options'][$value] ?? $value;
                                endforeach;
                                ?>
                            </p>
                            <?php endif ?>
                        <!-- Display created date -->
                        <p class="created-date">
                            Posted <?= $opportunity->date()->toDate('F j, Y') ?>
                        </p>
                        <!-- Display short description -->
                        <p class="description"><?= $opportunity->short_description() ?></p>
                        <!-- Read More Button -->
                        <a href="<?= $opportunity->url() ?>" class="button">
                            View Post
                        </a>
                    </div>
                </div>
            <?php endif ?>              
        <?php endforeach ?> 
    </div>
    <ul>
</ul>

<!-- Pagination -->
<?php if ($opportunities->pagination()->hasPages()): ?>
<nav class="pagination">

  <?php if ($opportunities->pagination()->hasNextPage()): ?>
  <a class="next" href="<?= $opportunities->pagination()->nextPageURL() ?>">
    ‹ older posts
  </a>
  <?php endif ?>

  <?php if ($opportunities->pagination()->hasPrevPage()): ?>
  <a class="prev" href="<?= $opportunities->pagination()->prevPageURL() ?>">
    newer posts ›
  </a>
  <?php endif ?>

</nav>
<?php endif ?>

<!-- Submit an opportunity promo -->
<div class="promo">📣 Got an opportunity? <a href="https://www.newmediacaucus.org/submit/" >Post It!</a> 🦄</div>

</main>

<!-- bottom section -->
<?php snippet('footer') ?>
