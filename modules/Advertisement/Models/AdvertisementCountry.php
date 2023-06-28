<?php
namespace Modules\Advertisement\Models;

use App\BaseModel;

class AdvertisementCountry extends BaseModel
{
    protected $table = 'bc_advertisement_country';
    protected $fillable = [
        'origin_id',
        'country',
    ];

    public function advertisement() {
        return $this->belongsTo(Advertisement::class,'origin_id','id');
    }

}
