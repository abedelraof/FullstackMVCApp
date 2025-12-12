<?php
// app/models/Post.php
require_once __DIR__ . '/../core/Database.php';

class Post
{
    public static function all()
    {
        $db = Database::getConnection();
        $sql = "SELECT id, title, content, created_at FROM posts ORDER BY created_at DESC";
        $result = $db->query($sql);

        $posts = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $posts[] = $row;
            }
        }

        return $posts;
    }

    public static function find($id)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT id, title, content, created_at FROM posts WHERE id = ?");
        if (!$stmt) {
            die('Prepare failed: ' . $db->error);
        }

        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result ? $result->fetch_assoc() : null;
    }

    public static function create($title, $content)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
        if (!$stmt) {
            die('Prepare failed: ' . $db->error);
        }

        $stmt->bind_param('ss', $title, $content);
        return $stmt->execute();
    }
}
