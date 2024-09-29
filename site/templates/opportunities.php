<!-- top section -->
<?php snippet('header') ?>

<!-- nav section -->
<?php snippet('navigation') ?>

<!-- content section -->
<main class="opportunities">
    <!-- grab title from opportunities.txt -->
    <h1><?= $page->title() ?></h1>
    <ul class="opportunities-list">
        <!-- grab all children folders and list them -->
        <?php foreach ($page->children()->listed() as $opportunity): ?>
        <li class="opportunity">
            <a href="<?= $opportunity->url() ?>">
                <ul>
                    <!-- grab first image in project folder (alphabetically) -->
                    <li><?= $opportunity->image()->crop(100, 100, 100) ?></li>
                    <!-- pull from sections defined in each opportunity text file -->
                    <li><?= $opportunity->Title() ?></li>
                    <li><?= $opportunity->Description() ?></li>
                    <li><?= $opportunity->Due() ?></li>
                </ul>
             </a>
        </li>
        <?php endforeach ?> 
    </ul>
</main>

<!-- bottom section -->
<?php snippet('footer') ?>
