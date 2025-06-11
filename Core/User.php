<?php

class User
{
    private $id;
    private $name;
    private $avatarUrl;
    private Role $role;

    public function __construct(array $params)
    {
        $this->id = $params['id'];
        $this->name = $params['name'];
        $this->avatarUrl = $params['avatar_url'];
        $this->role = Role::from($params['role']);
    }

    public function id()
    {
        return $this->id;
    }

    public function name()
    {
        return $this->name;
    }

    public function avatarUrl()
    {
        return $this->avatarUrl;
    }

    public function role(): Role
    {
        return $this->role;
    }

    public function isAdmin(): bool
    {
        return $this->role === Role::ADMIN;
    }

    public function isModerator(): bool
    {
        return $this->role === Role::MODERATOR;
    }

    public function isUser(): bool
    {
        return $this->role === Role::USER;
    }
}
