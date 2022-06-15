<?php

namespace Uelnur\SymfonyEntityAction\Event;

use Uelnur\SymfonyEntityAction\ActionInterface;
use Uelnur\SymfonyEntityAction\ActionStatusInterface;

class ActionPostHandleEvent {
    public const NAME = 'action.post_handle';

    public function __construct(
        public ActionInterface $action,
        public null|object|array $data = null,
        public ?ActionStatusInterface $status = null
    ) {}
}
