<?php

abstract class Form
{
    protected Validator $validator;

    public function __construct(array $params)
    {
        $this->validator = new Validator($params);
        $this->validate();
    }

    abstract protected function validate();

    public function invalid()
    {
        return $this->validator->invalid();
    }

    public function errors()
    {
        return $this->validator->errors();
    }
}
