<?php


namespace Achais\ESign\Foundation\ServiceProviders;


use Achais\ESign\Authentication\PersonAuth;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class PersonAuthProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        $pimple['personAuth'] = function ($pimple) {
            return new PersonAuth($pimple['access_token']);
        };
    }
}