<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Shrikeh\PagerDuty\Application\Provider\Client\Guzzle;
use Shrikeh\PagerDuty\Application\Provider\Hydrator\Uri\Guzzle as GuzzleUri;
use Shrikeh\PagerDuty\Application\Provider\Http\Api;
use Shrikeh\PagerDuty\Application\Provider\Decoder\Json;
use Shrikeh\PagerDuty\Application\Provider\Auth\Http;
use Shrikeh\PagerDuty\Application\Provider\Repository\OnCalls\OnCalls;
use Shrikeh\PagerDuty\Application\Provider\Repository\Users\Users;
use Shrikeh\PagerDuty\Application\Provider\Hydrator\ContactMethod\Resource;
use Shrikeh\PagerDuty\Repository\Users\Users as UserRepository;

$container = new Pimple\Container();

$container->register(new Guzzle());
$container->register(new Json());
$container->register(new Http());
$container->register(new Api());
$container->register(new Resource());
$container->register(new OnCalls());
$container->register(new Users());
$container->register(new GuzzleUri());

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
