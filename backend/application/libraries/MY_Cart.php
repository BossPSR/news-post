<?php

//My_cart รองรับภาษาไทย gunoob.com

class MY_Cart extends CI_Cart {

    public function __construct($params = array()) {
        parent::__construct($params);
        //กำหนดกฏของการตั้งชื่อสินค้าใหม่
        $this->product_name_rules = '\d\D';
    }

}