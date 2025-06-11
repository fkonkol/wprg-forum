<?php

class AnonymousCommentForm extends UserCommentForm
{
    protected function validate()
    {
        parent::validate();
        $this->validator->required('guest_name', 'Name is required.');
    }
}
