<?php

namespace App\Component\Action\Event;

use App\Component\Action\ActionInterface;

class ActionPreCreateParamsEvent {
    public const NAME = 'action.pre_create_params';

    public function __construct(
        public ActionInterface $action,
    ) {}
}
