<?php
namespace Modules\Advertisement\Models;

use App\BaseModel;
use Modules\Company\Models\Company;
use Modules\Media\Models\MediaFile;

class Advertisement extends BaseModel
{
    protected $table = 'bc_advertisements';
    protected $fillable = [
        'title',
        'url',
        'banner',
        'company_id',
        'start_date',
        'end_date',
        'position',
        'priority',
        'status',
        'is_approved',
        'create_user',
        'update_user',
    ];

    public const HEIGHT = 240;
    public const WIDTH = 1920;

    public const POSITION = [
        1 => 'Home Page',
        2 => 'Job Search Page',
    ];

    protected $casts = [
        'position' => 'int',
        'is_approved' => 'bool',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function getEditUrl()
    {
        return route('user.company.advertisement.edit.ads',['id'=>$this->id]);
    }
    

    public function companies() {
        return $this->belongsTo(Company::class,'company_id','id');
    }

    public function banner() {
        return $this->hasOne(MediaFile::class,'id','banner');
    }

    public function countries() {
        return $this->hasMany(AdvertisementCountry::class,'origin_id','id');
    }
    

}
