<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOfferNotification extends Notification
{
    use Queueable;
    protected $offer;

    public function __construct($offer)
    {
        $this->offer = $offer;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'offer_id' => $this->offer->id,
            'title' => $this->offer->title,
            'company' => $this->offer->company->company_name,
        ];
    }
}
