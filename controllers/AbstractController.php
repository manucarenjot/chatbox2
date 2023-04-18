<?php
abstract class AbstractController
{
    abstract public function index();

    public function render($page) {
        ob_start();
        require __DIR__ . '/../views/' . $page . '.html.php';
    }
}