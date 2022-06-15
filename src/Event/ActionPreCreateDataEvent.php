<?php

namespace Uelnur\SymfonyEntityAction\Event;

use Uelnur\SymfonyEntityAction\ActionInterface;

class ActionPreCreateDataEvent {
    public const NAME = 'action.pre_create_data';

    public function __construct(
        public ActionInterface $action,
        public null|object|array $params = null,
    ) {}
}
