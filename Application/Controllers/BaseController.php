<?php

class BaseController{

    public static function CreateView( $viewName){

        require_once ("../Aplication/Views/$viewName");

    }

}