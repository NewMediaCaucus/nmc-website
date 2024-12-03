<!-- top section -->
<?php snippet('header') ?>

<!-- nav section -->
<?php snippet('navigation') ?>

<!-- content section -->
<main>
    <br><br>
    <!-- grab title from opportunities.txt -->
    <div class="opportunities-title">
        <h1><?= $page->title() ?></h1>
    </div>
    <p><?= $page->description()->kirbytext() ?></p>
    <?php
    // Setup filters for each category
    $shows = $page->children()->listed();
    $current_shows = $shows->filterBy('category', 'current');
    $previous_shows = $shows->filterBy('category', 'previous');
    ?>
    <h2>Current</h2>
    <!-- List Current -->
    <div class="opportunities">
        <?php foreach ($current_shows as $current): ?>
            <!-- There can be moments when an opp has no image. If so, skip it. -->
            <!-- <?php if ($image = $current->promo_image()): ?> -->
            <?php $image = $current->image() ?>
            <div class="opportunity">
                <div class="post-image">
                    <a href="<?= $current->url() ?>">
                        <?php if ($promo = $current->promo_image()->toFile()): ?>
                            <img src="<?= $promo->crop(468)->url() ?>" alt="<?= $current->promo_image_alt() ?>">
                        <?php endif ?>
                    </a>
                </div>
                <div class="post">
                    <a href="<?= $current->url() ?>">
                        <!-- pull from sections defined in each opportunity text file -->
                        <h2><?= $current->Title() ?></h2>
                    </a>
                    <!-- Display artist name -->
                    <p class="artist_name"><?= $current->artist_name()->kirbytext() ?></p>
                    <!-- Display short description -->
                    <p class="description"><?= $current->short_description()->kirbytext() ?></p>
                    <!-- Read More Button -->
                    <a href="<?= $current->url() ?>" class="button">
                        View Details
                    </a>
                </div>
            </div>
            <!-- <?php endif ?> -->
        <?php endforeach ?>
    </div>

    <h2>Previous</h2>
    <!-- List Previous -->
    <div class="opportunities">
        <?php foreach ($previous_shows as $previous): ?>
            <!-- There can be moments when an opp has no image. If so, skip it. -->
            <!-- <?php if ($image = $previous->promo_image()): ?> -->
            <?php $image = $previous->image() ?>
            <div class="opportunity">
                <div class="post-image">
                    <a href="<?= $previous->url() ?>">
                        <?php if ($promo = $previous->promo_image()->toFile()): ?>
                            <img src="<?= $promo->crop(468)->url() ?>" alt="<?= $previous->promo_image_alt() ?>">
                        <?php endif ?>
                    </a>
                </div>
                <div class="post">
                    <a href="<?= $previous->url() ?>">
                        <!-- pull from sections defined in each opportunity text file -->
                        <h2><?= $previous->Title() ?></h2>
                    </a>
                    <!-- Display artist name -->
                    <p class="artist_name"><?= $previous->artist_name()->kirbytext() ?></p>
                    <!-- Display short description -->
                    <!-- Display short description -->
                    <p class="description"><?= $previous->short_description()->kirbytext() ?></p>
                    <!-- Read More Button -->
                    <a href="<?= $previous->url() ?>" class="button">
                        View Details
                    </a>
                </div>
            </div>
            <!-- <?php endif ?> -->
        <?php endforeach ?>
    </div>
    <br><br>
</main>

<!-- bottom section -->
<?php snippet('footer') ?>