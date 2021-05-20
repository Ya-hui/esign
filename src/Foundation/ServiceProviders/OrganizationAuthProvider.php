<?php


namespace Achais\ESign\Foundation\ServiceProviders;


use Achais\ESign\Authentication\OrganizationAuth;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class OrganizationAuthProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        $pimple['organizationAuth'] = function ($pimple) {
            return new OrganizationAuth($pimple['access_token']);
        };
    }
}