<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $site->title() ?></title>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

  
  <!-- Critical CSS inline -->
  <style>
    :root {
      color-scheme: dark;
    }
    html, body {
      background-color: #282A36;
      color: #ffffff;
      visibility: visible;
      opacity: 1;
    }
    .preload * {
      transition: none !important;
    }
    </style>

<!-- kirby is picky about where the CSS file goes -->
<!-- Preload CSS -->
<link rel="preload" href="<?= url('content/style.css') ?>" as="style">
<link rel="stylesheet" href="<?= url('content/style.css') ?>">

<!-- Preload fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap">
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible:ital,wght@0,400;0,700;1,400;1,700&display=swap">
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Metrophobic&display=swap">

<!-- Load fonts -->
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Metrophobic&display=swap" rel="stylesheet">

<!-- Prevent FOUC -->
<script>
  document.documentElement.classList.add('preload');
  window.addEventListener('load', function() {
    document.documentElement.classList.remove('preload');
  });
  </script>

<div class="logo-img">
  <img class="logo-img" src="<?= url('logo.png') ?>" alt="" width="150" height="44">
</div>
<a class="logo-subhead" href="<?= $site->url() ?>"><?= $site->title() ?></a>

</head>
<body class="page">
