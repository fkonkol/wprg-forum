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

    public function comments(int $id): array
    {
        return $this->db->query("
            select c.id
                , c.created_at
                , c.discussion_id
                , c.body
                , coalesce(u.name, c.guest_name) as user_name 
                , count(*) over() as count
            from comments as c
            left join users as u on c.user_id = u.id
            where c.discussion_id = :discussion_id
        ", [
            'discussion_id' => $id,
        ])->fetchAll();
    }

    public function filter(Filters $filters)
    {
        $discussions = $this->db->query("
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

        $count = $discussions[0]['count'] ?? 0;
        
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
}
