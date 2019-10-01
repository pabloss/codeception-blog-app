<?php 

class BlogCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function frontPageWorks(AcceptanceTester $I)
    {
        $I->amOnPage("/");
        $I->seeInTitle("Codeception Blog App");
    }

    // tests
    public function addingPostWorks(AcceptanceTester $I)
    {
        $newTestPostTitle = "Test Title";
        $newTestPostContent = "Test Content";

        $I->amOnPage("/post/add");
        $I->submitForm("#new_post", [
            "title" => $newTestPostTitle,
            "content" => $newTestPostContent,
        ]);
        $I->seeResponseCodeIsRedirection();
        $I->amOnPage("/");

        $I->see($newTestPostTitle);
        $I->see($newTestPostContent);
        $I->seeLink("Remove post", "/post/remove/test-title");
        $I->click('//a[@href=/post/remove/test-title]');
        $I->dontSee($newTestPostTitle);
        $I->dontSee($newTestPostContent);
    }

    // tests
    public function updatingPostWorks(AcceptanceTester $I)
    {
        $newTestPostTitle = "Test Title - new";
        $newTestPostContent = "Test Content - new ";

        $I->amOnPage("/");
        $I->click('//a[@href=/post/update/test-title]');
        $I->seeResponseCodeIsRedirection();
        $I->amOnPage("/post/update/test-title");
        $I->submitForm("#update_post", [
            "title" => $newTestPostTitle,
            "content" => $newTestPostContent,
        ]);
        $I->seeResponseCodeIsRedirection();
        $I->amOnPage("/");

        $I->see($newTestPostTitle);
        $I->see($newTestPostContent);
    }
}
