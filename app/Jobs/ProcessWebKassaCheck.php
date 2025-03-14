<?php

namespace App\Jobs;

use App\Services\WebKassaService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessWebKassaCheck implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected array $positions;
    protected float $totalSum;
    protected int $operationType;
    protected ?string $customerXin;
    protected ?string $customerPhone;
    protected ?string $customerEmail;

    public function __construct($positions, $totalSum, $operationType, $customerXin = null, $customerPhone = null, $customerEmail = null)
    {
        $this->positions = $positions;
        $this->totalSum = $totalSum;
        $this->operationType = $operationType;
        $this->customerXin = $customerXin;
        $this->customerPhone = $customerPhone;
        $this->customerEmail = $customerEmail;
    }

    public function handle(WebKassaService $webKassaService)
    {
        $webKassaService->createCheck($this->positions, $this->totalSum, $this->operationType, $this->customerXin, $this->customerPhone, $this->customerEmail);
    }
}
