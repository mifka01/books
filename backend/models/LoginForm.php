<?php
namespace backend\models;

use common\models\User;

class LoginForm extends \common\models\LoginForm
{
    private $_user;


    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        if ($this->_user->status == User::STATUS_ADMIN){
            return $this->_user;
        }
        return null;

    }

}