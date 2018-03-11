<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AncCreated extends Mailable
{
    use Queueable, SerializesModels;


    private $anc;
    private $user;


    public function __construct($anc, $user){
        $this->anc = $anc;
        $this->user = $user;
    }


    public function build(){
        return $this->from($this->user->email)->markdown('email.announcement.created')
                    ->subject('Wave - Announcement Created By ' . $this->user->name)
                    ->with([
                        'anc' => $this->anc,
                        'user'=> $this->user,
                    ]);
    }
}
