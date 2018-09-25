<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $user_id
 * @property string $transaction_date
 * @property string $status_code
 * @property string $message
 * @property string $signature_key
 * @property string $payment_type
 * @property string $masked_card
 * @property float $gross_amount
 * @property string $channel_response_message
 * @property string $bank
 * @property string $approval_code
 * @property string $created_at
 * @property string $updated_at
 */
class PaymentData extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'payment_data';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'transaction_date', 'status_code', 'message', 'signature_key', 'payment_type', 'masked_card', 'gross_amount', 'channel_response_message', 'bank', 'approval_code', 'created_at', 'updated_at'];

}
