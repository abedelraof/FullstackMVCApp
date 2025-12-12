<?php
// app/views/layout/header.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fullstack Studio Blog</title>
    <style>
        :root { --accent: #ff6600; --bg: #f5f5f5; --card: #ffffff; --muted: #777; }
        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
            margin: 40px auto;
            padding: 0 16px;
            background: var(--bg);
            color: #222;
        }
        header { margin-bottom: 24px; }
        header h1 { margin: 0 0 10px 0; }
        nav a {
            margin-right: 12px;
            text-decoration: none;
            color: var(--accent);
            font-weight: bold;
        }
        .post {
            background: var(--card);
            padding: 16px;
            margin-bottom: 14px;
            border-radius: 8px;
            box-shadow: 0 1px 2px rgba(0,0,0,.06);
        }
        .comment {
            background: #fafafa;
            padding: 12px;
            margin-bottom: 10px;
            border-left: 4px solid var(--accent);
            border-radius: 6px;
        }
        .btn {
            display: inline-block;
            padding: 10px 14px;
            background: var(--accent);
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }
        textarea, input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 12px 0;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
        }
        small { color: var(--muted); }
        hr { border: none; border-top: 1px solid #e3e3e3; margin: 16px 0; }
    </style>
</head>
<body>
<header>
    <h1>Fullstack Studio Blog</h1>
    <nav>
        <a href="index.php?c=posts&a=index">Home</a>
        <a href="index.php?c=posts&a=create">Create Post</a>
    </nav>
    <hr>
</header>
