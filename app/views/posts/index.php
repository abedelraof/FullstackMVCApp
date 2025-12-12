<?php
// app/views/posts/index.php
?>
<h2>All Posts</h2>

<?php if (!empty($posts)): ?>
    <?php foreach ($posts as $post): ?>
        <div class="post">
            <h3 style="margin-top:0;">
                <a href="index.php?c=posts&a=show&id=<?php echo (int)$post['id']; ?>" style="color:#222;text-decoration:none;">
                    <?php echo htmlspecialchars($post['title']); ?>
                </a>
            </h3>

            <p>
                <?php
                    $preview = substr($post['content'], 0, 160);
                    echo nl2br(htmlspecialchars($preview));
                    if (strlen($post['content']) > 160) echo '...';
                ?>
            </p>

            <small>Posted on: <?php echo htmlspecialchars($post['created_at']); ?></small><br><br>

            <a class="btn" href="index.php?c=posts&a=show&id=<?php echo (int)$post['id']; ?>">Read more</a>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No posts yet. Be the first to create one!</p>
<?php endif; ?>
