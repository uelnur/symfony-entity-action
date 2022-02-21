<?php

namespace Uelnur\SymfonyEntityAction\Common\EntityEdit;

use Uelnur\SymfonyEntityAction\ActionStatusInterface;

class EntityEditSuccessStatus implements ActionStatusInterface {
    public function __construct(
        public object $entity,
        public ?object $oldEntity = null,
    ) {}

    public function isSuccess(): bool {
        return true;
    }
}
