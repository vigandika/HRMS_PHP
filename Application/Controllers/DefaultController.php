<?php
namespace Controllers;

class DefaultController{
    public function index() {
        return \ViewHelper::render("overview");
    }

}