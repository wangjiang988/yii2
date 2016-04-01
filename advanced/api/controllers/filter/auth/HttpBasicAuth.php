<?php
namespace api\controllers\filter\auth;


class HttpBasicAuth extends \yii\filters\auth\HttpBasicAuth
{
    public function authenticate($user, $request, $response)
    {
        $username = $request->getAuthUser();
        $password = $request->getAuthPassword();

        if ($this->auth($username, $password)) {
            if ($username !== null || $password !== null) {
                $identity = $this->auth($username, $password);
                if ($identity !== null) {
                    /**
                     * here, generate access-token and update login ip/time
                     */
                    $identity->updateAccessToken();
                    $user->switchIdentity($identity);
                } else {
                    $this->handleFailure($response);
                }
                return $identity;
            }
        } elseif ($username !== null) {
            $identity = $user->loginByAccessToken($username, get_class($this));
            if ($identity === null) {
                $this->handleFailure($response);
            }
            return $identity;
        }

        return null;
    }

}