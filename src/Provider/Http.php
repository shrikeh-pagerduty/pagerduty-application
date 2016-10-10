<?php
namespace Shrikeh\PagerDuty\Pimple\Provider;

interface Http
{
    const PROVIDER_HTTP_SCHEME    = 'http.scheme';
    const PROVIDER_HTTP_DOMAIN    = 'http.domain';
    const PROVIDER_HTTP_PORT      = 'http.port';
    const PROVIDER_HTTP_BASE_URI  = 'http.base_uri';
    const PROVIDER_HTTP_TIMEOUT   = 'http.timeout';
    const PROVIDER_HTTP_HEADERS   = 'http.headers';
}
