<?php
# src/EventSubscriber/EasyAdminSubscriber.php
namespace App\EventSubscriber;

use App\Entity\Makeup;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use DateTime;
use Symfony\Component\Security\Core\Security;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    private $slugger;
    private $security;

    public function __construct(SluggerInterface $slugger,Security $security )
    {
        $this->slugger = $slugger;
        $this->security = $security;
    }

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setMakeupSlugAndDate'],
        ];
    }

    public function setMakeupSlugAndDate(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Makeup)) {
            return;
        }

        $slug = $this->slugger->slug($entity->getTitle());
        $entity->setSlug($slug);

        $now = new DateTime ('now');
        $entity->setDatemakeup($now);


        $user = $this->security->getUser();
        $entity->setUsers($user); 


    }
}