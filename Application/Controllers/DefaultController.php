<?php
namespace Controllers;

class DefaultController {
    public function index() {
        return \ViewHelper::render("overview");
    }

    public function method2() {
        return \ViewHelper::render("login");
    }

}