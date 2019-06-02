<?php
namespace Controllers;

class DefaultController{
    public function index() {
        return \ViewHelper::render("landing");
    }

    public function method2() {
        return "method2";
    }

    public function method3() {
        return "a";
    }
}