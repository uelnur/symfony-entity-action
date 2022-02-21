<?php

namespace Uelnur\SymfonyEntityAction\Common\EntityRemove;

use Uelnur\SymfonyEntityAction\ActionStatusInterface;

class EntityRemoveNotConfirmedStatus implements ActionStatusInterface{

    public function isSuccess(): bool {
        return false;
    }
}
