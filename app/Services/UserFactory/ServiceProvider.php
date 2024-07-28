<?php
namespace app\Services\UserFactory;

class ServiceProvider extends UserAbstract{
    public function getRole()
    {
        return 'ServiceProvider';
    }
}
?>
