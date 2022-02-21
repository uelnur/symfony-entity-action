<?php

namespace Uelnur\SymfonyEntityAction\Common\EntityEdit;

use Symfony\Component\Security\Core\User\UserInterface;

class EntityEditParams {
    private ?object $entity = null;
    private ?object $oldEntity = null;
    public ?UserInterface $user = null;

    public function getEntity(): ?object {
        return $this->entity;
    }

    public function setEntity(object $entity): void {
        $this->entity = $entity;
        $this->oldEntity = clone $entity;
    }

    public function getOldEntity(): ?object {
        return $this->oldEntity;
    }
}
