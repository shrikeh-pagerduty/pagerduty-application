<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Shrikeh\PagerDuty\Pimple\Provider\Repository\OnCalls;
use Shrikeh\PagerDuty\Pimple\Provider\Repository\Users;
use Shrikeh\PagerDuty\Repository\Users as UsersRepository;

$container = Shrikeh\PagerDuty\Pimple\Application::container(
    getenv('API_AUTH_TOKEN'),
    getenv('API_HTTP_DOMAIN')
);

$oncalls = $container[OnCalls::PROVIDER_REPOSITORY_ONCALLS]->users();

foreach ($oncalls->filteredByLevel(1) as $onCall) {
    $users = $container[Users::PROVIDER_REPOSITORY_USERS]->findById(
        $onCall->user()->id,
        array(
          UsersRepository::CONTACT_METHODS,
          UsersRepository::NOTIFICATION_RULES
        )
    );
    foreach ($users as $user) {
      foreach ($user->contactMethods()->filterByResource('Phone') as $method) {
          print get_class($method->resource()) . ":$method\n";
      }
    }

}
