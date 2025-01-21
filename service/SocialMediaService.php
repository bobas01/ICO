<?php

namespace App\Service;


use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use App\Models\SocialPost;

class SocialMediaService {
    private $fb;
    private $accessToken;

    public function __construct($appId, $appSecret, $accessToken) {
        $this->fb = new Facebook([
            'app_id' => $appId,
            'app_secret' => $appSecret,
            'default_graph_version' => 'v16.0',
        ]);
        $this->accessToken = $accessToken;
    }

    public function getPostsByHashtag($hashtag) {
        $posts = [];
        
        try {
            // Récupérer les posts Facebook
            $facebookPosts = $this->getFacebookPosts($hashtag);
            $posts = array_merge($posts, $facebookPosts);

            // Récupérer les posts Instagram
            $instagramPosts = $this->getInstagramPosts($hashtag);
            $posts = array_merge($posts, $instagramPosts);

        } catch (FacebookResponseException $e) {
            // Gérer les erreurs de l'API Facebook
            error_log('Facebook API Error: ' . $e->getMessage());
        } catch (FacebookSDKException $e) {
            // Gérer les erreurs du SDK Facebook
            error_log('Facebook SDK Error: ' . $e->getMessage());
        }

        return $posts;
    }

    private function getFacebookPosts($hashtag) {
        $response = $this->fb->get(
            "/search?q=%23" . urlencode($hashtag) . "&type=post&fields=id,message,created_time,permalink_url",
            $this->accessToken
        );
        
        $graphEdge = $response->getGraphEdge();
        $facebookPosts = [];

        foreach ($graphEdge as $post) {
            $facebookPosts[] = new SocialPost(
                null,
                'facebook',
                $post['id'],
                $post['message'] ?? '',
                '', // author not directly available
                $post['created_time']->format('Y-m-d H:i:s'),
                0, // likes count not directly available
                0, // comments count not directly available
                0, // shares count not directly available
                '', // media url not directly available
                $post['permalink_url'],
                $hashtag
            );
        }

        return $facebookPosts;
    }

    private function getInstagramPosts($hashtag) {
        // D'abord, obtenir l'ID du hashtag
        $response = $this->fb->get(
            "/ig_hashtag_search?q=" . urlencode($hashtag),
            $this->accessToken
        );
        $hashtagId = $response->getGraphNode()->getField('id');

        // Ensuite, récupérer les médias récents avec ce hashtag
        $response = $this->fb->get(
            "/{$hashtagId}/recent_media?fields=id,caption,media_type,media_url,permalink,timestamp",
            $this->accessToken
        );
        
        $graphEdge = $response->getGraphEdge();
        $instagramPosts = [];

        foreach ($graphEdge as $post) {
            $instagramPosts[] = new SocialPost(
                null,
                'instagram',
                $post['id'],
                $post['caption'] ?? '',
                '', // author not directly available
                $post['timestamp']->format('Y-m-d H:i:s'),
                0, // likes count not directly available
                0, // comments count not directly available
                0, // shares count not directly available
                $post['media_url'],
                $post['permalink'],
                $hashtag
            );
        }

        return $instagramPosts;
    }
}
