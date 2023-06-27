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

class Advertisement extends BaseModel
{
    use SoftDeletes;
    protected $table = 'bc_advertisements';
    protected $fillable = [
        'url',
        'image',
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

    protected $casts = [
        'position' => 'int',
        'is_approved' => 'bool',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function companies() {
        return $this->belongsTo(Company::class,'company_id','id');
    }

}
