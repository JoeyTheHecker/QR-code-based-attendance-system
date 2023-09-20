<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class Qrcode extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private $data = [];
    private $status = [];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $status)
    {
        $this->data = $data;
        $this->status = $status;

        $this->afterCommit();
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address($this->data['from'], 'DOLE RO8'),
            subject: 'Approved: National PESO Congress Registration',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'QRcode',
            with: [
                'url' => $this->data['url']
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
