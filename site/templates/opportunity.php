<!-- nav section -->
<?php snippet('navigation') ?>

<!-- top section -->
<?php snippet('header') ?>

<!-- content section -->
<main>
    <br><br>
    <!-- grab the first/only image in the folder -->
    <?php if($image = $page->image()): ?>
        <!-- TODO: What div should go around this image? -->
        <img src="<?= $image->url() ?>" alt="<?= $page->alt()->value() ?>" width="960px">
    <?php endif ?>

    <?php if ($page->title()->isNotEmpty()): ?>
        <h2>
            <?= $page->title()->kirbytext() ?>
        </h2>
    <?php endif ?>

    <!-- TODO: Style this -->
    <?php if ($page->category()->isNotEmpty()): ?>
        <p>
            <?php
                $field = $page->blueprint()->field('category');
                $value = $page->category()->value();
                foreach ($page->category()->split() as $category):
                    echo $field['options'][$value] ?? $value;
                endforeach;
            ?>
        </p>
    <?php endif ?>
    <!-- Display created date -->
    <p class="created-date">
        Posted <?= $page->date()->toDate('F j, Y') ?>
    </p>
    
    <?php if ($page->long_description()->isNotEmpty()): ?>
        <p><?= $page->long_description()->kirbytext() ?></p>
    <?php endif ?>

<!-- Submit an opportunity promo -->
<div class="promo">📣 Got an opportunity? <a href="https://www.newmediacaucus.org/submit/" >Post It!</a> 🦄</div>

    <br><br>
</main>

<!-- bottom section -->
<?php snippet('footer') ?>
