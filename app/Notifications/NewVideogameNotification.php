<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushMessage;

class NewVideogameNotification extends Notification
{
    protected $videogame;

    public function __construct($videogame)
    {
        $this->videogame = $videogame;
    }

    public function via($notifiable)
    {
        return ['webpush'];
    }

    public function toWebPush($notifiable, $notification)
    {
        return (new WebPushMessage)
            ->title('Nuevo Videojuego Agregado')
            ->body("Se agregó un nuevo videojuego: {$this->videogame->name}");
    }
}
