<?php

$data_header = array("main" => $main_content);

$this -> load -> view("includes/header",$data_header);

$this -> load -> view($main_content);

$this -> load -> view("includes/footer");
?>