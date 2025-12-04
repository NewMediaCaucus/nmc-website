<!-- top section -->
<?php snippet('header') ?>

<!-- nav section -->
<?php snippet('navigation') ?>

<!-- content section -->
<main>
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
    <!-- List Current -->
    <!-- List First Host, Second Host, Other Collaborators -->
    <div class="about">
        <div class="about-human">
            <div class="post-image">
                <?php if ($promo = $page->host1_headshot()->toFile()): ?>
                    <img src="<?= $promo->crop(468)->url() ?>" alt="<?= $page->host1_headshot_alt() ?>">
                <?php endif ?>
            </div>
            <div class="post">
                <h3><?= $page->host1_name()->html() ?></h3>
                <p><?= $page->host1_title()->kirbytext() ?></p>
                <?php if ($page->host1_bio_link()->isNotEmpty()): ?>
                    <a href="<?= $page->host1_bio_link()->url() ?>" class="button">
                        View Bio
                    </a>
                <?php endif ?>
            </div>
        </div>

        <div class="about-human">
            <div class="post-image">
                <?php if ($promo = $page->host2_headshot()->toFile()): ?>
                    <img src="<?= $promo->crop(468)->url() ?>" alt="<?= $page->host2_headshot_alt() ?>">
                <?php endif ?>
            </div>
            <div class="post">
                <h3><?= $page->host2_name()->html() ?></h3>

                <p><?= $page->host2_title()->kirbytext() ?></p>
                <?php if ($page->host2_bio_link()->isNotEmpty()): ?>
                    <a href="<?= $page->host2_bio_link()->url() ?>" class="button">
                        View Bio
                    </a>
                <?php endif ?>
            </div>
        </div>
        <div class="about-human">
            <div class="post">
                <h4>Guest Curators</h4>
                <?= $page->guest_curators_list()->kirbytext() ?>
            </div>
        </div>
        <div class="about-human">
            <div class="post">
                <h4>Curatorial Assistants</h4>
                <?= $page->curatorial_assistants_list()->kirbytext() ?>
            </div>
        </div>
    </div>
    <h2>Current Exhibition</h2>
    <div class="opportunities">
        <div class="opportunity">

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

                        <ul class="header-footer-gallery-ul">
                            <li>
                                <?php if ($current->link()->isNotEmpty()): ?>
                                    <?= $current->link()->kirbytext() ?></p>
                                <?php endif ?>
                            </li>

                            <li class="artist_name">
                                <?= $current->artist_name()->kirbytext() ?>
                            </li>
                        </ul>

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
    </div>

    <h2>Exhibition Archive</h2>
    <div class="opportunity">
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