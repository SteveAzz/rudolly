<?php

namespace SteveAzz\RuDolly;

use Illuminate\Contracts\Cache\Repository as Cache;
use Illuminate\Database\Eloquent\Model;

class RussianCaching
{
    /**
     * An array with keys
     *
     * @var array
     */
    protected static $keys = [];

    /**
     * @var Cache
     */
    private $cache;

    /**
     * RussianCaching constructor.
     *
     * @param Cache $cache
     */
    public function __construct(Cache $cache )
    {

        $this->cache = $cache;
    }

    /**
     * Cache a fragment with a specific key.
     *
     * @param $key
     * @param $fragment
     *
     * @return mixed
     */
    public function put($key, $fragment)
    {
        $key = $this->normalizeCacheKey($key);

        return $this->cache
            ->tags('views')
            ->rememberForever($key, function () use ($fragment) {
                return $fragment;
            });
    }

    /**
     * check if specific key is cached.
     *
     * @param $key
     *
     * @return mixed
     */
    public function has($key)
    {
        $key = $this->normalizecachekey($key);

        return $this->cache
            ->tags('views')
            ->has($key);
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    private function normalizeCacheKey($key)
    {
        if ($key instanceof Model) {
            $key = $key->getCacheKey();

            return $key;
        }

        return $key;
    }

}