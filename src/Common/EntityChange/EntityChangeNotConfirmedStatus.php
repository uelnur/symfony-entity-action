<?php

namespace Uelnur\SymfonyEntityAction\Common\EntityChange;

use Uelnur\SymfonyEntityAction\ActionStatusInterface;

class EntityChangeNotConfirmedStatus implements ActionStatusInterface{

    public function isSuccess(): bool {
        return false;
    }
}
