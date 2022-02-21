<?php

namespace Uelnur\SymfonyEntityAction\Common\EntityRemove;

use Uelnur\SymfonyEntityAction\ActionInterface;
use Uelnur\SymfonyEntityAction\ActionStatusInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\Service\Attribute\Required;

abstract class EntityRemoveAction implements ActionInterface {
    protected ?EntityManagerInterface $em = null;

    #[Required]
    public function setEntityManager(EntityManagerInterface $em): void {
        $this->em = $em;
    }

    public function createParams(): null|object|array {
        return new EntityRemoveParams();
    }

    public function createData(null|object|array $params): null|object|array {
        assert($params instanceof EntityRemoveParams);

        return new EntityRemoveData($params);
    }

    public function handle(object|array|null $data): ActionStatusInterface {
        assert($data instanceof EntityRemoveData);

        if ( !$data->confirmed ) {
            return new EntityRemoveNotConfirmedStatus();
        }

        $entity = $data->getParams()->getEntity();

        $this->em->remove($entity);
        $this->em->flush();

        return new EntityRemoveSuccessStatus($entity);
    }

}
