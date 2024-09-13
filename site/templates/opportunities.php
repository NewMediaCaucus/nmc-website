<!-- top section -->
<?php snippet('header') ?>

<!-- nav section -->
<?php snippet('navigation') ?>

<!-- content section -->
<main class="opportunities">
  <!-- Grab title text from txt field -->
  <h3><?= $page->title() ?></h3>

    <ul>
        <!-- grab all children folders and list them -->
        <?php foreach ($page->children()->listed() as $opportunity): ?>
        <li>
            <a href="<?= $opportunity->url() ?>">
            
                <!-- grab first image in project folder (alphabetically) -->
                <?= $opportunity->image()->crop(100, 100, 100) ?>
                <div id="container">
                    <ul>
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
