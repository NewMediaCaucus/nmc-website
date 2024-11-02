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
        <!-- grab all children folders and list them -->
        <?php foreach ($page->children()->listed() as $opportunity): ?>
            <?php if($image = $opportunity->image()): ?>
                <div class="opportunity">
                    <div class="post-image">
                        <a href="<?= $opportunity->url() ?>">
                            <!-- grab first image in project folder (alphabetically) -->
                            <?= $image->crop(468) ?>
                        </a>
                    </div>
                    <div class="post">
                        <a href="<?= $opportunity->url() ?>">
                            <!-- pull from sections defined in each opportunity text file -->
                            <h2><?= $opportunity->Title() ?></h2>                    
                        </a>
                        <p class="description"><?= $opportunity->Description() ?></p>
                        <!-- Read More Button -->
                        <a href="<?= $opportunity->url() ?>" class="button">
                            View Post
                        </a>
                    </div>
                </div>
            <?php endif ?>              
        <?php endforeach ?> 
    </div>
</main>

<!-- bottom section -->
<?php snippet('footer') ?>
