<!-- nav section -->
<?php snippet('navigation') ?>

<!-- top section -->
<?php snippet('header') ?>


<!-- content section -->
<main>
    <!-- grab title from opportunities.txt -->
    <div class="opportunities-title">
        <h1><?= $page->title() ?></h1>
    </div>
    <div class="opportunities">
        <!-- grab all children folders and list them -->
        <?php foreach ($page->children()->listed() as $opportunity): ?>
            <!-- There can be moments when an opp has no image. If so, skip it. -->
            <?php if($image = $opportunity->image()): ?>
                <div class="opportunity">
                    <div class="post-image">
                        <a href="<?= $opportunity->url() ?>">
                            <!-- grab first image in project folder (alphabetically) -->
                            <img src="<?= $image->crop(468)->url() ?>" alt="<?= $opportunity->alt() ?>">

                        </a>
                    </div>
                    <div class="post">
                        <a href="<?= $opportunity->url() ?>">
                            <!-- pull from sections defined in each opportunity text file -->
                            <h2><?= $opportunity->Title() ?></h2>                    
                        </a>   
                        <!-- Display category options -->
                        <?php if ($opportunity->category()->isNotEmpty()): ?>
                            <p class="categories">
                                <?php
                                $field = $opportunity->blueprint()->field('category');
                                $value = $opportunity->category()->value();
                                foreach ($opportunity->category()->split() as $category):
                                    echo $field['options'][$value] ?? $value;
                                endforeach;
                                ?>
                            </p>
                            <?php endif ?>
                        <!-- Display created date -->
                        <p class="created-date">
                            Posted <?= $opportunity->date()->toDate('F j, Y') ?>
                        </p>
                        <!-- Display short description -->
                        <p class="description"><?= $opportunity->short_description() ?></p>
                        <!-- Read More Button -->
                        <a href="<?= $opportunity->url() ?>" class="button">
                            View Post
                        </a>
                    </div>
                </div>
            <?php endif ?>              
        <?php endforeach ?> 
    </div>
    <!-- Pagination -->
    <ul>
  <?php foreach ($list = $page->children()->paginate(10) as $item): ?>
  <li><!-- item html --></li>
  <?php endforeach ?>
</ul>

<?php $pagination = $list->pagination() ?>
<nav>
  <ul>

    <?php if ($pagination->hasPrevPage()): ?>
    <li>
      <a href="<?= $pagination->prevPageURL() ?>">‹</a>
    </li>
    <?php else: ?>
    <li>
      <span>‹</span>
    </li>
    <?php endif ?>

    <?php foreach ($pagination->range(10) as $r): ?>
    <li>
      <a<?= $pagination->page() === $r ? ' aria-current="page"' : '' ?> href="<?= $pagination->pageURL($r) ?>">
        <?= $r ?>
      </a>
    </li>
    <?php endforeach ?>

    <?php if ($pagination->hasNextPage()): ?>
    <li>
      <a href="<?= $pagination->nextPageURL() ?>">›</a>
    </li>
    <?php else: ?>
    <li>
      <span>›</span>
    </li>
    <?php endif ?>

  </ul>
</nav>
</main>

<!-- bottom section -->
<?php snippet('footer') ?>
