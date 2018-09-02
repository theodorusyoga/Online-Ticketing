<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $type
 * @property string $created_at
 * @property string $updated_at
 * @property Donation[] $donations
 */
class UserType extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['type', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function donations()
    {
        return $this->hasMany('App\Donation', 'usertypeid');
    }
}
