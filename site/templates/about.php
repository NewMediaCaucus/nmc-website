<!-- nav section -->
<?php snippet('navigation') ?>

<!-- top section -->
<?php snippet('header') ?>


<!-- content section -->
<main>
    <!-- grab title from txt -->
    <div class="about-title">
        <h1><?= $page->title() ?></h1>
    </div>
    <p><?= $page->mission()->kirbytext() ?></p>
    <?php
        // Setup filters for each category
        $humans = $page->children()->listed();
        $officers = $humans->filterBy('category', 'officer');
        $board_members = $humans->filterBy('category', 'board');
        $advisory_members = $humans->filterBy('category', 'advisory');
        $alumni = $humans->filterBy('category', 'alumni');
    ?>

    <h2>Officers</h2>
    <!-- List Officers -->
    <div class="about">
        <?php foreach ($officers as $officer): ?>
            <!-- There can be moments when a human has no image. If so, skip it. -->
            <?php if($image = $officer->image()): ?>
                <div class="about">
                    <div class="post-image">
                        <a href="<?= $officer->url() ?>">
                            <!-- grab first image in project folder (alphabetically) -->
                            <img src="<?= $image->crop(468)->url() ?>" alt="<?= $officer->alt() ?>">
                        </a>
                    </div>
                    <div class="post">
                        <h3><?= $officer->Title() ?></h3>                     
                        <?php if ($officer->nmc_title()->isNotEmpty()): ?>
                            <p class="nmc_title"><?= $officer->nmc_title() ?></p>
                        <?php endif ?>
                        <?php if ($officer->professional_title()->isNotEmpty()): ?>
                            <p class="professional_title"><?= $officer->professional_title() ?></p>
                        <?php endif ?>
                        <p class="description"><?= $officer->short_description() ?></p>
                        <!-- Read More Button -->
                        <!-- <a href="<?= $officer->url() ?>" class="button">
                            View Bio
                        </a> -->
                    </div>
                </div>
            <?php endif ?>              
        <?php endforeach ?> 
    </div>

    <h2>Board Members</h2>
    <!-- List Board Members -->
    <div class="about">
        <?php foreach ($board_members as $board_member): ?>
            <!-- There can be moments when a human has no image. If so, skip it. -->
            <?php if($image = $board_member->image()): ?>
                <div class="about">
                    <div class="post-image">
                        <a href="<?= $board_member->url() ?>">
                            <!-- grab first image in project folder (alphabetically) -->
                            <img src="<?= $image->crop(468)->url() ?>" alt="<?= $board_member->alt() ?>">
                        </a>
                    </div>
                    <div class="post">
                        <h3><?= $board_member->Title() ?></h3>                     
                        <?php if ($board_member->professional_title()->isNotEmpty()): ?>
                            <p class="professional_title"><?= $board_member->professional_title() ?></p>
                        <?php endif ?>
                        <p class="description"><?= $board_member->short_description() ?></p>
                        <!-- Read More Button -->
                        <!-- <a href="<?= $board_member->url() ?>" class="button">
                            View Bio
                        </a> -->
                    </div>
                </div>
            <?php endif ?>              
        <?php endforeach ?> 
    </div>

    <h2>Advisory Board</h2>
    <!-- List Board Members -->
    <div class="about">
        <?php foreach ($advisory_members as $advisory_member): ?>
            <!-- There can be moments when a human has no image. If so, skip it. -->
            <?php if($image = $advisory_member->image()): ?>
                <div class="about">
                    <div class="post-image">
                        <a href="<?= $advisory_member->url() ?>">
                            <!-- grab first image in project folder (alphabetically) -->
                            <img src="<?= $image->crop(468)->url() ?>" alt="<?= $advisory_member->alt() ?>">
                        </a>
                    </div>
                    <div class="post">
                        <h3><?= $advisory_member->Title() ?></h3>                     
                        <?php if ($advisory_member->professional_title()->isNotEmpty()): ?>
                            <p class="professional_title"><?= $advisory_member->professional_title() ?></p>
                        <?php endif ?>
                        <p class="description"><?= $advisory_member->short_description() ?></p>
                        <!-- Read More Button -->
                        <a href="<?= $advisory_member->url() ?>" class="button">
                            View Bio
                        </a>
                    </div>
                </div>
            <?php endif ?>              
        <?php endforeach ?> 
    </div>

    <h2>Board Alumni & Past Leadership</h2>
    <!-- List Board Members -->
    <p><?= $page->alumni()->kirbytext() ?></p>

<!-- Submit an opportunity promo -->
<div class="promo">🪩 <a href="https://www.newmediacaucus.org/join/" >Become a Member!</a> 🐝</div>

</main>

<!-- bottom section -->
<?php snippet('footer') ?>
