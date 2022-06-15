<?php

namespace Uelnur\SymfonyEntityAction\Event;

use Uelnur\SymfonyEntityAction\ActionInterface;

class ActionPreHandleEvent {
    public const NAME = 'action.pre_handle';

    public function __construct(
        public ActionInterface $action,
        public null|object|array $data = null,
    ) {}
}
