<?php
namespace App\Repositories;
use App\Repositories\Interface\UserRepository;
use Illuminate\Cache\Events\CacheFlushing;
use App\Models\User;
use Override;

class UserRepoImplements implements UserRepository{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    #[Override]
    public function create(array $data)
    {
        return $this->user->create($data);
    }

    #[Override]
    public function findEmail(string $email): ?User
    {
        return $this->user->where('email', $email)->first();
    }
}