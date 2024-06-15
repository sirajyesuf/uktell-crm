<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class StaffCreated extends Mailable
{
    use Queueable, SerializesModels;


    private $superAdmin;
    public $staff;
    public $temporaryPassword;

 
    public function __construct($superAdmin,$staff,$temporaryPassword)
    {
        $this->superAdmin = $superAdmin;
        $this->staff = $staff;
        $this->temporaryPassword = $temporaryPassword;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address($this->superAdmin->email, $this->superAdmin->name),
            subject: 'Your Login Credentials For UKTELL CRM',
        );
    }

  
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.staff-created',
            with : [
                'name' => $this->staff->name,
                'email' => $this->staff->email,
                'password' => $this->temporaryPassword
            ]
        );
    }
}
