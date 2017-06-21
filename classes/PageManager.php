<?php

class PageManager {

    private $config;

    public function pageFile($page)
    {
        return $this->config['defaults']['folder'] . '/' . $page . '.php';
    }

    public function pageExists($page)
    {
        return file_exists($page);
    }

    public function __construct()
    {
        $this->config = Config::get('page');

    }

    public function manage()
    {
        
        $page = $this->config['defaults']['page'];

        if (isset($_GET[$this->config['key']])) {
            $page = $_GET[$this->config['key']];
        }

        $this->show($page);

    }

    public function header()
    {
        require_once(__DIR__ . '/../includes/' . $this->config['defaults']['header'] . '.php');
    }

    public function footer()
    {
        require_once(__DIR__ . '/../includes/' . $this->config['defaults']['footer'] . '.php');
    }

    public function show($page)
    {
        $page = $this->pageFile($page);
        
        if($this->pageExists($page))
            require_once($page);
    }

}