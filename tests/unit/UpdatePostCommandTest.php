<?php

use App\Post;

class UpdatePostCommandTest extends \Codeception\Test\Unit
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
    public function testRun()
    {
        $postTitle = "Post Title";
        $postContent = "Post Content";
        // Post is not an entity, it is domain object, but still mappable to entities from repo
        $savePostCommand = new SavePostCommand(new Post($postTitle, $postContent));
        $savePostCommand->run();

        $newPostTitle = "New Post Title";
        $newPostContent = "New Post Content";
        $updatePostCommand = new UpdatePostCommand(new Post($newPostTitle, $newPostContent), Repo::instance()->lastPost()->id());
        $updatePostCommand->run();

        self::assertEquals($newPostTitle, Repo::instance()->lastPost()->title());
        self::assertEquals($newPostContent, Repo::instance()->lastPost()->content());
    }
}
