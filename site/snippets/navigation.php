
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
    <img class="logo-img" src="<?= url('assets/icons/logo.png') ?>" alt="" width="150" height="44">
  </div>
  <a class="logo-subhead" href="<?= site()->url() ?>"><?= site()->title()->html() ?></a>
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