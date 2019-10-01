<?php
declare(strict_types=1);

namespace Helper;

use App\Post;
use Codeception\DomainRule;

trait PostListContainsPostAssertion
{
    public function assertPostListDoesNotContainPost(iterable $postList, Post $post)
    {
        self::assertThat(
            ['post' => $post, 'postList' => $postList],
            new DomainRule('post and false === postList.contains(post)')
        );
    }
}
