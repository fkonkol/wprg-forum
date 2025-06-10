<?php

class DiscussionForm
{
    private Validator $validator;

    public function __construct(array $params)
    {
        $this->validator = new Validator($params);

        $this->validator->required('title', 'Title is required.');
        $this->validator->maxRunes('body', 1000, 'The maximum number of characters allowed is 1000.');
        $this->validator->in('category_id', Category::idCases(), 'Category is required.');
    }

    public function invalid()
    {
        return $this->validator->invalid();
    }

    public function errors()
    {
        return $this->validator->errors();
    }
}
