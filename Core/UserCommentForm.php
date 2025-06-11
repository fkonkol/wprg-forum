<?php

class UserCommentForm extends Form
{
    protected function validate()
    {
        $this->validator->required('body', 'Body is required.');
        $this->validator->maxRunes('body', 500, 'The maximum number of characters allowed is 500.');
    }
}
