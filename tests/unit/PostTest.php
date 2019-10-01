<?php

use App\Post;

class PostTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testPost()
    {
        $postTitle = "Post Title";
        $postContent = "Post Content";
        $post = new Post($postTitle, $postContent);
        self::assertEquals($postTitle, $post->title());
        self::assertEquals($postContent, $post->content());
    }
}
