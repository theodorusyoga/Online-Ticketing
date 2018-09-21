<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $user_id
 * @property string $request_date
 * @property string $expired_date
 * @property float $ticket_price
 * @property string $booking_code
 * @property float $total_price
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
    protected $fillable = ['user_id', 'request_date', 'expired_date', 'ticket_price', 'booking_code', 'total_price', 'created_at', 'updated_at'];

}
