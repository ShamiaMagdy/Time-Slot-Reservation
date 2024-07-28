<?php
namespace app\Services\UserFactory;

class RegularUser extends UserAbstract{
    public function getRole()
    {
        return 'RegularUser';
    }
}
?>
