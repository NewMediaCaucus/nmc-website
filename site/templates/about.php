<!-- top section -->
<?php snippet('header') ?>

<!-- nav section -->
<?php snippet('navigation') ?>

<!-- content section -->
<main>
    <!-- grab title from txt -->
    <div class="about-title">
        <h1><?= $page->title() ?></h1>
    </div>
    <p><?= $page->mission()->kirbytext() ?></p>
    <?php
        // Setup filters for each category
        // leave /about and grab children of /people
        $humans = $site->find('people')->children();
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
                <div class="about-human">
                    <div class="post-image">
                        <?php if ($officer->bio()->isNotEmpty()): ?>
                            <a href="<?= $officer->url() ?>">
                                <!-- grab first image in project folder (alphabetically) -->
                                <img src="<?= $image->crop(468)->url() ?>" alt="<?= $officer->alt() ?>">
                            </a>
                            <?php else: ?>
                                <!-- Display image without link -->
                                <img src="<?= $image->crop(468)->url() ?>" alt="<?= $officer->alt() ?>">
                            <?php endif ?>
                    </div>
                    <div class="post">
                        <h3>
                            <?php if ($officer->bio()->isNotEmpty()): ?>
                            <!-- The human's name is stored as the page title. -->
                                <a href="<?= $officer->url() ?>">
                                    <?= $officer->title()->html() ?>
                                </a>
                            <?php else: ?>
                                <?= $officer->title() ?>
                            <?php endif ?>
                        </h3>                     
                        <?php if ($officer->nmc_title()->isNotEmpty()): ?>
                            <p class="nmc-title"><?= $officer->nmc_title() ?></p>
                        <?php endif ?>
                        <?php if ($officer->professional_title()->isNotEmpty()): ?>
                            <p class="professional-title"><?= $officer->professional_title() ?></p>
                        <?php endif ?>
                        <!-- Read More Button -->
                        <?php if ($officer->bio()->isNotEmpty()): ?>
                            <a href="<?= $officer->url() ?>" class="button">
                                View Bio
                            </a>
                        <?php endif ?>
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
                <div class="about-human">
                <div class="post-image">
                        <?php if ($board_member->bio()->isNotEmpty()): ?>
                            <a href="<?= $board_member->url() ?>">
                                <!-- grab first image in project folder (alphabetically) -->
                                <img src="<?= $image->crop(468)->url() ?>" alt="<?= $board_member->alt() ?>">
                            </a>
                            <?php else: ?>
                                <!-- Display image without link -->
                                <img src="<?= $image->crop(468)->url() ?>" alt="<?= $board_member->alt() ?>">
                            <?php endif ?>
                    </div>
                    <div class="post">
                    <h3>
                        <?php if ($board_member->bio()->isNotEmpty()): ?>
                        <!-- The human's name is stored as the page title. -->
                            <a href="<?= $board_member->url() ?>">
                                <?= $board_member->title()->html() ?>
                            </a>
                        <?php else: ?>
                            <?= $board_member->title() ?>
                        <?php endif ?>
                    </h3>                     
                        <?php if ($board_member->professional_title()->isNotEmpty()): ?>
                            <p class="professional-title"><?= $board_member->professional_title() ?></p>
                        <?php endif ?>
                        <!-- Read More Button -->
                        <?php if ($board_member->bio()->isNotEmpty()): ?>
                            <a href="<?= $board_member->url() ?>" class="button">
                                View Bio
                            </a>
                        <?php endif ?>
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
                <div class="about-human">
                <div class="post-image">
                        <?php if ($advisory_member->bio()->isNotEmpty()): ?>
                            <a href="<?= $advisory_member->url() ?>">
                                <!-- grab first image in project folder (alphabetically) -->
                                <img src="<?= $image->crop(468)->url() ?>" alt="<?= $advisory_member->alt() ?>">
                            </a>
                            <?php else: ?>
                                <!-- Display image without link -->
                                <img src="<?= $image->crop(468)->url() ?>" alt="<?= $advisory_member->alt() ?>">
                            <?php endif ?>
                    </div>
                    <div class="post">
                    <h3>
                        <?php if ($advisory_member->bio()->isNotEmpty()): ?>
                        <!-- The human's name is stored as the page title. -->
                            <a href="<?= $advisory_member->url() ?>">
                                <?= $advisory_member->title()->html() ?>
                            </a>
                        <?php else: ?>
                            <?= $advisory_member->title() ?>
                        <?php endif ?>
                    </h3>                           
                        <?php if ($advisory_member->professional_title()->isNotEmpty()): ?>
                            <p class="professional-title"><?= $advisory_member->professional_title() ?></p>
                        <?php endif ?>
                        <!-- Read More Button -->
                        <?php if ($advisory_member->bio()->isNotEmpty()): ?>
                            <a href="<?= $advisory_member->url() ?>" class="button">
                                View Bio
                            </a>
                        <?php endif ?>
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
