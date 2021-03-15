<?php


namespace App\Services;


use App\Entity\User;
use App\Repository\UserRepository;
use App\Request\UserCreateData;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserService implements UserServiceInterface
{
    public function __construct(
        private UserRepository $repository,
        private UserPasswordEncoderInterface $encoder
    ) {
    }

    public function create(UserCreateData $data): User
    {
        $user = new User($data->email);
        $encodedPassword = $this->encoder->encodePassword($user, $data->password);
        $user->setPassword($encodedPassword);

        $this->repository->save($user);
        return $user;
    }
}
