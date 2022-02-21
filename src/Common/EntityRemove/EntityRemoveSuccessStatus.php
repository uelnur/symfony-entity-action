<?php

namespace Uelnur\SymfonyEntityAction\Common\EntityRemove;

use Uelnur\SymfonyEntityAction\ActionStatusInterface;

class EntityRemoveSuccessStatus implements ActionStatusInterface {
    public function __construct(
        public object $entity,
        public ?object $oldEntity = null,
    ) {}

    public function isSuccess(): bool {
        return true;
    }
}
