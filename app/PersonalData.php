<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $user_id
 * @property string $identity_card
 * @property string $identity_card_photo
 * @property string $fullname
 * @property string $email
 * @property string $phone_number
 * @property string $domicile
 * @property string $domicile_city
 * @property int $age
 * @property string $booking_code
 * @property float $total_price
 * @property string $created_at
 * @property string $updated_at
 * @property OrderDetail $orderDetail
 */
class PersonalData extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'personal_data';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'identity_card', 'identity_card_photo', 'fullname', 'email', 'phone_number', 'domicile', 'domicile_city', 'age', 'booking_code', 'total_price', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderDetail()
    {
        return $this->belongsTo('App\OrderDetail', 'user_id', 'user_id');
    }
}
