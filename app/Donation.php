<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $bank
 * @property float $amount
 * @property string $transfer_date
 * @property string $file
 * @property string $other
 * @property string $created_at
 * @property string $updated_at
 */
class Donation extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'bank', 'amount', 'transfer_date', 'file', 'other', 'created_at', 'updated_at'];

}
