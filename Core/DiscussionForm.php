<?php

class DiscussionForm extends Form
{
    protected function validate()
    {
        $this->validator->required('title', 'Title is required.');
        $this->validator->maxRunes('body', 1000, 'The maximum number of characters allowed is 1000.');
        $this->validator->in('category_id', Category::idCases(), 'Category is required.');
    }
}
