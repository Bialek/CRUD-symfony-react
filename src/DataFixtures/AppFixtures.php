<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\BlogPost;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $blogPost = new BlogPost();
        $blogPost->setTitle('A first post!');
        $blogPost->setPublished(new \DateTime('2018-07-01 12:00:00'));
        $blogPost->setContent('Post text');
        $blogPost->setAuthor('Rafal');
        $blogPost->setSlug('a-first-post');

        $manager->persist($blogPost);
        $manager->flush();

        $blogPost = new BlogPost();
        $blogPost->setTitle('A second post!');
        $blogPost->setPublished(new \DateTime('2018-07-05 12:00:00'));
        $blogPost->setContent('Post text');
        $blogPost->setAuthor('Rafal');
        $blogPost->setSlug('a-second-post');

        $manager->persist($blogPost);
        $manager->flush();
    }
}
