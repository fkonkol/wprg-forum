<?php

$discussions = require 'mock_data.php';

render('index.view.php', [
    'discussions' => $discussions,
]);
