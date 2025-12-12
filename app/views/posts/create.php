<?php
// app/views/posts/create.php
?>
<h2>Create New Post</h2>

<form action="index.php?c=posts&a=store" method="post">
    <label for="title"><strong>Title</strong></label><br>
    <input type="text" name="title" id="title" required>

    <label for="content"><strong>Content</strong></label><br>
    <textarea name="content" id="content" rows="8" required></textarea>

    <button type="submit" class="btn">Publish</button>
</form>
