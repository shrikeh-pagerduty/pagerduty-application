<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Shrikeh\PagerDuty\Pimple\Provider\Hydrator\Uri\Guzzle as GuzzleUri;

use Shrikeh\PagerDuty\Pimple\Provider\Http\Api;
use Shrikeh\PagerDuty\Pimple\Provider\Auth\Http;
use Shrikeh\PagerDuty\Pimple\Provider\Repository\OnCalls\OnCalls;
use Shrikeh\PagerDuty\Pimple\Provider\Hydrator\ContactMethod\Resource;
use Shrikeh\PagerDuty\Repository\Users\Users as UserRepository;
use Shrikeh\PagerDuty\Pimple\Provider\Repository\Users\Users;

$container = new Pimple\Container();

Shrikeh\PagerDuty\Pimple\Provider\Http\Api::registerWith($container);
Shrikeh\PagerDuty\Pimple\Provider\Client\Guzzle::registerWith($container);
Shrikeh\PagerDuty\Pimple\Provider\Decoder\Json::registerWith($container);
Shrikeh\PagerDuty\Pimple\Provider\Auth\Http::registerWith($container);
Shrikeh\PagerDuty\Pimple\Provider\Repository\Users\Users::registerWith($container);

Resource::registerWith($container);
OnCalls::registerWith($container);

GuzzleUri::registerWith($container);

$container[Api::PROVIDER_HTTP_DOMAIN] = getenv('API_HTTP_DOMAIN');
$container[Http::PROVIDER_AUTH_TOKEN] = getenv('API_AUTH_TOKEN');

$oncalls = $container[OnCalls::PROVIDER_REPOSITORY_ONCALLS]->users();

foreach ($oncalls->filteredByLevel(1) as $onCall) {
    $users = $container[Users::PROVIDER_REPOSITORY_USERS]->findById(
        $onCall->user()->id,
        array(
          UserRepository::CONTACT_METHODS,
          UserRepository::NOTIFICATION_RULES
        )
    );
    foreach ($users as $user) {
      foreach ($user->contactMethods()->filterByResource('Phone') as $method) {
          print get_class($method->resource()) . ":$method\n";
      }
    }

}
