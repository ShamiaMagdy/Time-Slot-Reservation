<?php
namespace app\Services\UserFactory;

use App\Models\User;

abstract class UserAbstract{
    private User $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    abstract function getRole();

}
?>
