<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\contactTraceUser;
class AddContact extends Notification
{
    use Queueable;
    public $contactTraceUser;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(contactTraceUser $contactTraceUser)
    {
        $this->contactTraceUser = $contactTraceUser;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [WhatsAppChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toWhatsApp($notifiable)
    {
        $orderUrl = url("/orders");
        $company = 'Acme';
        $deliveryDate = '12-12-12';


        return (new WhatsAppMessage)
            ->content("Your {$company} order  has shipped and should be delivered on {$deliveryDate}. Details: {$orderUrl}");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
