<?php
/**
 * ConnectorController
 * @package admin-google-authenticator
 * @version 0.0.1
 */

namespace AdminGoogleAuthenticator\Controller;

use LibUserAuthGoogleAuth\Library\Auth;

class ConnectorController extends \AdminMeSetting\Controller
{
    protected function getParams(string $title): array
    {
        return [
            '_meta' => [
                'title' => $title,
                'menus' => []
            ],
            'subtitle' => $title,
            'pages' => null
        ];
    }

    function indexAction()
    {
        if (!$this->user->isLogin()) {
            return $this->loginFirst(1);
        }

        $qr_url = Auth::getQRUrl($this->user);

        $params = [
            '_meta' => [
                'title' => 'Google Authenticator'
            ],
            'qr' => $qr_url
        ];

        $this->resp('/me/setting/connector', $params);
    }
}
