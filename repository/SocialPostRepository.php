<?php

namespace App\Repository;

use App\Models\SocialPost;
use PDO;

class SocialPostRepository
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findByPlatformAndPostId($platform, $postId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM social_posts WHERE platform = :platform AND post_id = :post_id");
        $stmt->execute(['platform' => $platform, 'post_id' => $postId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result) {
            return new SocialPost($result);
        }
        
        return null;
    }

    public function save(SocialPost $post)
    {
        $stmt = $this->pdo->prepare("INSERT INTO social_posts (platform, post_id, message, author, post_created_at, likes_count, comments_count, shares_count, media_url, post_url, hashtags) VALUES (:platform, :post_id, :message, :author, :post_created_at, :likes_count, :comments_count, :shares_count, :media_url, :post_url, :hashtags)");
        
        $stmt->execute([
            'platform' => $post->getPlatform(),
            'post_id' => $post->getPostId(),
            'message' => $post->getMessage(),
            'author' => $post->getAuthor(),
            'post_created_at' => $post->getPostCreatedAt(),
            'likes_count' => $post->getLikesCount(),
            'comments_count' => $post->getCommentsCount(),
            'shares_count' => $post->getSharesCount(),
            'media_url' => $post->getMediaUrl(),
            'post_url' => $post->getPostUrl(),
            'hashtags' => $post->getHashtags()
        ]);
    }

    public function update($id, SocialPost $post)
    {
        $stmt = $this->pdo->prepare("UPDATE social_posts SET platform = :platform, post_id = :post_id, message = :message, author = :author, post_created_at = :post_created_at, likes_count = :likes_count, comments_count = :comments_count, shares_count = :shares_count, media_url = :media_url, post_url = :post_url, hashtags = :hashtags WHERE id = :id");
        
        $stmt->execute([
            'id' => $id,
            'platform' => $post->getPlatform(),
            'post_id' => $post->getPostId(),
            'message' => $post->getMessage(),
            'author' => $post->getAuthor(),
            'post_created_at' => $post->getPostCreatedAt(),
            'likes_count' => $post->getLikesCount(),
            'comments_count' => $post->getCommentsCount(),
            'shares_count' => $post->getSharesCount(),
            'media_url' => $post->getMediaUrl(),
            'post_url' => $post->getPostUrl(),
            'hashtags' => $post->getHashtags()
        ]);
    }

    public function findAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM social_posts");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $posts = [];
        foreach ($results as $result) {
            $posts[] = new SocialPost($result);
        }
        
        return $posts;
    }
}
