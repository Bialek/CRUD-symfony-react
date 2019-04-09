<?php

namespace App\Controller;
/**
 * @Route("/blog")
 */

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends AbstractController {
    private const POSTS = [
        [
            'id' => 1,
            'slug' => 'hello-world',
            'title' => 'Hello world!'
        ],
        [
            'id' => 2,
            'slug' => 'another-post',
            'title' => 'This is another post!'
        ],
        [
            'id' => 3,
            'slug' => 'last-example',
            'title' => 'This is the last example'
        ]
    ];

    /**
     * @Route("/{page}", name="blog_list")
     */
    public function list($page = 1, Request $request) {
        $limit = $request->get('limit', 10);

        return $this->json([
            'page' => $page,
            'limit' => $limit,
            'data' => array_map(function ($item) {
                return $this -> generateUrl('blog_by_slug', ['slug' => $item['slug']]);
            }, self::POSTS)
        ]);
    }
    /**
     * @Route("/id", name="blog_by_id", requirements={"id"="\d+"})
     */
    public function post($id) {
        return $this->json(
            self::POSTS[array_serch($id, array_column(self::POSTS, 'id'))]
        );
    }
    /**
     * @Route("/{slug}", name="blog_by_slug")
     */
    public function postBySlug($slug) {
        return $this->json(
            self::POSTS[array_search($slug, array_column(self::POSTS,'slug'))]
        );
    }
}