<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => true,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'instructor' => [
            'student' => 'r',
            'course' => 'r',
            'subject' => 'r',
            'course_subject' => 'r',
            'profile' => 'r,u',
        ],
        'administrator' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u',
        ],
        'student' => [
            'profile' => 'r,u',
            'exam' => 'r,u',

        ],
        'academic' => [
            'module_1_name' => 'c,r,u,d',
        ],
        'registrar' => [
            'instructor' => 'c,r,u,d',
            'student' => 'c,r,u,d',
            'course' => 'c,r,u,d',
            'subject' => 'c,r,u,d',
            'course_subject' => 'c,r,u,d',
            'exam_type' => 'c,r,u,d',

        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
