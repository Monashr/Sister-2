<?php

return [
    [
        'title' => 'PostgreSQL',
        'icon' => 'PackageIcon',
        'route' => '/postgresql',
        'children' => [
            [
                'title' => 'Mahasiswa',
                'icon' => 'UsersIcon',
                'route' => '/postgresql/mahasiswa',
            ],
            [
                'title' => 'Dosen',
                'icon' => 'UserStarIcon',
                'route' => '/postgresql/dosen',
            ],
            [
                'title' => 'Mata Kuliah',
                'icon' => 'BookUserIcon',
                'route' => '/postgresql/matakuliah',
            ],
            [
                'title' => 'Kuliah',
                'icon' => 'AlbumIcon',
                'route' => '/postgresql/kuliah',
            ],
        ],
    ],
];
