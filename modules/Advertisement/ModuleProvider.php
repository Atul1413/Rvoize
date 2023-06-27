<?php
namespace Modules\Advertisement;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Modules\ModuleServiceProvider;


class ModuleProvider extends ModuleServiceProvider
{

    public function boot(){

        $this->publishes([
            __DIR__.'/Config/config.php' => config_path('advertisement.php'),
        ]);

    }
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/Config/config.php', 'advertisement'
        );

        $this->app->register(RouteServiceProvider::class);
    }

    public static function getAdminMenu()
    {
        $advertisement_menus = [
            'advertisement'=>[
                "position"=>26,
                'url'        => route('candidate.admin.index'),
                'title'      => __("Advertisement"),
                'icon'       => 'ion-md-paper',
                // 'permission' => 'candidate_manage_others',
            ]

        ];
    
        return $advertisement_menus;
    }

    public static function getTemplateBlocks(){
        return [
            'list_advertisements'=>"\\Modules\\Advertisement\\Blocks\\ListAdvertisements",
        ];
    }

    public static function getUserMenu()
    {
        $res = [];
        if(is_employer()) {

            $res['user_profile'] = [
                'url' => '#',
                'title' => __("Manage Ads"),
                'icon' => 'las la-ad',
                'enable' => true,
                'position'=>80,
                'children'=>[
                    'list'=>[
                        'url' => '#',
                        'title' => __("All Ads"),
                        // 'permission' => 'advertisement_manage',
                        'position' => 10
                    ],
                    'create' => [
                        'url' => '#',
                        'title' => __("Create a new Ad"),
                        // 'permission' => 'advertisement_manage',
                    ]
                ]
            ];
        }

        return $res;
    }
}
