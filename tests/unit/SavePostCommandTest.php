<?php

use App\Post;

class SavePostCommandTest extends \Codeception\Test\Unit
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
        $command = new SavePostCommand(new Post($postTitle, $postContent));
        $command->run();

        self::assertEquals($postTitle, Repo::instance()->lastPost()->title());
        self::assertEquals($postContent, Repo::instance()->lastPost()->content());
    }
}
