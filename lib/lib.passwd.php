<?php

class Password {

    public $passwdHash;
    public $hashOptions;


    function __construct ($hashOptions = false) {
        if ($hashOptions === false) {
            $hashOptions = Array(
                'cost' => 12,
                'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),);
            $this->hashOptions = $hashOptions;
        } else {
            $this->hashOptions = $hashOptions;
        }

    }


    public function createPasswordHash ($password) {
        $this->passwdHash = password_hash($password, PASSWORD_BCRYPT, $this->hashOptions);
        return $this->passwdHash;
    }


    public function verifyPassword ($password, $hashed) {
        if (password_verify($password, $hashed)) {
            return true;
        } else {
            return false;
        }


    }

}




?>