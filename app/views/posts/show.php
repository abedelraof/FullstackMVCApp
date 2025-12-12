<?php
// app/views/posts/show.php
?>
<div class="post">
    <h2 style="margin-top:0;"><?php echo htmlspecialchars($post['title']); ?></h2>
    <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
    <small>Posted on: <?php echo htmlspecialchars($post['created_at']); ?></small>
</div>

<h3>Comments</h3>

<?php if (!empty($comments)): ?>
    <?php foreach ($comments as $comment): ?>
        <div class="comment">
            <p style="margin:0 0 6px 0;"><?php echo nl2br(htmlspecialchars($comment['comment'])); ?></p>
            <small><?php echo htmlspecialchars($comment['created_at']); ?></small>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No comments yet. Be the first to comment!</p>
<?php endif; ?>

<h3>Add a Comment</h3>

<form action="index.php?c=posts&a=addComment" method="post">
    <input type="hidden" name="post_id" value="<?php echo (int)$post['id']; ?>">
    <textarea name="comment" rows="4" required></textarea>
    <button type="submit" class="btn">Submit Comment</button>
</form>
