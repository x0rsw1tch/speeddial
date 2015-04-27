<?php
/**
 * Created by PhpStorm.
 * User: tom
 * Date: 026 4/26/2015
 * Time: 10:41 PM
 */

class HtmlFormatter {

    public $db;
    public $user;
    public $categories;
    public $dials;


    function __construct (Dials $dials) {
        $this->db = $dials->db;
        $this->user = $dials->user;
        $this->categories = $dials->categories;
        $this->dials = $dials->dials;
    }


    public function generateCategoryHeaders () {



    }


    public function generateDials () {




    }


    public function generateTabPanes () {




    }


}


?>