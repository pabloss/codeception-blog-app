<?php

use App\Post;
use Helper\PostListContainsPostAssertion;

class DeletePostCommandTest extends \Codeception\Test\Unit
{
    use PostListContainsPostAssertion;
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

        self::assertEquals($postTitle, Repo::instance()->lastPost()->title());
        self::assertEquals($postContent, Repo::instance()->lastPost()->content());

        $lastPost = Repo::instance()->lastPost();
        $savePostCommand = new DeletePostCommand($lastPost->id());
        $savePostCommand->run();

        self::assertPostListDoesNotContainPost(Repo::instance()->list(), $lastPost);
    }
}
