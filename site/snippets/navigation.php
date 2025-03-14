<div class="header-footer-gallery-header">
    <!-- Add Header/Footer Gallery link -->
    <?php if ($headerfootergalleryPage = $site->find('header-footer-gallery')): ?>
        <?php
        $shows = $headerfootergalleryPage->children();
        $current_shows = $shows->filterBy('category', 'current')->sortBy('date', 'desc')->limit(1);
        ?>
        <?php foreach ($current_shows as $current): ?>
            <div class="gallery-header">
                <a href="<?= $headerfootergalleryPage ?>">
                    <?php if ($promo = $current->header_image()->toFile()): ?>
                        <img class="gallery-header-image"
                            src="<?= $promo->crop(960, 80)->url() ?>"
                            srcset="<?= $promo->crop(480, 80)->url() ?> 480w,
                        <?= $promo->crop(768, 80)->url() ?> 768w,
                        <?= $promo->crop(960, 80)->url() ?> 960w"
                            sizes="(max-width: 480px) 480px,
                       (max-width: 768px) 768px,
                       960px"
                            alt="<?= $current->promo_image_alt() ?>"
                            class="gallery-header-image">
                    <?php endif ?>
                </a>
            </div>
        <?php endforeach ?>
    <?php endif ?>
</div>

<!-- dynamically assemble menu -->
<div class="hamburger-menu" onclick="toggleMenu()">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
</div>

<nav class="navigation">
    <ul>
        <!-- Add opportunities page link -->
        <?php if ($aboutusPage = $site->find('about-us')): ?>
            <li><a href="<?= $aboutusPage->url() ?>"><?= $aboutusPage->title() ?></a></li>
        <?php endif ?>
        <!-- Add blog page link -->
        <?php if ($blogPage = $site->find('blog')): ?>
            <li><a href="<?= $blogPage->url() ?>"><?= $blogPage->title() ?></a></li>
        <?php endif ?>
        <!-- Add opportunities page link -->
        <?php if ($opportunitiesPage = $site->find('opportunities')): ?>
            <li><a href="<?= $opportunitiesPage->url() ?>"><?= $opportunitiesPage->title() ?></a></li>
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

<div class="logo-img">
    <a href="<?= $site->url() ?>">
        <img class="logo-img" src="<?= url('assets/icons/logo.png') ?>" alt="Home" width="150" height="44">
    </a>
</div>
<a class="logo-subhead" href="<?= site()->url() ?>">new media caucus</a>
</head>

<!-- Hamburger nav -->
<script>
    function toggleMenu() {
        const nav = document.querySelector('.navigation');
        const hamburger = document.querySelector('.hamburger-menu');
        nav.classList.toggle('active');
        hamburger.classList.toggle('active');
    }
</script>