<?php

namespace App\Controller;

use App\Service\SocialMediaService;
use App\Repository\SocialPostRepository;
// SocialMediaController.php
class SocialMediaController {
    private $socialMediaService;
    private $SocialPostRepository;

    public function __construct(SocialMediaService $socialMediaService, SocialPostRepository $socialPostRepository) {
        $this->socialMediaService = $socialMediaService;
        $this->SocialPostRepository = $socialPostRepository;
    }

    public function fetchAndDisplayPosts() {
        // Récupérer les posts
        $posts = $this->socialMediaService->getPostsByHashtag('ICOBoardGame');

        // Traiter les posts
        foreach ($posts as $post) {
            // Vérifier si le post existe déjà dans la base de données
            $existingPost = $this->SocialPostRepository->findByPlatformAndPostId($post->getPlatform(), $post->getPostId());

            if (!$existingPost) {
                // Si le post n'existe pas, l'ajouter à la base de données
                $this->SocialPostRepository->save($post);
            } else {
                // Si le post existe, mettre à jour les informations si nécessaire
                $this->SocialPostRepository->update($existingPost->getId(), $post);
            }
        }

        // Récupérer tous les posts de la base de données pour l'affichage
        $allPosts = $this->SocialPostRepository->findAll();

        // Trier les posts par date de création (du plus récent au plus ancien)
        usort($allPosts, function($a, $b) {
            return strtotime($b->getCreatedAt()) - strtotime($a->getCreatedAt());
        });

        // Préparer les données pour l'affichage
        $displayData = [];
        foreach ($allPosts as $post) {
            $displayData[] = [
                'platform' => $post->getPlatform(),
                'message' => $post->getMessage(),
                'author' => $post->getAuthor(),
                'createdAt' => $post->getCreatedAt(),
                'likesCount' => $post->getLikesCount(),
                'commentsCount' => $post->getCommentsCount(),
                'sharesCount' => $post->getSharesCount(),
                'mediaUrl' => $post->getMediaUrl(),
                'postUrl' => $post->getPostUrl()
            ];
        }

        include 'Includes/social_posts.php';


    }
}



