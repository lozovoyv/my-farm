<?php

namespace Tests\Unit\Parser;

class Parser extends \App\Classes\OriginalLogParser
{
    protected string $filename;

    public function __construct(string $filename, int $buckets = 128)
    {
        $this->buckets = $buckets;
        $this->filename = $filename;
    }

    public function testPhase1(string $log): array
    {
        $this->parsePhase1($log);

        return $this->getMetrics();
    }

    public function testPhase2(string $log): array
    {
        $this->parsePhase2($log);

        return $this->getMetrics();
    }

    public function testPhase3(string $log): array
    {
        $this->parsePhase3($log);

        return $this->getMetrics();
    }

    public function testPhase4(string $log): array
    {
        $this->parsePhase4($log);

        return $this->getMetrics();
    }

    public function testPhase5(string $log): array
    {
        $this->parsePhase5($log);

        return $this->getMetrics();
    }

    public function parse(string $rawLog): void
    {
        parent::parse($rawLog); // TODO: Change the autogenerated stub
    }

    public function getMetrics(): array
    {
        $progress = $this->getProgress();

        return [
            $progress['phase'],
            $progress['step'],
            $this->currentSubStep,
            $this->currentBucket,
        ];
    }

    public function testPercents(): int
    {
        $progress = $this->getProgress();
        return $progress['%'];
    }
}