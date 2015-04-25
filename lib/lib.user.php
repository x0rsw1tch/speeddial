<?php

class User {

    public $db;
    public $userInfo;
    public $authenticated;
    public $userId;



    function __construct ($db = false)
    {
        if ($db === false) {
            $this->db = new DB();
        } else {
            $this->db = $db;
        }
    }


    public function authenticateUser ($user, $password) {
        $passCheck = new Password();
        if ($this->getUserData($user)) {
            if ($passCheck->verifyPassword($password, $this->userInfo['password'])) {
                $this->authenticated = true;
                return true;
            } else {
                $this->authenticated = false;
                return false;
            }
        }
        return false;
    }



    public function getUserData ($user) {
        if ($this->isUserValid($user)) {
            $sql = 'SELECT * FROM spd_users WHERE user = :user LIMIT 0,1';
            $params = Array(
                Array('param' => ':user', 'value' => $user, 'type' => PDO::PARAM_STR),
            );
            $r = $this->db->execQuery($this->db, $sql, $params);
            $this->userInfo = $r->fetch();
            $this->userId = $this->userInfo['uid'];
            $this->userState = $this->userInfo['status'];
            return true;
        } else {
            return false;
        }
    }


    public function isUserValid ($user) {
        $sql = 'SELECT user,status FROM spd_users WHERE user = :user LIMIT 0,1';
        $params = Array(
            Array('param' => ':user', 'value' => $user, 'type' => PDO::PARAM_STR),
        );
        $r = $this->db->execQuery($this->db, $sql, $params);
        $userState = $r->fetch();
        if ($r->rowCount() < 1 && $userState['status'] === 0) {
            return false;
        } else {
            return true;
        }
    }


}



?>