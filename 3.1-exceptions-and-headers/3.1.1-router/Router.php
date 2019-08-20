<?php

class Router {
    private $links;

    function __construct($availableLinks) {
        $this->links = $availableLinks;
    }

    public function isAvailablePage($namePage) {
        if (in_array($namePage, $this->links)) {
            return true;
        } else {
            return false;
        }
    }
}

