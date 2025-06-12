<?php

class AvatarForm extends Form
{
    protected function validate()
    {
        $this->validator->in('mime', ['image/jpeg', 'image/png'], 'Select a valid PNG or JPG image.');
    }
}
