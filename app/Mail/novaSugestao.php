<?php

namespace App\Mail;

use App\Sugestao;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class novaSugestao extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $sugestao;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Sugestao $sugestao)
    {
        $this->$user = $user;
        $this->$sugestao = $sugestao;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $this->subject('Nova sugestão cadastrada');
        Sugestao::create();
        dd($this->sugestao->id);
        return $this->view('mail.novaSugestao')->with(['user' => $this->user])->with(['sugestao' => $this->sugestao]);
    }
}
