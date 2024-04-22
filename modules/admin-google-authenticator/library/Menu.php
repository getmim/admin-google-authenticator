<?php
/**
 * Menu
 * @package admin-google-authenticator
 * @version 0.0.1
 */

namespace AdminGoogleAuthenticator\Library;

class Menu
    implements 
        \AdminMeSetting\Iface\Menus
{

    static function getMenus(): array {
        return [
            (object)[
                'label' => 'Google Authenticator',
                'route' => ['adminMeGoogleAuthenticator', [], []],
                'index' => 3000
            ]
        ];
    }
}
