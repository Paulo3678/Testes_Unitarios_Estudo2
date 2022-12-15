<?php

use App\Article;
use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    /**
     * @var Article $article
     */
    protected $article;

    public function setUp(): void
    {
        $this->article = new Article();
    }

    
    public function testTitleIsEmptyByDefault()
    {
        $this->assertEmpty($this->article->title);
    }

    public function testSlugIsEmptyWithNoTitle()
    {
        $this->assertSame($this->article->getSlug(), "");
    }
    
    /*
    public function testSlugHasSpacesReplacedByUnderscores()
    {
        $this->article->title = "An example article";
        $this->assertEquals($this->article->getSlug(), "An_example_article");
    }

    public function testSlugHasWhitespaceReplacedBySingleUnderscore()
    {
        $this->article->title = "An example  \n  article";
        $this->assertEquals($this->article->getSlug(), "An_example_article");
    }

    public function testSlugDoesNotStartOrEndWithAnUnderscore()
    {
        $this->article->title = " An example article ";
        $this->assertEquals($this->article->getSlug(), "An_example_article");
    }

    public function testSlugDoesNotHaveAnyNonWordCharacters()
    {
        $this->article->title = "Read! This! Now!";
        $this->assertEquals($this->article->getSlug(), "Read_This_Now");
    }
    */

    public function titleProvider()
    {
        return [
            "testSlugHasSpacesReplacedByUnderscores" =>["An example article", "An_example_article"],
            "testSlugHasWhitespaceReplacedBySingleUnderscore" =>["An    example  \n  article", "An_example_article"],
            "testSlugDoesNotStartOrEndWithAnUnderscore" =>[" An example article ", "An_example_article"],
            "testSlugDoesNotHaveAnyNonWordCharacters" =>["Read! This! Now!", "Read_This_Now"]

        ];
    }

    /** @dataProvider titleProvider */    
    public function testSlug($title, $slug)
    {
        $this->article->title = $title;
        $this->assertEquals($this->article->getSlug(), $slug);
    }
}
