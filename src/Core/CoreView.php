<?php

namespace App\Core;

use App\Core\Interfaces\ViewInterface;

class CoreView implements ViewInterface
{
    protected $loader;
    protected $twig;

    public function __construct()
    {
        $this->setLoader('template/');
        $this->twig = new \Twig\Environment($this->loader, []);
    }

    public function setLoader($path)
    {
        $this->loader = new \Twig\Loader\FilesystemLoader($path);
    }

}