<?php

use Illuminate\Cache\ArrayStore;
use Illuminate\Cache\Repository;
use SteveAzz\RuDolly\BladeDirective;
use SteveAzz\RuDolly\RussianCaching;

class BladeDirectiveTest extends TestCase
{
    /**
     * Instance of Russian Caching
     *
     * @var RussianCaching
     */
    public $doll;

    /** @test */
    public function it_sets_up_the_opening_cache_directive()
    {
        $directive = $this->createNewCacheDirective();
        $post = $this->makePost();

        $this->assertFalse($directive->setUp($post));

        echo '<div>fragment</div>';

        $cached_fargment = $directive->tearDown();

        $this->assertEquals('<div>fragment</div>', $cached_fargment);

        $this->assertTrue($this->doll->has($post));
    }

    /**
     * Get a new instance of the cache directive.
     *
     * @return BladeDirective
     */
    private function createNewCacheDirective()
    {
        $cache = new Repository(new ArrayStore());

        $this->doll = new RussianCaching($cache);

        return new BladeDirective($this->doll);
    }
}