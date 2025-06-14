<?php

class DiscussionRepository
{
    public function __construct(
        private Database $db
    ) {}

    public function findBySlugAndCategory(string $slug, string $categorySlug): ?Discussion
    {
        $data = $this->db->query('
            select d.id
                , d.slug
                , d.created_at
                , d.title
                , d.body
                , c.id as category_id
                , c.name as category_name
                , c.slug as category_slug
                , u.id as user_id
                , u.name as user_name
                , u.avatar_url as user_avatar_url
                , u.role as user_role
            from discussions as d
            join categories as c on d.category_id = c.id
            join users as u on d.user_id = u.id
            where d.slug = :discussion_slug
            and c.slug = :category_slug
        ', [
            'discussion_slug' => $slug,
            'category_slug' => $categorySlug, 
        ])->tryFetch();

        return $data ? new Discussion($data) : null;
    }

    public function find(int $id): ?Discussion
    {
        $data = $this->db->query("
            select d.id
                 , d.slug
                 , d.created_at
                 , d.title
                 , d.body
                 , c.id as category_id
                 , c.name as category_name
                 , c.slug as category_slug
                 , u.id as user_id
                 , u.name as user_name
                 , u.avatar_url as user_avatar_url
                 , u.role as user_role
            from discussions as d
            join categories as c on d.category_id = c.id
            join users as u on d.user_id = u.id
            where d.id = :discussion_id
        ", [
            'discussion_id' => $id,
        ])->tryFetch();

        return $data ? new Discussion($data) : null;
    }

    public function latest()
    {
        $data = $this->db->query("
            SELECT d.id
                , d.slug
                , d.created_at
                , d.title
                , d.body
                , c.id as category_id
                , c.name as category_name
                , c.slug as category_slug
                , u.id as user_id
                , u.name as user_name
                , u.avatar_url as user_avatar_url
                , u.role as user_role
            FROM discussions d
            JOIN categories c ON d.category_id = c.id
            JOIN users u ON d.user_id = u.id
            JOIN (
                SELECT category_id, MAX(created_at) as max_created_at
                FROM discussions
                GROUP BY category_id
            ) latest ON d.category_id = latest.category_id AND d.created_at = latest.max_created_at
            ORDER BY c.name
        ")->fetchAll();

        $discussions = [];
        foreach ($data as $d) {
            $discussions[] = new Discussion($d);
        } 

        return $discussions;
    }

    public function filter(Filters $filters)
    {
        $data = $this->db->query("
            select d.id
                , d.slug
                , d.created_at
                , d.title
                , d.body
                , c.id as category_id
                , c.name as category_name
                , c.slug as category_slug
                , u.id as user_id
                , u.name as user_name
                , u.avatar_url as user_avatar_url
                , u.role as user_role
                , count(*) over() as count
            from discussions as d
            join categories as c on d.category_id = c.id
            join users as u on d.user_id = u.id
            where c.slug = :category_slug or :category_slug = ''
            order by created_at desc
            limit {$filters->limit()} offset {$filters->offset()}
        ", [
            'category_slug' => $filters->category(),
        ])->fetchAll();

        $count = $data[0]['count'] ?? 0;

        $discussions = [];
        foreach ($data as $d) {
            $discussions[] = new Discussion($d);
        }

        return [
            $discussions,
            new Metadata($filters->page(), $filters->limit(), $count),
        ]; 
    }

    public function create(array $data)
    {
        return $this->db->query('
            insert into discussions (slug, title, body, category_id, user_id) 
            values (:slug, :title, :body, :category_id, :user_id)
        ', [
            'slug' => slugify($data['title']),
            'title' => $data['title'],
            'body' => $data['body'],
            'category_id' => $data['category_id'],
            'user_id' => Session::user()->id(),
        ]);
    }

    public function destroy(int $id)
    {
        $this->db->query("
            DELETE FROM discussions
            WHERE id = :id
        ", [
            'id' => $id,
        ]);
    }
}
