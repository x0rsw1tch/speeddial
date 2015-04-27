<?php
/**
 * Created by PhpStorm.
 * User: tom
 * Date: 026 4/26/2015
 * Time: 10:28 PM
 */


class Dials {

    public $db;
    public $user;
    public $categories;
    public $dials;


    function __construct (Categories $categories) {
        $this->categories = $categories;
        $this->db = $categories->db;
        $this->user = $categories->user;
    }


    public function getDials () {
        $sql = 'SELECT * FROM spd_dials WHERE user = :user ORDER BY `order` ASC';
        $params = Array(
            Array('param' => ':user', 'value' => $this->user->userId, 'type' => PDO::PARAM_STR),
        );
        $r = $this->db->execQuery($this->db, $sql, $params);
        $this->dials = $r->fetchAll();

    }



}



?>