<?php

declare(strict_types=1);

use MiladRahimi\PhpRouter\Router;
use MiladRahimi\PhpRouter\Exceptions\RouteNotFoundException;
use Laminas\Diactoros\Response\HtmlResponse;
use App\Views\ErrorsView;

$error = new ErrorsView();

$router = Router::create();

$router->get('/', [\App\Controllers\FrontController::class, 'index']);
$router->get('/blog', [\App\Controllers\FrontController::class, 'showArticlesListPage']);
$router->get('/blog/{id}', [\App\Controllers\FrontController::class, 'showSingleArticlePage']);

$router->get('/login', [\App\Controllers\FrontController::class, 'showLoginPage']);

$router->get('/admin', [\App\Controllers\AdminController::class, 'showArticlesTable']);
$router->get('/admin/articles', [\App\Controllers\AdminController::class, 'showArticlesTable']);
$router->get('/admin/article/create', [\App\Controllers\AdminController::class, 'showCreateArticleForm']);
$router->post('/admin/article/store', [\App\Controllers\AdminController::class, 'storeArticle']);
$router->get('/admin/article/{id}/edit', [\App\Controllers\AdminController::class, 'showEditArticleForm']);
$router->post('/admin/article/update', [\App\Controllers\AdminController::class, 'updateArticle']);
$router->get('/admin/article/{id}/delete', [\App\Controllers\AdminController::class, 'deleteArticle']);



$router->dispatch();
/*
try {
} catch (RouteNotFoundException $e) {
    // It's 404!
    $router->getPublisher()->publish( new HtmlResponse( $error->render404Page(), 404));
} catch (Throwable $e) {
    // Log and report...
    $router->getPublisher()->publish( new HtmlResponse( $error->render500Page(), 500));
}*/