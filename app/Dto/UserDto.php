<?php
namespace App\Dto;

use App\Http\Requests\RegisterationRequest;
use Illuminate\Support\Facades\Hash;

class UserDto
{
    private string $firstname;
    private string $lastname;
    private string $username;
    private string $email;
    private string $password;
    private string $phone;
    private string $address;
    private string $role;
    public function __construct($firstname, $lastname, $username, $email, $password, $phone, $address, $role)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
        $this->address = $address;
        $this->role = $role;
    }

    public static function createUserDto(RegisterationRequest $request)
    {
        return new self(
            firstname: $request->firstname,
            lastname: $request->lastname,
            username: $request->username,
            email: $request->email,
            password: $request->password,
            phone: $request->phone,
            address: $request->address,
            role: $request->role,);
    }

    public function toArray()
    {
        return [
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'phone' => $this->phone,
            'address' => $this->address,
        ];
    }
    
    public function getRole()
    {
        return $this->role;
    }
}
