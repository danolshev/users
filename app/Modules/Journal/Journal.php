<?php

declare(strict_types=1);

namespace App\Modules\Journal;

use App\Modules\Journal\Handlers\HandlerInterface;
use Psr\Log\LoggerInterface;
use Throwable;

/**
 * Это первая вариация - по сути монолог
 */
final class Journal implements JournalInterface
{
    /**
     * @var HandlerInterface[]
     */
    private array $handlers = [];

    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger, array $handlers = [])
    {
        $this->handlers = $handlers;
        $this->logger = $logger;
    }

    /**
     * @param  HandlerInterface[]  $handlers
     * @return void
     */
    public function setHandlers(array $handlers): void
    {
        $this->handlers = $handlers;
    }

    public function addEvent(string $eventMessage, array $eventPayload = []): bool
    {
        $record = new EventRecord($eventMessage, $eventPayload);
        foreach ($this->handlers as $handler) {
            try {
                if (true === $handler->handle($record)) {
                    break;
                }
            } catch (Throwable $e) {
                $this->logger->warning($e, $record->getEventPayload());

                return true;
            }
        }

        return true;
    }
}
