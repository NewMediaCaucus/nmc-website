<!-- top section -->
<?php snippet('header') ?>

<!-- nav section -->
<?php snippet('navigation') ?>

<!-- content section -->
<main>
    <!-- grab title from opportunities.txt -->
    <div class="opportunities-title">
        <h1><?= $page->title() ?></h1>
    </div>
    <div class="opportunities">
        <!-- grab all children folders and list them -->
        <div class="opportunity-row">
            <?php foreach ($page->children()->listed() as $opportunity): ?>
            <div class="opportunity">
                <div class="post-image">
                    <a href="<?= $opportunity->url() ?>">
                        <!-- grab first image in project folder (alphabetically) -->
                        <?= $opportunity->image()->crop(320, 320, 320) ?>                  
                    </a>
                </div>
                <div class="post">
                    <a href="<?= $opportunity->url() ?>">
                        <!-- pull from sections defined in each opportunity text file -->
                        <h2><?= $opportunity->Title() ?></h2>                    
                    </a>
                    <p class="description"><?= $opportunity->Description() ?></p>
                    <p class="due-date">DEADLINE: <?= $opportunity->Due() ?><p class="due-date">
                </div>
            </div>
            <?php endforeach ?> 
        </div>
    </div>
</main>

<!-- bottom section -->
<?php snippet('footer') ?>
