<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */
   
   'navigations' => [

        'Tickets' => [
            'Dashboard' => [
                'path' => '/',
                'visibility' => true, // to appear on sidebar
                'permission' => null,
                'permission_descreption' => null,
                'icon' => 'icon icon-speedometer'
            ],
            'Tickets' => [
                'path' => '/tickets',
                'visibility' => true, // to appear on sidebar
                'permission' => 'sa-view-ticket',
                'permission_descreption' => null,
                'icon' => 'fa fa-ticket'
            ],

        ],


        'Users' => [
            'Users' => [
                'path' => '/user',
                'visibility' => true, // to appear on sidebar
                'permission' => 'sa-view-user',
                'permission_descreption' => 'access to users\' table',
                'icon' => 'icon icon-user'
            ],
            'Create user' => [
                'path' => '/register',
                'visibility' => true, // to appear on sidebar
                'permission' => 'sa-create-user',
                'permission_descreption' => 'can create user',
                'icon' => 'icon icon-user-follow'
            ],
            'Delete user' => [
                'path' => null,
                'visibility' => false, // to appear on sidebar
                'permission' => 'sa-delete-user',
                'permission_descreption' => 'can delete user',
                'icon' => null,
            ]
        ],

        'Permissions' => [
            'Permissions' => [
                'path' => '/permission',
                'visibility' => true, // to appear on sidebar
                'permission' => 'sa-view-permission',
                'permission_descreption' => 'access to permissions\' table',
                'icon' => 'icon icon-user-follow'
            ],
            'Create permission' => [
                'path' => null, // it is just a permission, not a navigation on sidebar
                'visibility' => false, // to appear on sidebar
                'permission' => 'sa-create-permission',
                'permission_descreption' => 'can create permission',
                'icon' => null,
            ],
            'Delete permission' => [
                'path' => null, // it is just a permission, not a navigation on sidebar
                'visibility' => false, // to appear on sidebar
                'permission' => 'sa-delete-permission',
                'permission_descreption' => 'can delete permission',
                'icon' => null,
            ]
        ],

    ]

];
