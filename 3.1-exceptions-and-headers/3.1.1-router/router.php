<?php

class Router {
    private $links;

    function __construct($availableLinks) {
        $this->$links = $availableLinks;
    }

    public function isAvailablePage($namePage) {
        if (in_array($getParameter, $this->$links)) {
            return true;
        }
        else {
            throw new Exception('Такой страницы не существует');
            return false;
        }
    }
}
