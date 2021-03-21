<?php


namespace App\Subscriber;


use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Trikoder\Bundle\OAuth2Bundle\Event\UserResolveEvent;

class OAuthEventSubscriber implements EventSubscriberInterface
{

    /**
     * OAuthEventSubscriber constructor.
     */
    public function __construct(
        private UserProviderInterface $userProvider,
        private UserPasswordEncoderInterface $passwordEncoder
    ) {
    }

    public static function getSubscribedEvents()
    {
        return [
            'trikoder.oauth2.user_resolve' => ['onUserResolve']
        ];
    }

    public function onUserResolve(UserResolveEvent $event)
    {
        $user = $this->userProvider->loadUserByUsername($event->getUsername());

        if (null === $user) {
            return;
        }

        if ($this->passwordEncoder->isPasswordValid($user, $event->getPassword())) {
            $event->setUser($user);
        }
    }
}
