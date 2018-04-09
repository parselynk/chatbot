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
                'icon' => 'fa fa-user'
            ],
            'Create user' => [
                'path' => '/register',
                'visibility' => true, // to appear on sidebar
                'permission' => 'sa-create-user',
                'permission_descreption' => 'can create user',
                'icon' => 'fa fa-user-plus'
            ],
            'Delete user' => [
                'path' => null,
                'visibility' => false, // to appear on sidebar
                'permission' => 'sa-delete-user',
                'permission_descreption' => 'can delete user',
                'icon' => null,
            ]
        ],

        'Access Management' => [
            'Permissions' => [
                'path' => '/permission',
                'visibility' => true, // to appear on sidebar
                'permission' => 'sa-view-permission',
                'permission_descreption' => 'access to permissions\' table',
                'icon' => 'icon-lock icons'
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
            ],
            'Roles' => [
                'path' => '/role', // it is just a permission, not a navigation on sidebar
                'visibility' => true, // to appear on sidebar
                'permission' => 'sa-view-role',
                'permission_descreption' => 'can view role',
                'icon' => 'fa fa-users',
            ]
            ,
            'Update Role' => [
                'path' => '/role', // it is just a permission, not a navigation on sidebar
                'visibility' => false, // to appear on sidebar
                'permission' => 'sa-update-role',
                'permission_descreption' => 'can update role',
                'icon' => null,
            ]
        ],

    ]

];
