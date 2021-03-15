<?php


namespace App\Entity;


use League\OAuth2\Server\Entities\UserEntityInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Uid\Uuid;

/**
 * @ORM\Entity("users")
 */
class User implements UserEntityInterface, UserInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidV4Generator::class)
     */
    private string $id;

    /**
     * @ORM\Column(unique=true)
     */
    private string $email;

    /**
     * @ORM\Column()
     */
    private string $password;

    public function __construct(string $email)
    {
        $this->id = Uuid::v4();
        $this->email = $email;
    }

    public function getIdentifier()
    {
        return $this->id;
    }

    public function getRoles()
    {
        return [];
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword(string $value): void
    {
        $this->password = $value;
    }

    public function getSalt()
    {
        return null;
    }

    public function getUsername()
    {
        return $this->email;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
