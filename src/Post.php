<?php
declare(strict_types=1);

namespace App;

class Post
{
    /**
     * @var string
     */
    private $postTitle;
    /**
     * @var string
     */
    private $postContent;

    /**
     * Post constructor.
     * @param string $postTitle
     * @param string $postContent
     */
    public function __construct(string $postTitle, string $postContent)
    {
        $this->postTitle = $postTitle;
        $this->postContent = $postContent;
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->postTitle;
    }

    /**
     * @return string
     */
    public function content(): string
    {
        return $this->postContent;
    }
}
