<!-- top section -->
<?php snippet('header') ?>

<!-- nav section -->
<?php snippet('navigation') ?>

<!-- content section -->
<main>
    <!-- grab title from txt -->
    <div class="galleries-title">
        <h1><?= $page->title() ?></h1>
    </div>
    <p><?= $page->description()->kirbytext() ?></p>
    <?php
    // Setup filters for each category
    $galleries = $page->children()->listed();
    $current_galleries = $galleries->filterBy('category', 'current');
    $previous_galleries = $galleries->filterBy('category', 'previous');
    ?>

    <h2>Current</h2>
    <!-- List Current -->
    <div class="galleries">
        <?php foreach ($current_galleries as $current): ?>
            <!-- There can be moments when an gallery has no image. If so, skip it. -->
            <?php if ($image = $current->image()): ?>
                <div class="gallery">
                    <div class="post-image">
                        <a href="<?= $current->url() ?>">
                            <!-- grab first image in project folder (alphabetically) -->
                            <img src="<?= $image->crop(468)->url() ?>" alt="<?= $current->alt() ?>">
                        </a>
                    </div>
                    <div class="post">
                        <a href="<?= $current->url() ?>">
                            <!-- Get the title of the gallery -->
                            <h3><?= $current->title() ?></h3>
                        </a>
                        <!-- Display short description -->
                        <p class="description"><?= $current->short_description()->kirbytext() ?></p>
                        <!-- Read More Button -->
                        <a href="<?= $current->url() ?>" class="button">
                            View Gallery
                        </a>
                    </div>
                </div>
            <?php endif ?>
        <?php endforeach ?>
    </div>

    <h2>Previous</h2>
    <!-- List Previous -->
    <div class="galleries">
        <?php foreach ($previous_galleries as $previous): ?>
            <!-- There can be moments when an gallery has no image. If so, skip it. -->
            <?php if ($image = $previous->image()): ?>
                <div class="gallery">
                    <div class="post-image">
                        <a href="<?= $previous->url() ?>">
                            <!-- grab first image in project folder (alphabetically) -->
                            <img src="<?= $image->crop(468)->url() ?>" alt="<?= $previous->alt() ?>">
                        </a>
                    </div>
                    <div class="post">
                        <a href="<?= $previous->url() ?>">
                            <!-- Get the title of the gallery -->
                            <h3><?= $previous->title() ?></h3>
                        </a>
                        <!-- Display short description -->
                        <p class="description"><?= $previous->short_description()->kirbytext() ?></p>
                        <!-- Read More Button -->
                        <a href="<?= $previous->url() ?>" class="button">
                            View Gallery
                        </a>
                    </div>
                </div>
            <?php endif ?>
        <?php endforeach ?>
    </div>

</main>

<!-- bottom section -->
<?php snippet('footer') ?>