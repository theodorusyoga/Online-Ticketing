<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\OrderDetails;
use App\PersonalData;
use App\PaymentData;

class PaymentSuccess extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(OrderDetails $order, PersonalData $personal,
        PaymentData $payment)
    {
        $this->order = $order;
        $this->personal = $personal;
        $this->payment = $payment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.success')
        ->subject('Pembayaran Berhasil: '. $this->order->user_id)
        ->with([
            'order' => $this->order,
            'personal' => $this->personal,
            'payment' => $this->payment
        ]);
    }
}
