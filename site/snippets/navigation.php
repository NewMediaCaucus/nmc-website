
<!-- dynamically assemble menu -->

<nav class="navigation">

<a class="logo" href="<?= $site->url() ?>"><?= $site->title() ?></a>

<span class="blurb">Blurb about NMC</span>

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