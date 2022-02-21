<?php

namespace App\Component\Action\Event;

use App\Component\Action\ActionInterface;

class ActionPreHandleEvent {
    public const NAME = 'action.pre_handle';

    public function __construct(
        public ActionInterface $action,
        public null|object|array $data = null,
    ) {}
}
