<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable {
	use Queueable, SerializesModels;

	public $name, $email, $phone, $messageBody;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($name, $email, $phone, $messageBody)
	{
		$this->name = $name;
		$this->email = $email;
		$this->phone = $phone;
		$this->messageBody = $messageBody;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this->from('info@pamelasonthehudson.com')
			->view('emails.contact')
			->subject('New message - Website Contact Form');
	}
}
