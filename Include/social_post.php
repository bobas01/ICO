<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts Sociaux #ICOBoardGame</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
        }
        .social-posts {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        .post {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            background-color: #f9f9f9;
        }
        .post-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .platform {
            font-weight: bold;
            color: #3498db;
        }
        .author {
            font-style: italic;
        }
        .message {
            margin-bottom: 10px;
        }
        .media img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
        }
        .post-footer {
            display: flex;
            justify-content: space-between;
            font-size: 0.9em;
            color: #7f8c8d;
        }
        .post-link {
            color: #2980b9;
            text-decoration: none;
        }
        .post-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>#ICOBoardGame Social Wall</h1>
    <div class="social-posts">
        <?php foreach ($posts as $post): ?>
            <div class="post">
                <div class="post-header">
                    <span class="platform"><?= htmlspecialchars($post['platform']) ?></span>
                    <span class="author"><?= htmlspecialchars($post['author']) ?></span>
                </div>
                <p class="message"><?= htmlspecialchars($post['message']) ?></p>
                <?php if (!empty($post['mediaUrl'])): ?>
                    <div class="media">
                        <img src="<?= htmlspecialchars($post['mediaUrl']) ?>" alt="Media content">
                    </div>
                <?php endif; ?>
                <div class="post-footer">
                    <span><?= htmlspecialchars($post['createdAt']) ?></span>
                    <span>
                        Likes: <?= $post['likesCount'] ?> |
                        Comments: <?= $post['commentsCount'] ?> |
                        Shares: <?= $post['sharesCount'] ?>
                    </span>
                </div>
                <a href="<?= htmlspecialchars($post['postUrl']) ?>" class="post-link" target="_blank">View original post</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
