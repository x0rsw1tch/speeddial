<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('display_startup_errors', TRUE);

// Requires: Populated User Object
class Categories {

    public $db;
    public $user;
    public $categories;


    function __construct (User $user) {
        $this->user = $user;
        $this->db = $this->user->db;
    }

    public function getCategoryList () {
        $sql = 'SELECT * FROM spd_categories WHERE user = :user ORDER BY `order` ASC';
        $params = Array(
            Array('param' => ':user', 'value' => $this->user->userId, 'type' => PDO::PARAM_STR),
        );
        $r = $this->db->execQuery($this->db, $sql, $params);
        $this->categories = $r->fetchAll();
    }

}






?>