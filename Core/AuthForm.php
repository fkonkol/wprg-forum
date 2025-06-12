<?php

class AuthForm extends Form
{
    protected function validate()
    {
        $this->validator->required('username', 'Username is required.');
        $this->validator->maxRunes('username', 20, 'The maximum number of characters allowed is 20.');
        $this->validator->alphanumeric('username', 'Enter a valid username.');
        $this->validator->required('password', 'Password is required.');
        $this->validator->minRunes('password', 6, 'The minimum number of characters allowed is 6.');
        $this->validator->maxRunes('password', 255, 'The maximum number of characters allowed is 255.');
    }
}
