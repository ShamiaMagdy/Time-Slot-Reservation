<?php
namespace app\Services\UserFactory;

class UnRegisteredUser extends UserAbstract{
    public function getRole()
    {
        return 'UnRegisteredUser';
    }
}
?>
