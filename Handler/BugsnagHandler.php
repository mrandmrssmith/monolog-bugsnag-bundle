<?php

namespace MrAndMrsSmith\MonologBugsnagBundle\Handler;

use Bugsnag\Client;
use Bugsnag\Report;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Level;
use Monolog\LogRecord;
use Psr\Log\LogLevel;

class BugsnagHandler extends AbstractProcessingHandler
{
    protected const SEVERITY_MAPPING = [
        LogLevel::DEBUG => 'info',
        LogLevel::INFO => 'info',
        LogLevel::NOTICE => 'info',
        LogLevel::WARNING => 'warning',
        LogLevel::ERROR => 'error',
        LogLevel::CRITICAL => 'error',
        LogLevel::ALERT => 'error',
        LogLevel::EMERGENCY => 'error'
    ];

    protected const DEFAULT_SEVERITY = LogLevel::ERROR;

    private Client $bugsnagClient;

    public function __construct(Client $bugsnagClient, int|string|Level $level = Level::Debug, bool $bubble = true)
    {
        $this->bugsnagClient = $bugsnagClient;

        parent::__construct($level, $bubble);
    }

    /**
     * Send error to Bugsnag
     */
    protected function write(LogRecord $record): void
    {
        $severity = self::getSeverity($record->level);

        $this->bugsnagClient->notifyError(
            $record->message,
            $record->formatted,
            static function (Report $report) use ($record, $severity) {
                $report->setSeverity($severity);
                if (isset($record['extra'])) {
                    $report->setMetaData($record['extra']);
                }
            }
        );
    }

    private static function getSeverity(Level $level): string
    {
        return self::SEVERITY_MAPPING[$level->toPsrLogLevel()] ?? self::SEVERITY_MAPPING[self::DEFAULT_SEVERITY];
    }
}
