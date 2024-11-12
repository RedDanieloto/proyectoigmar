<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;

class ActivationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @param \App\Models\User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $activationUrl = url('/api/register/' . $this->user->activation_token);

        return $this->subject('Activa tu cuenta')
                    ->view('emails.activation')
                    ->with([
                        'name' => $this->user->name,
                        'activationUrl' => $activationUrl,
                    ]);
    }
}
