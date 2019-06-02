<?php

class BaseController{

    public static function CreateView( $viewName){

        require_once ("../Application/Views/$viewName.php");

    }

}