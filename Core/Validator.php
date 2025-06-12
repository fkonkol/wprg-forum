<?php

class Validator
{
    private array $errors = [];

    public function __construct(private array $data) {}

    public function errors(): array
    {
        return $this->errors;
    }

    public function invalid(): bool
    {
        return count($this->errors) > 0;
    }

    public function addError(string $field, string $message)
    {
        if (!array_key_exists($field, $this->errors)) {
            $this->errors[$field] = $message;
        }
    }

    public function check(bool $ok, string $field, string $message)
    {
        if (!$ok) {
            $this->addError($field, $message);
        }
    }

    public function required(string $field, string $message)
    {
        $value = $this->get($field);

        $this->check(
            trim($value) !== '',
            $field,
            $message,
        );
    }

    public function minRunes(string $field, int $n, string $message)
    {
        $value = $this->get($field);

        $this->check(
            mb_strlen($value, 'UTF-8') >= $n,
            $field,
            $message,
        );
    }

    public function maxRunes(string $field, int $n, string $message)
    {
        $value = $this->get($field);

        $this->check(
            mb_strlen($value, 'UTF-8') <= $n,
            $field,
            $message,
        );
    }

    public function in(string $field, array $values, string $message)
    {
        $value = $this->get($field);

        $this->check(
            in_array($value, $values),
            $field,
            $message,
        );
    }

    public function alphanumeric(string $field, string $message)
    {
        $value = $this->get($field);

        $this->check(
            ctype_alnum($field),
            $field,
            $message,
        );
    }

    private function get(string $field)
    {
        if (!array_key_exists($field, $this->data)) {
            throw new Exception("Missing field '{$field}' in given data.");
        }

        return $this->data[$field];
    }
}
