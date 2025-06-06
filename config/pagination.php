
<?php

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;


return[
    'default'=>'tailwind',
    'tailwind'=>[
        'wrapper'=>null,
        'default'=>'pagination::tailwind',
        'options'=>[
            'prev_text'=>'Precedent',
            'next_text'=>'Suivant',
        ],
    ],
    'simple-bootstrap'=>[
        'wrapper'=>null,
        'default'=>'pagination::bootstrap-4',
        'options'=>[
            'prev_text'=>'Precedent',
            'next_text'=>'Suivant',
        ],
    ],
    'simple-tailwind'=>[
        'wrapper'=>null,
        'default'=>'pagination::tailwind',
        'options'=>[
            'prev_text'=>'Precedent',
            'next_text'=>'Suivant',
        ],
    ]
];

