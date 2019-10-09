<?php
namespace App\Mail;
 
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
 
class RegVerificationMail extends Mailable {
 
    use Queueable, SerializesModels;
    
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
 
    //build the message.
    public function build()
    {
        return $this->view('emails.regConfirmation');
    }
}