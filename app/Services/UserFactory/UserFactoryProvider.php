<?php
namespace app\Services\UserFactory;

use Exception;

class UserFactoryProvider
{
    public static function createUser($user, $role)
    {
        switch ($role) {
            case 'Admin':
                return new Admin($user);
            case 'ServiceProvider':
                return new ServiceProvider($user);
            case 'RegularUser':
                return new RegularUser($user);
            case 'UnRegisteredUser':
                return new UnRegisteredUser($user);
            default:
                throw new Exception("Invalid user role.");
        }
    }
}
