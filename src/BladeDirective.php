<?php

namespace SteveAzz\RuDolly;

class BladeDirective
{
    /**
     * An array of cache keys.
     *
     * @var array
     */
    protected $keys = [];
    /**
     * @var RussianCaching
     */
    private $cache;

    /**
     * BladeDirective constructor.
     *
     * @param RussianCaching $cache
     */
    public function __construct(RussianCaching $cache)
    {

        $this->cache = $cache;
    }

    /**
     * Set up the caching mechanism
     *
     * @param $model
     *
     * @return mixed
     */
    public function setUp($model)
    {
        ob_start();

        $this->keys[] = $key = $model->getCacheKey();

        return $this->cache->has($key);
    }

    /**
     * Teardown out cache setup.
     *
     * @return mixed
     */
    public function tearDown()
    {
        return $this->cache->put(array_pop($this->keys), ob_get_clean());
    }
}
