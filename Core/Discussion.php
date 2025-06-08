<?php

class Discussion
{
    private int $id;
    private string $slug;
    private string $title;
    private string $body;
    private DateTimeImmutable $createdAt;
    private Category $category;
    private User $author;

    public function __construct(array $params)
    {
        $this->id = $params['id'];
        $this->slug = $params['slug'];
        $this->title = $params['title'];
        $this->body = $params['body'];
        $this->createdAt = new DateTimeImmutable($params['created_at']);

        $this->category = Category::fromId($params['category_id']);

        $this->author = new User([
            'id' => $params['user_id'],
            'name' => $params['user_name'],
        ]);
    }

    public function id()
    {
        return $this->id;
    }

    public function slug()
    {
        return $this->slug;
    }

    public function title()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->slug = slugify($title);
        $this->title = $title;
    }

    public function body()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function createdAt()
    {
        return $this->createdAt;
    }

    public function category()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function author()
    {
        return $this->author;
    }
}
