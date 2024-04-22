<?php
/**
 * GoogleAuthenticatorController
 * @package admin-google-authenticator
 * @version 0.0.1
 */

namespace AdminGoogleAuthenticator\Controller;

use LibUserMain\Model\User;
use AdminUser\Controller\EditorController;
use LibUserAuthGoogleAuth\Library\Auth;

class GoogleAuthenticatorController extends EditorController
{
    protected function getParams(string $title): array
    {
        return [
            '_meta' => [
                'title' => $title,
                'menus' => ['user', 'all-user']
            ],
            'subtitle' => $title,
            'pages' => null
        ];
    }

    /**
     * @route.param id
     */
    protected function getRouterUser(): ?object
    {
        $value = $this->req->param->id;
        return User::getOne([
            'id' => $value
        ]);
    }

    function indexAction()
    {
        if (!$this->user->isLogin()) {
            return $this->loginFirst(1);
        }
        
        if (!$this->can_i->manage_user_account) {
            return $this->show404();
        }
        
        $user = $this->getRouterUser();
        if (!$user) {
            return $this->show404();
        }

        $qr_url = Auth::getQRUrl($user);

        $params = $this->getParams('Connect Google Authenticator');
        $params['user'] = $user;
        $params['qr'] = $qr_url;

        $this->resp('user/connector', $params);
    }
}
