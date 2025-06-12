<?php

render('registrations/new', [
    'errors' => $_SESSION['_flash']['errors'] ?? [],
]);
