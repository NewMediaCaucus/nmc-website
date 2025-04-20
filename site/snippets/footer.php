<footer class="footer">

  <nav class="footer-navigation">
    <div class="footer-nav-block">
      <ul>
        <h2>
          <img class="footer-logo" src="<?= url('assets/icons/logo.png') ?>" alt="" width="80">
        </h2>
        <a class="footer-logo-subhead" href="<?= $site->url() ?>"><?= $site->title() ?></a>
        <!-- Add opportunities page link -->
        <?php if ($aboutusPage = $site->find('about-us')): ?>
          <li><a href="<?= $aboutusPage->url() ?>"><?= $aboutusPage->title() ?></a></li>
        <?php endif ?>
        <!-- Add Media-N link -->
        <?php if ($medianPage = $site->find('media-n-journal')): ?>
          <li><a href="<?= $medianPage->url() ?>"><?= $medianPage->title() ?></a></li>
        <?php endif ?>
        <!-- Add Initiatives link -->
        <?php if ($initiativesPage = $site->find('our-initiatives')): ?>
          <li><a href="<?= $initiativesPage->url() ?>"><?= $initiativesPage->title() ?></a></li>
        <?php endif ?>
        <!-- Add Event Archive link -->
        <?php if ($eventarchivePage = $site->find('event-archive')): ?>
          <li><a href="<?= $eventarchivePage->url() ?>"><?= $eventarchivePage->title() ?></a></li>
        <?php endif ?>
      </ul>
    </div>
    <div class="footer-nav-block">
      <h2>Latest News</h2>
      <ul>
        <!-- Add opportunities page link -->
        <?php if ($opportunitiesPage = $site->find('opportunities')): ?>
          <li><a href="<?= $opportunitiesPage->url() ?>"><?= $opportunitiesPage->title() ?></a></li>
        <?php endif ?>
        <!-- Add blog page link -->
        <?php if ($blogPage = $site->find('blog')): ?>
          <li><a href="<?= $blogPage->url() ?>"><?= $blogPage->title() ?></a></li>
        <?php endif ?>
      </ul>
    </div>

    <div class="footer-nav-block">
      <h2>Get Involved!</h2>
      <ul>
        <!-- Add submit news link -->
        <?php if ($submitnewsPage = $site->find('submit-news')): ?>
          <li><a href="<?= $submitnewsPage->url() ?>"><?= $submitnewsPage->title() ?></a></li>
        <?php endif ?>
        <!-- Add join link -->
        <?php if ($joinPage = $site->find('join')): ?>
          <li><a href="<?= $joinPage->url() ?>"><?= $joinPage->title() ?></a></li>
        <?php endif ?>
        <!-- Add donate link -->
        <?php if ($donatePage = $site->find('donate')): ?>
          <li><a href="<?= $donatePage->url() ?>"><?= $donatePage->title() ?></a></li>
        <?php endif ?>
        <!-- Add subscribe link -->
        <?php if ($subscribePage = $site->find('subscribe')): ?>
          <li><a href="<?= $subscribePage->url() ?>"><?= $subscribePage->title() ?></a></li>
        <?php endif ?>
      </ul>
    </div>
  </nav>

  <!-- Add Header/Footer Gallery link -->
  <?php if ($headerfootergalleryPage = $site->find('header-footer-gallery')): ?>
    <div class="header-footer-gallery">
      <?php
      $shows = $headerfootergalleryPage->children();
      $current_shows = $shows->filterBy('category', 'current')->sortBy('date', 'desc')->limit(1);
      ?>
      <?php foreach ($current_shows as $current): ?>
        <div class="gallery-footer">
          <a href="<?= $current->url() ?>" target="_blank" rel="noopener">
            <?php if ($promo = $current->footer_image()->toFile()): ?>
              <img class="gallery-footer-image"
                src="<?= $promo->crop(960, 320)->url() ?>"
                srcset="<?= $promo->crop(480, 320)->url() ?> 480w,
                        <?= $promo->crop(768, 320)->url() ?> 768w,
                        <?= $promo->crop(960, 320)->url() ?> 960w"
                sizes="(max-width: 480px) 480px,
                       (max-width: 768px) 768px,
                       960px"
                alt="<?= $current->promo_image_alt() ?>"
                class="gallery-footer-image">
            <?php endif ?>
          </a>
          <div class="gallery-footer-text">
            <div class="gallery-footer-title">
              <?= $current->title()->kirbytext() ?>
            </div>
            <div class="gallery-footer-link">
              <?= $current->link()->kirbytext() ?>
            </div>
            <div class="gallery-footer-artist-name">
              <?= $current->artist_name()->kirbytext() ?>
            </div>
          </div>
          <a href="<?= $headerfootergalleryPage->url() ?>">
            <img class="hf-logo" src="<?= url('assets/icons/hf-logo.png') ?>" alt="HF Logo" width="50">
          </a>
        </div>
      <?php endforeach ?>
    </div>
  <?php endif ?>

  <div class="blurb">The New Media Caucus (NMC) is an international non-profit association formed to promote the development and understanding of new media art. We represent and serve: artists, designers, practitioners, historians, theorists, educators, students, and scholars.
    <?php if ($joinPage = $site->find('join')): ?>
      <a href="<?= $joinPage->url() ?>"><?= $joinPage->title() ?> us</a>.
    <?php endif ?>
  </div>

  <div class="footer-bottom">
    <div class="footer-bottom-text">
      <?php if ($privacypolicyPage = $site->find('privacy-policy')): ?>
        Read our <a href="<?= $privacypolicyPage->url() ?>"><?= $privacypolicyPage->title() ?></a>.
      <?php endif ?>
    </div>
    <div class="footer-bottom-text">
      Made with <a href="https://getkirby.com/">Kirby</a>.
    </div>
  </div>
  <div class="footer-social">
    <div class="social-icon">
      <a href="https://www.facebook.com/groups/newmediacaucus" target="_blank">
        <img src="<?= url('assets/icons/fb.png') ?>" alt="Facebook" width="18" height="18">
      </a>
    </div>
    <div class="social-icon">
      <a href="https://www.instagram.com/newmediacaucus/" target="_blank">
        <img src="<?= url('assets/icons/ig.png') ?>" alt="Instagram" width="18" height="18">
      </a>
    </div>
    <div class="copyright">Copyright © <?= date('Y') ?> New Media Caucus
    </div>
  </div>

</footer>