<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 06.01.2015
 * Time: 3:05
 */
use \Facebook as FB;
class FacebookUser extends Social {
    private $facebook;

    public function __construct()
    {
        FB\FacebookSession::setDefaultApplication(Config_h::get('FbId'), Config_h::get("FbSecret"));
        $this->facebook = new FB\FacebookRedirectLoginHelper("http://{$_SERVER['HTTP_HOST']}/user/login");
        $this->setFbSession();
    }

    private function setFbSession()
    {
        if ($session = $this->facebook->getSessionFromRedirect()) {
            Session_h::set('facebook', $session->getToken());
            return true;
        }
        return false;
    }

    public function getLoginUrl()
    {
        if ($this->facebook) {
            return $this->facebook->getLoginUrl(array(
                "public_profile",
                "user_friends",
                "email"
            ));
        } else {
            return "Error!";
        }
    }

    private function getFbPhoto()
    {
        if (Session_h::exist('facebook')) {
            $session = new FB\FacebookSession(Session_h::get('facebook'));

            $requestPhoto = new FB\FacebookRequest(
                $session,
                'GET',
                '/me/picture',
                array(
                    'redirect' => false,
                    'height' => '200',
                    'type' => 'normal',
                    'width' => '200',
                )
            );
            $response = $requestPhoto->execute();
            $graphObject = $response->getGraphObject()->asArray();
            return $graphObject['url'];
        }
        return false;
    }

    public function getProfile()
    {
        $session = new FB\FacebookSession(Session_h::get('facebook'));
        $request = new FB\FacebookRequest($session, 'GET', '/me');
        $request = $request->execute();
        $facebookUser = $request->getGraphObject()->asArray();
        $facebookUser['avatar_url']=$this->getFbPhoto();
        return $facebookUser;
    }
}