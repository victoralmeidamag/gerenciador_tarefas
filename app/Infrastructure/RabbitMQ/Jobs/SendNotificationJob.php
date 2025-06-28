<?php

namespace App\Infrastructure\RabbitMQ\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendNotificationJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public array $data) {}

    public function connection(): string 
    { 
        return 'rabbitmq'; 
    }
    public function queue(): string      
    { 
        return 'notifications'; 
    }

    public function handle(): void
    {
        \Log::info('Notificação enviada via RabbitMQ', $this->data);
    }
}
