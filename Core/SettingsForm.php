<?php

class SettingsForm extends Form
{
    protected function validate()
    {
        $this->validator->required('username', 'Username is required.');
        $this->validator->maxRunes('username', 20, 'The maximum number of characters allowed is 20.');
        $this->validator->alphanumeric('username', 'Enter a valid username.');
    }
}
