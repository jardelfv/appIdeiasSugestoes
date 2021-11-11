<?php

namespace App\Notifications;

use App\Sugestao;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class notificaNovaSugestao extends Notification
{
    use Queueable;
    private $sugestao;
    private $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, Sugestao $sugestao)
    {
        $this->sugestao = $sugestao;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->error()
                    ->line('Nova Sugestão Cadastrada no Portal de ideias.')
                    ->subject('Nova Sugestão Cadastrada')
                    ->greeting('Olá, '. $this->user->name)
                    ->line('Código: '. $this->sugestao->id)
                    ->line('Título: '. $this->sugestao->titulo)
                    ->line('Descrição: '. $this->sugestao->descricao)
                    ->line('Data de criação: '. date('d/m/Y H:i', strtotime($this->sugestao->created_at)))
                    ->action('Ver sugetão', url('/Painel/sugestao/detalhes/'.$this->sugestao->id))
                    ->line('Boa sorte!');
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
