<?php

class router
{
    public $router = [];
    public $controller;

    public function __construct()
    {
        $this->controller = new Controller();
    }

    public function only($middleware)
    {
        $this->router[count($this->router) -1]['middleware'] = $middleware;
    }

    public function get($uri, $action)
    {
        $this->router[] = [
            "uri" => $uri,
            "action" => $action,
            "method" => "GET",
            'middleware' => null
        ];
        return $this;
    }
    public function post($uri, $action)
    {
        $this->router[] = [
            "uri" => $uri,
            "action" => $action,
            "method" => "POST",
            'middleware' => null
        ];
        return $this;
    }

    public function routing()
    {
        foreach ($this->router as $router) {
            if ($router["uri"] == $_SERVER["REQUEST_URI"]) 
            {
                $action = $router["action"];
                switch ($action) {
                    case "login":
                        $this->controller->loginPage($_POST);
                        break;
                    case "logout":
                        $this->controller->logout();
                        break;
                    case "addmusic":
                        $this->controller->addMusic($_POST, $_FILES);
                        break;
                    case "artistlist":
                        $this->controller->artistlist();
                        break;
                    case "addplaylist":
                        $this->controller->addplaylist($_POST);
                        break;
                    case "addplaylistalbum":
                        $this->controller->addplaylistalbum($_POST);
                        break;
                    case "addplaylistartist":
                        $this->controller->addplaylistartist($_POST);
                        break;
                    case "musiclist":
                        $this->controller->musiclist();
                        break;
                    case "addartist":
                        $this->controller->addArtist($_POST, $_FILES);
                        break;
                    case "approve":
                        $this->controller->approve($_POST);
                        break;
                    case "requestpremium":
                        $this->controller->requestpremium($_POST);
                        break;
                    case "checkrequest":
                        $this->controller->checkrequest($_POST);
                        break;
                    default:
                        $this->controller->home();
                }
            }
        }
    }

    // This func is for Middleware
    public function handle()
    {
        foreach ($this->router as $route) {
            if ($route['uri'] === $_SERVER['REQUEST_URI']) {

                if ($route['middleware'] === 'auth') {
                    (new AuthMiddleware())->check();
                }

                if ($route['middleware'] === 'guest') {
                    (new GuestMiddleware())->check();
                }

                return $route['action'];
            }
        }
        exit();
    }
}



class AuthMiddleware
// this section is used to those who are not to see, eg. not existing user cannot see the sign in page
{
    public function check()
    {
        if (!isset($_SESSION['admin'])) {
            header('Location: /');
        }
    }
}

class GuestMiddleware
{
    public function check()
    {
        if (isset($_SESSION['admin'])) {
            header('Location: /addMusic');
//            header('Location: /addArtist');
        }
    }
}

