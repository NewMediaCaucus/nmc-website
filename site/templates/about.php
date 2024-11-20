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
    <div class="board-title">
        <h2>
            <?php

            // Access the 'board' key
            $board = $human['board'] ?? '';

            // Display the value of the 'board' key
            echo $board;
            ?>
        </h2>
    </div>
    <div class="about">
        
        <?php 
            $about = $page->children()
                                  ->listed()
                                  ->sortBy('date', 'desc') 
                                  ->paginate(9);
        ?>

        <?php
            $humans = $page->children()->listed();

        // Filter the humans by category 'officer'
        $officers = $humans->filterBy('category', 'officer');

        // Filter the humans by category 'board'
        $board_members = $humans->filterBy('category', 'board');
        ?>

        <!-- List Officers -->
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
                        <h2><?= $officer->Title() ?></h2>                     
                        <!-- Display NMC Title -->
                        <?php if ($officer->nmc_title()->isNotEmpty()): ?>
                            <p class="nmc_title"><?= $officer->nmc_title() ?></p>
                        <?php endif ?>
                        <!-- Display Professional Title -->
                        <?php if ($officer->professional_title()->isNotEmpty()): ?>
                            <p class="professional_title"><?= $officer->professional_title() ?></p>
                        <?php endif ?>
                        <!-- Display short description -->
                        <p class="description"><?= $officer->short_description() ?></p>
                        <!-- Read More Button -->
                        <a href="<?= $officer->url() ?>" class="button">
                            View Bio
                        </a>
                    </div>
                </div>
            <?php endif ?>              
        <?php endforeach ?> 

        <!-- List Board Members -->
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
                        <h2><?= $board_member->Title() ?></h2>                     
                        <!-- Display Professional Title -->
                        <?php if ($board_member->professional_title()->isNotEmpty()): ?>
                            <p class="professional_title"><?= $board_member->professional_title() ?></p>
                        <?php endif ?>
                        <!-- Display short description -->
                        <p class="description"><?= $board_member->short_description() ?></p>
                        <!-- Read More Button -->
                        <a href="<?= $board_member->url() ?>" class="button">
                            View Bio
                        </a>
                    </div>
                </div>
            <?php endif ?>              
        <?php endforeach ?> 
    </div>
    <ul>
</ul>


<!-- Submit an opportunity promo -->
<div class="promo">🪩 <a href="https://www.newmediacaucus.org/join/" >Become a Member!</a> 🐝</div>

</main>

<!-- bottom section -->
<?php snippet('footer') ?>
