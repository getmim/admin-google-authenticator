<?php

return [
    '__name' => 'admin-google-authenticator',
    '__version' => '0.0.1',
    '__git' => 'git@github.com:getmim/admin-google-authenticator.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'https://iqbalfn.com/'
    ],
    '__files' => [
        'modules/admin-google-authenticator' => ['install','update','remove'],
        'theme/admin/me/setting/connector.phtml' => ['install','update','remove'],
        'theme/admin/user' => ['install','update','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'lib-user-auth-google-auth' => NULL
            ],
            [
                'admin' => NULL
            ],
            [
                'lib-form' => NULL
            ],
            [
                'lib-pagination' => NULL
            ]
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'AdminGoogleAuthenticator\\Controller' => [
                'type' => 'file',
                'base' => 'modules/admin-google-authenticator/controller'
            ],
            'AdminGoogleAuthenticator\\Library' => [
                'type' => 'file',
                'base' => 'modules/admin-google-authenticator/library'
            ]
        ],
        'files' => []
    ],
    'routes' => [
        'admin' => [
            'adminMeGoogleAuthenticator' => [
                'path' => [
                    'value' => '/admin/me/google-authenticator'
                ],
                'handler' => 'AdminGoogleAuthenticator\\Controller\\Connector::index',
                'method' => 'GET'
            ],
            'adminUserGoogleAuthenticator' => [
                'path' => [
                    'value' => '/user/(:id)/google-authenticator',
                    'params' => [
                        'id' => 'number'
                    ]
                ],
                'handler' => 'AdminGoogleAuthenticator\\Controller\\GoogleAuthenticator::index',
                'method' => 'GET'
            ]
        ]
    ],
    'adminMeSetting' => [
        'menus' => [
            'admin-me-google-authenticator' => 'AdminGoogleAuthenticator\\Library\\Menu'
        ]
    ],
    'adminUser' => [
        'menu' => [
            'google-authenticator' => [
                'label' => 'Google Authenticator',
                'perm' => 'manage_user_account',
                'route' => ['adminUserGoogleAuthenticator', ['id'=>'$id']],
                'index' => 5000
            ]
        ]
    ]
];
