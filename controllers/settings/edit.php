<?php

if (!Session::user()) {
    redirect('/login');
}

render('settings/edit');
