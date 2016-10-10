<?php

namespace Shrikeh\PagerDuty\Pimple\Provider\Decoder;

use Pimple\Container;
use Shrikeh\PagerDuty\Pimple\Provider\RegisterableService;

use Shrikeh\PagerDuty\Pimple\Provider\Decoder as DecoderServiceProvider;
use Shrikeh\PagerDuty\Decoder\Json\Webmozart;
use Webmozart\Json\JsonDecoder;

final class Json implements RegisterableService, DecoderServiceProvider
{
    const PROVIDER_DECODER_JSON = 'decoder.json';
    const PROVIDER_DECODER_JSON_WEBMOZART  = 'decoder.json.webmozart';

    use \Shrikeh\PagerDuty\Pimple\Provider\RegisterWith;

    public function register(Container $container)
    {
        $container[static::PROVIDER_DECODER_JSON_WEBMOZART] = function(Container $c) {
            return new JsonDecoder();
        };

        $container[static::PROVIDER_DECODER_JSON] = function(Container $c) {
            return new Webmozart($c[static::PROVIDER_DECODER_JSON_WEBMOZART]);
        };

        $container[static::PROVIDER_DECODER] = function(Container $c) {
            return $c[static::PROVIDER_DECODER_JSON];
        };
    }
}
