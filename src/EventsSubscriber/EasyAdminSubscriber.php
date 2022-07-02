<?php

namespace App\EventsSubscriber;

use App\Entity\Etablissements;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;




class EasyAdminSubscriber implements EventSubscriberInterface
{
    private $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setEtablissementSlug'],
        ];
    }

    public function setEtablissementSlug(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Etablissements)) {
            return;
        }
        $slug = $this->slugger->slug($entity->getDesignation());
        $entity->setSlug($slug);
        dd($slug);
    }
}
