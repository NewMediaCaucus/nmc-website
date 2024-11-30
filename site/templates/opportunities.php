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

    <!-- site/controllers/opportunities.php is defining the $opportunities variable -->

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
                            <?php
                            $field = $opportunity->blueprint()->field('category');
                            $value = $opportunity->category()->value();
                            foreach ($opportunity->category()->split() as $category):
                                // Determine the category URL part
                                $categoryUrl = strtolower($value);
                                if (substr($categoryUrl, -1) === 'y') {
                                    $categoryUrl = substr($categoryUrl, 0, -1) . 'ies';
                                } else {
                                    $categoryUrl .= 's';
                                }
                            ?>
                            <a href="<?= url('opportunities/' . $categoryUrl) ?>" class="category">
                                <?= $field['options'][$value] ?? $value ?>
                            </a>
                            <?php endforeach; ?>
                        <?php endif ?>
                        
                        <!-- Display posted date -->
                        <div class="posted-date">
                            Posted <?= $opportunity->date()->toDate('F j, Y') ?>
                            </div>
                        <!-- Display short description -->
                        <p class="description"><?= $opportunity->short_description()->kirbytext() ?></p>
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
    <a href="<?= $opportunities->pagination()->nextPageURL() ?>" rel="next">
      Older Posts
    </a>
  <?php endif ?>

  <?php if ($opportunities->pagination()->hasPrevPage()): ?>
    <a href="<?= $opportunities->pagination()->prevPageURL() ?>" rel="prev">
      Newer Posts
    </a>
  <?php endif ?>
</nav>
<?php endif ?>

<!-- Submit an opportunity promo -->
<div class="promo">📣 <a href="https://docs.google.com/forms/d/e/1FAIpQLSczR9Ct3qaWETS72DoIO03LlLTeIWF8sSQxMvnTNwfs0aXAHA/viewform" >Got an Opportunity? Post It!</a> 🦄</div>

</main>

<!-- bottom section -->
<?php snippet('footer') ?>
