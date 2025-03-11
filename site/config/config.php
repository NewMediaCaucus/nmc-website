<?php

return [
    'routes' => [
        [
            # template for url redirects
            # leading slash is optional
            'pattern' => 'redirect/test',
            'action' => function () {
                go('opportunities');
            }
        ],
    ]
];