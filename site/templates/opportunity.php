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
        <img src="<?= $image->url() ?>" alt="<?= $image->alt() ?>" width="960px">
    <?php endif ?>

    <?php if ($page->title()->isNotEmpty()): ?>
        <h2>
            <?= $page->title()->kirbytext() ?>
        </h2>
    <?php endif ?>

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
    
    <?php if ($page->long_description()->isNotEmpty()): ?>
        <p><?= $page->long_description()->kirbytext() ?></p>
    <?php endif ?>



    
    
    <br><br>
</main>

<!-- bottom section -->
<?php snippet('footer') ?>
