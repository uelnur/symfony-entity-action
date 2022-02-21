<?php

namespace Uelnur\SymfonyEntityAction\Common\EntityChange;

use Uelnur\SymfonyEntityAction\ActionInterface;
use Uelnur\SymfonyEntityAction\ActionStatusInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\Service\Attribute\Required;

abstract class EntityChangeAction implements ActionInterface {
    protected ?EntityManagerInterface $em = null;

    #[Required]
    final public function setEntityManager(EntityManagerInterface $em): void {
        $this->em = $em;
    }

    public function createParams(): null|object|array {
        return new EntityChangeParams();
    }

    public function createData(null|object|array $params): null|object|array {
        assert($params instanceof EntityChangeParams);

        return new EntityChangeData($params);
    }

    final public function handle(object|array|null $data): ActionStatusInterface {
        assert($data instanceof EntityChangeData);

        if ( !$data->confirmed ) {
            return new EntityChangeNotConfirmedStatus();
        }

        $entity = $data->getParams()->getEntity();
        $status = $this->changeEntity($entity, $data);

        if ( $status ) {
            return $status;
        }

        $this->em->persist($entity);
        $this->em->flush();

        return new EntityChangeSuccessStatus($entity);
    }

    abstract protected function changeEntity(object $entity, EntityChangeData $data): ?ActionStatusInterface;
}
