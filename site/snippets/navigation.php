
<!-- dynamically assemble menu -->

<nav class="navigation">
<!-- <div class="logo-img">
    <img src="<?= url('assets/icons/logo.png') ?>" alt="" width="150" height="44">
</div>
<a class="logo-subhead" href="<?= $site->url() ?>"><?= $site->title() ?></a> -->


<ul>
    <!-- Add opportunities page link -->
    <?php if ($aboutusPage = $site->find('about-us')): ?>
        <li><a href="<?= $aboutusPage->url() ?>"><?= $aboutusPage->title() ?></a></li>
    <?php endif ?>
    <!-- Add blog page link -->
    <?php if ($blogPage = $site->find('blog')): ?>
        <li><a href="<?= $blogPage->url() ?>"><?= $blogPage->title() ?></a></li>
    <?php endif ?>
    <!-- Add about us page link -->
    <?php if ($aboutusPage = $site->find('about-us')): ?>
        <li><a href="<?= $aboutusPage->url() ?>"><?= $aboutusPage->title() ?></a></li>
    <?php endif ?>
    <!-- Add Media-N link -->
    <?php if ($medianPage = $site->find('media-n-journal')): ?>
        <li><a href="<?= $medianPage->url() ?>"><?= $medianPage->title() ?></a></li>
    <?php endif ?>
    <!-- Add submit news link -->
    <?php if ($submitnewsPage = $site->find('submit-news')): ?>
        <li><a href="<?= $submitnewsPage->url() ?>"><?= $submitnewsPage->title() ?></a></li>
    <?php endif ?>
</ul>

</nav>