<?php

namespace Uelnur\SymfonyEntityAction\Common\EntityChange;

use Uelnur\SymfonyEntityAction\ActionStatusInterface;

class EntityChangeSuccessStatus implements ActionStatusInterface {
    public function __construct(
        public object $entity,
        public ?object $oldEntity = null,
    ) {}

    public function isSuccess(): bool {
        return true;
    }
}
