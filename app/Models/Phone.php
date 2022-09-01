<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Phone
 *
 * @property int $id
 * @property string|null $model
 * @property string $name
 * @property int $stock
 * @property int $brand_id
 * @property float $unit_price
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Phone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Phone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Phone query()
 * @method static \Illuminate\Database\Eloquent\Builder|Phone whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phone whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phone whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phone whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phone whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phone whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phone whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phone whereUserId($value)
 * @mixin \Eloquent
 */
class Phone extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $filter)
    {
        $query->when($filter['search'] ?? false, function ($query, $search) {
            $query->where('name', 'LIKE', '%'.$search.'%')
                  ->orWhere('model', 'LIKE', '%'.$search.'%');
        });

        $query->when($filter['brand'] ?? false, function ($query, $brand) {
            $query->whereHas('brand', function ($query) use ($brand) {
                $query->where('name', $brand);
            });
        });
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
