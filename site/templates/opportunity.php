<!-- nav section -->
<?php snippet('navigation') ?>

<!-- top section -->
<?php snippet('header') ?>

<!-- content section -->
<main>
    <br><br>
    <h2>Category:</h2>
    <?php if ($page->category()->isNotEmpty()): ?>
        <p><?= $page->category()->kirbytext() ?></p>
    <?php endif ?>

    <h2>Short Description:</h2>
    <?php if ($page->short_description()->isNotEmpty()): ?>
        <p><?= $page->short_description()->kirbytext() ?></p>
    <?php endif ?>
    
    <h2>Long Description:</h2>
    <?php if ($page->long_description()->isNotEmpty()): ?>
        <p><?= $page->long_description()->kirbytext() ?></p>
    <?php endif ?>
    
    <h2>Image:<h2>
    <!-- grab the first/only image in the folder -->
    <?php if($image = $page->image()): ?>
        <img src="<?= $image->url() ?>" alt="" width="300px">
    <?php endif ?>
    <br><br>
</main>

<!-- bottom section -->
<?php snippet('footer') ?>
