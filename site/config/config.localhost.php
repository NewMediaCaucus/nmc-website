<?php

return [
  'debug' => true,
  'panel' => [
    'vue' => [
      'compiler' => false
    ],
    'install' => true
  ],
  'thathoff.git-content.commit' => true,
  'thathoff.git-content.pull' => true, // Set to true so devs get the latest content.
  'thathoff.git-content.push' => false, // Dev content should not push to main. Server pushes will happen via cron job.
  'thathoff.git-content.branch' => 'main',
  'thathoff.git-content.remote' => 'origin',
  'thathoff.git-content.disableBranchManagement' => false, // Set to true to on prod.
  'thathoff.git-content.disable' => true, // Set to true to disable git-content.

  // Add this routes block for redirects
  'routes' => [
    [
      'pattern' => 'about',
      'action'  => function () {
        return go('about-us');
      }
    ],
    [
      'pattern' => 'caa-2025',
      'action'  => function () {
        return go('/');
      }
    ],
    [
      'pattern' => 'resources',
      'action'  => function () {
        return go('our-initiatives');
      }
    ]
  ],
];
