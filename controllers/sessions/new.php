<?php

render('sessions/new', [
    'errors' => $_SESSION['_flash']['errors'] ?? [],
]);
