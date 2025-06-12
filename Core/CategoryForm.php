<?php

class CategoryForm extends Form
{
    protected function validate()
    {
        $this->validator->required('name', 'Name is required.');
        $this->validator->required('slug', 'Slug is required.');
    }
}
