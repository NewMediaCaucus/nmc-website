<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?= $page->title() ?> | New Media Caucus
  </title>
  <!-- <link rel="shortcut icon" href="assets/icons/favicon.ico" type="image/x-icon"> -->
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">

  <!-- Critical CSS inline -->
  <style>
    :root {
      color-scheme: dark;
    }

    html,
    body {
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
  <link rel="preload" href="<?= url('assets/css/style.css') ?>" as="style">
  <link rel="stylesheet" href="<?= url('assets/css/style.css') ?>">

  <!-- Preload fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap">
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible:ital,wght@0,400;0,700;1,400;1,700&display=swap">
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Metrophobic&display=swap">
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=DM+Mono:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Metrophobic&display=swap">
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap">

  <!-- Load fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Metrophobic&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
  <!-- Prevent FOUC -->
  <script>
    document.documentElement.classList.add('preload');
    window.addEventListener('load', function() {
      document.documentElement.classList.remove('preload');
    });
  </script>

<body class="page">