<?php

namespace App\Controllers;

use App\Core\CoreController;
use App\Models\Article;
use App\Views\FrontView;

class FrontController
{
    protected $View;
    private  $Model;

    public function __construct()
    {
        $this->View = new FrontView();
        $this->Model = new Article();
    }

    public function index(): void
    {
        echo 'Hello World!';
        //$this->View->showIndexPage();
    }
    public function showArticlesListPage()
    {
        print_r('Hi');
        $articles = $this->Model->getAll();
        var_dump($articles);
        //$this->View->renderArticlesListPage($articles);
    }
    public function showSingleArticlePage($id)
    {
        $article = $this->Model->find($id);
        $this->View->renderSingleArticlePage($article);
    }
}