<?php

namespace Uelnur\SymfonyEntityAction;

use Psr\Log\LoggerInterface;
use Symfony\Contracts\Service\Attribute\Required;

class LoggableActionDecorator implements ActionInterface {

    public function __construct(private ActionInterface $action) {}

    private ?LoggerInterface $logger;

    #[Required]
    public function setLogger(LoggerInterface $logger): void {
        $this->logger = $logger;
    }

    public function createParams(): null|array|object {
        $this->logger->info('');
        $params = $this->action->createParams();
        $this->logger->info('');

        return $params;
    }

    public function createData(null|object|array $params): null|object|array {
        $this->logger->info('');
        $data = $this->action->createData($params);
        $this->logger->info('');

        return $data;
    }

    public function handle(null|object|array $data): ActionStatusInterface {
        $this->logger->info('');
        $status = $this->action->handle($data);
        $this->logger->info('');

        return $status;
    }

}
