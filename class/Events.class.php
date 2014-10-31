<?php

 class Events {
    protected $get;
    protected $post;
    
    function __construct() {
        $this->initEvents();
    }
    
    protected function initEvents(){
        $this->get = (object)$_GET;
        $this->post = (object)$_POST;
    }
}

?>
