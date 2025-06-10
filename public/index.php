<?php

session_start();

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'functions.php';

spl_autoload_register(function ($class) {
    require base_path("Core/{$class}.php");
});

App::bind('Database', fn() => new Database());
App::bind('DiscussionRepository', fn() => new DiscussionRepository(App::resolve('Database')));

require base_path('router.php');

unset($_SESSION['_flash']);
