<footer class="footer">

<div class="logo-img">
    <img class="logo-img" src="<?= url('logo.png') ?>" alt="" width="120">
  </div>
  <a class="footer-logo-subhead" href="<?= $site->url() ?>"><?= $site->title() ?></a>


<nav class="footer-navigation">
  <ul>
      <!-- grab all primary pages that have numbers in the title -->
      <?php foreach ($site->children()->listed() as $item): ?>
          <!-- add a css class to the active nav element -->
          <?php if ($item->isOpen()): ?>
              <li><a class="active_nav" href="<?= $item->url() ?>"><?= $item->title() ?></a></li>
          <?php else: ?>
              <li><a href="<?= $item->url() ?>"><?= $item->title() ?></a></li>
          <?php endif ?>
      <?php endforeach ?>
  </ul>
</nav>

  <div class="blurb">The New Media Caucus (NMC) is an international non-profit association formed to promote the development and understanding of new media art. We represent and serve: artists, designers, practitioners, historians, theorists, educators, students, and scholars. <a href="">Join us</a>.</div>
  
  <div class="footer-social">
    <div class="social-icon">
      <a href="https://www.facebook.com/groups/newmediacaucus" target="_blank">
        <img src="<?= url('fb.png') ?>" alt="Facebook" width="24" height="24">
      </a>
    </div>
    <div class="social-icon">
      <a href="https://www.instagram.com/newmediacaucus/" target="_blank">
        <img src="<?= url('ig.png') ?>" alt="Instagram" width="24" height="24">
      </a>
    </div>
    <div class="copyright">Copyright © 2024</div>
  </div>


</footer>