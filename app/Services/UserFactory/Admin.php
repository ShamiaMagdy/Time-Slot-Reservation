<?php
namespace app\Services\UserFactory;

class Admin extends UserAbstract{
    public function getRole()
    {
        return "Admin";
    }
}
?>
