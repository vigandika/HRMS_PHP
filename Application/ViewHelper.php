<?php
class ViewHelper {
    public static function render($path, array $args = []) {
        ob_start();
        include("Views/" . $path . ".php");
        $var = ob_get_contents();
        ob_end_clean();
        return $var;
    }
}