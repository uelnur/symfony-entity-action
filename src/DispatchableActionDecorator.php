<?php

namespace Uelnur\SymfonyEntityAction;

use App\Component\Action\Event\ActionPostCreateDataEvent;
use App\Component\Action\Event\ActionPostCreateParamsEvent;
use App\Component\Action\Event\ActionPostHandleEvent;
use App\Component\Action\Event\ActionPreCreateDataEvent;
use App\Component\Action\Event\ActionPreCreateParamsEvent;
use App\Component\Action\Event\ActionPreHandleEvent;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Symfony\Contracts\Service\Attribute\Required;

class DispatchableActionDecorator implements ActionInterface {

    public function __construct(private ActionInterface $action) {}

    private ?EventDispatcherInterface $dispatcher;

    #[Required]
    public function setEventDispatcher(EventDispatcherInterface $dispatcher): void {
        $this->dispatcher = $dispatcher;
    }

    public function createParams(): null|array|object {
        $event = new ActionPreCreateParamsEvent($this);
        $this->dispatcher->dispatch($event, $event::NAME);

        $params = $this->action->createParams();

        $event = new ActionPostCreateParamsEvent($this, $params);
        $this->dispatcher->dispatch($event, $event::NAME);

        return $event->params;
    }

    public function createData(null|object|array $params): null|object|array {
        $event = new ActionPreCreateDataEvent($this, $params);
        $this->dispatcher->dispatch($event, $event::NAME);
        $data = $this->action->createData($event->params);

        $event = new ActionPostCreateDataEvent($this, $event->params, $data);
        $this->dispatcher->dispatch($event, $event::NAME);

        return $event->data;
    }

    public function handle(null|object|array $data): ActionStatusInterface {
        $event = new ActionPreHandleEvent($this, $data);
        $this->dispatcher->dispatch($event, $event::NAME);
        $status = $this->action->handle($event->data);

        $event = new ActionPostHandleEvent($this, $event->data, $status);
        $this->dispatcher->dispatch($event, $event::NAME);

        return $event->status;
    }

}
