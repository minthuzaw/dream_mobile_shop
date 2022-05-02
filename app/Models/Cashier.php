<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Cashier
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $name
 * @property string $mobile_number
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Cashier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cashier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cashier query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cashier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cashier whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cashier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cashier whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cashier whereMobileNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cashier whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cashier wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cashier whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Cashier extends Model
{
    use HasFactory;
}
