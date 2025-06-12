<?php

class CommentRepository
{
    public function __construct(
        private Database $db
    ) {}

    public function findAllByDiscussionId(int $id): array
    {
        $data = $this->db->query("
            select c.id
                , c.created_at
                , c.discussion_id
                , c.body
                , coalesce(u.name, c.guest_name) as user_name 
                , coalesce(u.avatar_url, '/static/img/avatar.png') as user_avatar_url
                , (c.user_id is null) as is_guest
                , count(*) over() as count
            from comments as c
            left join users as u on c.user_id = u.id
            where c.discussion_id = :discussion_id
        ", [
            'discussion_id' => $id,
        ])->fetchAll();

        $count = $data[0]['count'] ?? 0;

        $comments = [];
        foreach ($data as $d) {
            $comments[] = Comment::fromArray($d);
        }

        return [
            $comments,
            $count,
        ]; 
    }

    public function find(int $id): ?Comment
    {
        $data = $this->db->query("
            select c.id
                , c.created_at
                , c.discussion_id
                , c.body
                , coalesce(u.name, c.guest_name) as user_name 
                , coalesce(u.avatar_url, '/static/img/avatar.png') as user_avatar_url
                , (c.user_id is null) as is_guest
                , count(*) over() as count
            from comments as c
            left join users as u on c.user_id = u.id
            where c.id = :id
        ", [
            'id' => $id,
        ])->tryFetch();

        return Comment::fromArray($data);
    }

    public function destroy(int $id)
    {
        $this->db->query("
            DELETE FROM comments 
            WHERE id = :id
        ", [
            'id' => $id,
        ]);
    }
}
