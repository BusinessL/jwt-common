<?php
class ApcStore{
    /**
     * The APC wrapper instance.
     *
     * @var \Illuminate\Cache\ApcWrapper
     */
    protected $apc;

    /**
     * Create a new APC store.
     *
     * @param  \Illuminate\Cache\ApcWrapper  $apc
     * @param  string  $prefix
     * @return void
     */
    public function __construct(ApcWrapper $apc, $prefix = '')
    {
        $this->apc = $apc;
        $this->prefix = $prefix;
    }

    /**
     * Store an item in the cache for a given number of minutes.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @param  float|int  $minutes
     * @return void
     */
    public function put($key, $value, $minutes)
    {
        $this->apc->put($this->prefix.$key, $value, (int) ($minutes * 60));
    }
}