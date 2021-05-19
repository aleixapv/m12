<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailController extends Mailable
{
    use Queueable, SerializesModels;
    public $correu;
    public $informacio;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($correu,$informacio)
    {
        //
        $this->correu = $correu;
        $this->informacio = $informacio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $correu = $this->correu;
        $path =  $this->informacio->url_logo;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $this->view('mail',compact(['correu','base64']));
    }
}
