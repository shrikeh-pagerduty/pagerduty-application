<?php
namespace Shrikeh\PagerDuty\Application\Provider;

interface Http
{
    const PROVIDER_HTTP_SCHEME    = 'pagerduty.http.scheme';
    const PROVIDER_HTTP_DOMAIN    = 'pagerduty.http.domain';
    const PROVIDER_HTTP_PORT      = 'pagerduty.http.port';
    const PROVIDER_HTTP_BASE_URI  = 'pagerduty.http.base_uri';
    const PROVIDER_HTTP_TIMEOUT   = 'pagerduty.http.timeout';
    const PROVIDER_HTTP_HEADERS   = 'pagerduty.http.headers';
}
