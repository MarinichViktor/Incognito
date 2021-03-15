<?php


namespace App\Repository;


use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

class UserRepository extends EntityRepository
{
    public function __construct(private EntityManagerInterface $em)
    {
        parent::__construct($em, new ClassMetadata(User::class));
    }

    public function save(User $user): void
    {
        $this->em->persist($user);
        $this->em->flush();
    }
}
