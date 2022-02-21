<?php

namespace Uelnur\SymfonyEntityAction\Common\EntityCreate;

use Symfony\Component\Security\Core\User\UserInterface;

class EntityCreateParams {
    public ?UserInterface $user = null;
}
