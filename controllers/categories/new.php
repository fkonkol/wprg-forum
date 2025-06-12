<?php

render('categories/new', [
    'errors' => $_SESSION['_flash']['errors'] ?? [],
]);
