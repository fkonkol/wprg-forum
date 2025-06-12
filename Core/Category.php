<?php

class Category
{
    private int $id;
    private string $name;
    private string $slug;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->slug = $data['slug'];
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function slug(): string
    {
        return $this->slug;
    }

    public static function fromId(int $id): ?self
    {
        $db = App::resolve(Database::class);
        $data = $db->query('SELECT * FROM categories WHERE id = :id', [
            'id' => $id,
        ])->tryFetch();

        return $data ? new self($data) : null;
    }

    public static function all(): array
    {
        $db = App::resolve(Database::class);
        $rows = $db->query('SELECT * FROM categories ORDER BY name')->fetchAll();

        return array_map(fn($row) => new self($row), $rows);
    }

    public static function idCases(): array
    {
        $db = App::resolve(Database::class);
        $ids = $db->query("SELECT id FROM categories")->fetchAll();

        return array_column($ids, 'id');
    }
}