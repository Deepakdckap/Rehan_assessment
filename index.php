<?php
// timestamp 9:30 am

require "router/router.php";
require "controllers/controllers.php";


session_start();

$controller = new Controller();
$router = new router();

unset($_SESSION["Artist"]);
unset($_SESSION["Album"]);

$router->get("/", "list")->only('guest');
$router->post("/login", "login")->only('guest');
$router->post("/logout", "logout")->only('auth');
$router->post("/addmusic", "addmusic")->only('auth');
$router->post("/addartist", "addartist")->only('auth');
$router->post("/musiclist", "musiclist");
$router->post("/artistlist", "artistlist");
$router->post("/addplaylist", "addplaylist");
$router->post("/addplaylistalbum", "addplaylistalbum")->only('auth');
$router->post("/addplaylistartist", "addplaylistartist")->only('auth');
$router->post("/requestpremium", "requestpremium")->only('guest');
$router->post("/checkrequest", "checkrequest")->only('auth');
$router->post("/approve", "approve")->only('auth');

$router->routing();

// middleware
$router->handle();

// ---------------------------------------------------------------------
// thing that I have learnt in the project
/*
    while receiving the email I was quite confused about the process.
    then I hard code it, then I got clarity.
    Break the task modules into smaller.
*/

// things that I need to improve
/*
    I will try to reduce the lines of code.
    Instead of IF condition, I would like to implement ternary operators.
    I spent more time in thinking, but I am practicing to reduce.
    Finally, I hope that, I done my Best.
*/