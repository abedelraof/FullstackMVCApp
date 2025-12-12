<?php
// app/models/Comment.php
require_once __DIR__ . '/../core/Database.php';

class Comment
{
    public static function forPost($postId)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT id, comment, created_at FROM comments WHERE post_id = ? ORDER BY created_at DESC");
        if (!$stmt) {
            die('Prepare failed: ' . $db->error);
        }

        $stmt->bind_param('i', $postId);
        $stmt->execute();

        $result = $stmt->get_result();
        $comments = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $comments[] = $row;
            }
        }

        return $comments;
    }

    public static function create($postId, $comment)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("INSERT INTO comments (post_id, comment) VALUES (?, ?)");
        if (!$stmt) {
            die('Prepare failed: ' . $db->error);
        }

        $stmt->bind_param('is', $postId, $comment);
        return $stmt->execute();
    }
}
