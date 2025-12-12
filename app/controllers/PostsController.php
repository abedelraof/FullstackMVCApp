<?php
// app/controllers/PostsController.php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Post.php';
require_once __DIR__ . '/../models/Comment.php';

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $this->render('posts/index', ['posts' => $posts]);
    }

    public function show($id)
    {
        $id = (int)$id;
        if ($id <= 0) {
            die('Invalid post ID.');
        }

        $post = Post::find($id);
        if (!$post) {
            die('Post not found.');
        }

        $comments = Comment::forPost($id);
        $this->render('posts/show', [
            'post' => $post,
            'comments' => $comments
        ]);
    }

    public function create()
    {
        $this->render('posts/create');
    }

    public function store()
    {
        $title   = isset($_POST['title']) ? trim($_POST['title']) : '';
        $content = isset($_POST['content']) ? trim($_POST['content']) : '';

        if ($title === '' || $content === '') {
            die('Title and content are required.');
        }

        Post::create($title, $content);
        $this->redirect('index.php?c=posts&a=index');
    }

    public function addComment()
    {
        $postId  = isset($_POST['post_id']) ? (int)$_POST['post_id'] : 0;
        $comment = isset($_POST['comment']) ? trim($_POST['comment']) : '';

        if ($postId <= 0 || $comment === '') {
            die('Post ID and comment are required.');
        }

        // Basic existence check (optional but nice)
        $post = Post::find($postId);
        if (!$post) {
            die('Post not found.');
        }

        Comment::create($postId, $comment);
        $this->redirect('index.php?c=posts&a=show&id=' . $postId);
    }
}
