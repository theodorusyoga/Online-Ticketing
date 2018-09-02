<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $usertypeid
 * @property string $fullname
 * @property string $phone
 * @property string $email
 * @property string $created_at
 * @property string $updated_at
 * @property UserType $userType
 */
class Donation extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['usertypeid', 'fullname', 'phone', 'email', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userType()
    {
        return $this->belongsTo('App\UserType', 'usertypeid');
    }
}
