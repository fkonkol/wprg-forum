<?php

class Comment
{
    public function __construct(
        private int $id,
        private int $discussionId,
        private string $body,
        private string $username,
        private string $avatarUrl,
        private bool $isGuest,
        private DateTimeImmutable $createdAt,
    ) {}

    public static function fromArray(array $params): self
    {
        return new self(
            $params['id'],
            $params['discussion_id'],
            $params['body'],
            $params['user_name'],
            $params['user_avatar_url'],
            (bool) $params['is_guest'],
            new DateTimeImmutable($params['created_at']),
        );
    }

    public function id(): int
    {
        return $this->id;
    }

    public function discussionId(): int
    {
        return $this->discussionId;
    }

    public function body(): string
    {
        return $this->body;
    }

    public function username(): string
    {
        return $this->username;
    }

    public function avatarUrl(): string
    {
        return $this->avatarUrl;
    }

    public function isGuest(): bool
    {
        return $this->isGuest;
    }

    public function createdAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setBody(): string
    {
        return $this->body;
    }

    public function setGuestName(): string
    {
        return $this->username;
    }
}
