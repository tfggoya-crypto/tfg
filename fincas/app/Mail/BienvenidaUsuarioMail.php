<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BienvenidaUsuarioMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $passwordTemporal;

    public function __construct(User $user, $passwordTemporal)
    {
        $this->user = $user;
        $this->passwordTemporal = $passwordTemporal;
    }

    public function build()
    {
        return $this->subject('Bienvenido a FincasApp')
                    ->view('emails.bienvenida-usuario');
    }
}