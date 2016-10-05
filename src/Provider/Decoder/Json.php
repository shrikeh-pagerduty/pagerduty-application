<?php

namespace Shrikeh\PagerDuty\Application\Provider\Decoder;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use Shrikeh\PagerDuty\Application\Provider\Decoder as DecoderServiceProvider;
use Shrikeh\PagerDuty\Decoder\Json\Webmozart;
use Webmozart\Json\JsonDecoder;

final class Json implements ServiceProviderInterface, DecoderServiceProvider
{
    const PROVIDER_DECODER_JSON = 'pagerduty.decoder.json';
    const PROVIDER_DECODER_JSON_WEBMOZART  = 'pagerduty.decoder.json.webmozart';

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
