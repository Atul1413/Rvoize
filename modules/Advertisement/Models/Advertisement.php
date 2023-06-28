<?php
namespace Modules\Advertisement\Models;

use App\BaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Company\Models\Company;
use Modules\Core\Models\SEO;
use Modules\Core\Models\Attributes;
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

    

}
