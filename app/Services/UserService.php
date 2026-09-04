<?php
namespace App\Services;
use App\Repositories\Interface\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserService{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function register(array $data){
        $data['password'] = Hash::make($data['password']);

        $user = $this->userRepo->create($data);

        $token = $user->createToken('auth')->plainTextToken;

        return[
            'user' => $user,
            'token' => $token        
        ];
    }

    public function login(array $data){
        $user = $this->userRepo->findEmail($data['email']);

        if(!$user || !Hash::check($data['email'], $user->password)){
            throw ValidationException::withMessages([
                'email' => ['Email tidak cocok dengan database kami']
            ]);
        }

        $token = $user->createToken('auth')->plainTextToken;

        return[
            'user' => $user,
            'token' => $token
        ];
    }
}