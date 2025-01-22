<?php

namespace App\Models;

class SocialPost {
    private $id;
    private $platform;
    private $postId;
    private $message;
    private $author;
    private $postCreatedAt;
    private $likesCount;
    private $commentsCount;
    private $sharesCount;
    private $mediaUrl;
    private $postUrl;
    private $hashtags;
    private $createdAt;

    public function __construct(array $data = []) {
        if (!empty($data)) {
            $this->id = $data['id'] ?? null;
            $this->platform = $data['platform'] ?? '';
            $this->postId = $data['post_id'] ?? '';
            $this->message = $data['message'] ?? '';
            $this->author = $data['author'] ?? '';
            $this->postCreatedAt = $data['post_created_at'] ?? '';
            $this->likesCount = $data['likes_count'] ?? 0;
            $this->commentsCount = $data['comments_count'] ?? 0;
            $this->sharesCount = $data['shares_count'] ?? 0;
            $this->mediaUrl = $data['media_url'] ?? '';
            $this->postUrl = $data['post_url'] ?? '';
            $this->hashtags = $data['hashtags'] ?? '';
            $this->createdAt = $data['created_at'] ?? null;
        }
    }

   
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getPlatform() { return $this->platform; }
    public function setPlatform($platform) { $this->platform = $platform; }

    public function getPostId() { return $this->postId; }
    public function setPostId($postId) { $this->postId = $postId; }

    public function getMessage() { return $this->message; }
    public function setMessage($message) { $this->message = $message; }

    public function getAuthor() { return $this->author; }
    public function setAuthor($author) { $this->author = $author; }

    public function getPostCreatedAt() { return $this->postCreatedAt; }
    public function setPostCreatedAt($postCreatedAt) { $this->postCreatedAt = $postCreatedAt; }

    public function getLikesCount() { return $this->likesCount; }
    public function setLikesCount($likesCount) { $this->likesCount = $likesCount; }

    public function getCommentsCount() { return $this->commentsCount; }
    public function setCommentsCount($commentsCount) { $this->commentsCount = $commentsCount; }

    public function getSharesCount() { return $this->sharesCount; }
    public function setSharesCount($sharesCount) { $this->sharesCount = $sharesCount; }

    public function getMediaUrl() { return $this->mediaUrl; }
    public function setMediaUrl($mediaUrl) { $this->mediaUrl = $mediaUrl; }

    public function getPostUrl() { return $this->postUrl; }
    public function setPostUrl($postUrl) { $this->postUrl = $postUrl; }

    public function getHashtags() { return $this->hashtags; }
    public function setHashtags($hashtags) { $this->hashtags = $hashtags; }

    public function getCreatedAt() { return $this->createdAt; }
    public function setCreatedAt($createdAt) { $this->createdAt = $createdAt; }
}
