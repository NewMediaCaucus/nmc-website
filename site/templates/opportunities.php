<!-- top section -->
<?php snippet('header') ?>

<!-- nav section -->
<?php snippet('navigation') ?>

<!-- content section -->
<main class="opportunities">
    <!-- grab title from opportunities.txt -->
    <h1><?= $page->title() ?></h1>
    <div class="opportunities-list">
        <!-- grab all children folders and list them -->
        <?php foreach ($page->children()->listed() as $opportunity): ?>
        <section class="opportunity">
            <a href="<?= $opportunity->url() ?>">
                <!-- grab first image in project folder (alphabetically) -->
                <?= $opportunity->image()->crop(450, 450, 450) ?>                  
            </a>
            <a href="<?= $opportunity->url() ?>">
                <!-- pull from sections defined in each opportunity text file -->
                <h2><?= $opportunity->Title() ?></h2>                    
            </a>
                <p class="description"><?= $opportunity->Description() ?></p>
                <p class="due-date">DEADLINE: <?= $opportunity->Due() ?><p class="due-date">
        </section>
        <?php endforeach ?> 
    </div>
</main>

<!-- bottom section -->
<?php snippet('footer') ?>
