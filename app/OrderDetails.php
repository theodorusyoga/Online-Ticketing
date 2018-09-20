<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $user_id
 * @property string $registration_type
 * @property string $job_status
 * @property string $group_name
 * @property string $ticket_type
 * @property int $ticket_amount
 * @property boolean $transport_to_hotel
 * @property string $created_at
 * @property string $updated_at
 * @property PersonalDatum[] $personalDatas
 */
class OrderDetails extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'registration_type', 'job_status', 'group_name', 'ticket_type', 'ticket_amount', 'transport_to_hotel', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personalDatas()
    {
        return $this->hasMany('App\PersonalDatum', 'user_id', 'user_id');
    }
}
