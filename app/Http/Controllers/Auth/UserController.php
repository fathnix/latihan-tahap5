<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(Request $request){
        $validator = $request->validate([
            'name' => 'required|string|max:55',
            'email' => 'required|email|string',
            'password' => 'required|string|min:6'
        ]);

        $result = $this->userService->register($validator);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil register',
            'user' => $result['user'],
            'token' => $result['token']

        ], 201);
    }

    public function login(Request $request){
        $validator = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $result = $this->userService->login($validator);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil login',
            'user' => $result['user'],
            'token' => $result['token']
        ], 200);
    }
}
