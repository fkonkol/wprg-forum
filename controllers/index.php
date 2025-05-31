<?php

$discussions = require 'mock_data.php';

render('index', [
    'discussions' => $discussions,
]);
