<?php

namespace SteveAzz\RuDolly;

trait Cacheable
{
    /**
     * Get a cache key using the convention {ClassName}/{Id}-{timestamp}
     *
     * @return string
     */
    public function getCacheKey()
    {
        return sprintf("%s/%s-%s",
            get_class($this),
            $this->id,
            $this->updated_at->timestamp
        );
    }

}