<!-- top section -->
<?php snippet('header') ?>

<!-- nav section -->
<?php snippet('navigation') ?>

<!-- content section -->
<main>
    <br><br>
    <!-- grab the first/only image in the folder -->
    <?php if ($image = $page->image()): ?>

        <?php if ($page->link()->isNotEmpty()): ?>
            <a href="<?= $page->link() ?>">
                <img class="post-image"
                    src="<?= $image->crop(960, 960)->url() ?>"
                    alt="<?= $page->alt()->value() ?>"
                    width="960px">
            </a>
        <?php else: ?>
            <img class="post-image"
                src="<?= $image->crop(960, 960)->url() ?>"
                alt="<?= $page->alt()->value() ?>"
                width="960px">
        <?php endif ?>

    <?php endif ?>

    <?php if ($page->title()->isNotEmpty()): ?>
        <h2>
            <?= $page->title()->html() ?>
        </h2>
    <?php endif ?>
    <ul class="header-footer-gallery-ul">
        <li>
            <?php if ($page->link()->isNotEmpty()): ?>
                <?= $page->link()->kirbytext() ?></p>
            <?php endif ?>
        </li>

        <li>
            <p class="artist_name"><?= $page->artist_name()->kirbytext() ?></p>
        </li>
    </ul>
    <?php if ($page->long_description()->isNotEmpty()): ?>
        <p><?= $page->long_description()->kirbytext() ?></p>
    <?php endif ?>
    <br><br>
</main>

<!-- bottom section -->
<?php snippet('footer') ?>