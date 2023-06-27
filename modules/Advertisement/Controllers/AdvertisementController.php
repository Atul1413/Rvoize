<?php
namespace Modules\Advertisement\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Matrix\Exception;
use Modules\Advertisement\Models\Advertisement;
use Modules\FrontendController;


class AdvertisementController extends FrontendController
{


    /**
     * @var Advertisement
     */
    private $advertisement;

    public function __construct(Advertisement $advertisement)
    {
        parent::__construct();
        $this->advertisement = $advertisement;
    }

  
}
