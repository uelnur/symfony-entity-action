<?php

namespace Uelnur\SymfonyEntityAction\Event;

use Uelnur\SymfonyEntityAction\ActionInterface;

class ActionPreCreateParamsEvent {
    public const NAME = 'action.pre_create_params';

    public function __construct(
        public ActionInterface $action,
    ) {}
}
