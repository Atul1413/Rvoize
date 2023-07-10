<?php if(is_default_lang()): ?>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__("Map Provider")); ?></h3>
        <p class="form-group-desc"><?php echo e(__('Change map provider of your website')); ?></p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label><?php echo e(__("Map Provider")); ?></label>
                    <div class="form-controls">
                        <select name="map_provider" class="form-control" >
                            <option value="osm" <?php echo e(($settings['map_provider'] ?? '') == 'osm' ? 'selected' : ''); ?>><?php echo e(__("OpenStreetMap.org")); ?></option>
                            <option value="gmap" <?php echo e(($settings['map_provider'] ?? '') == 'gmap' ? 'selected' : ''); ?>><?php echo e(__('Google Map')); ?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group" data-condition="map_provider:is(gmap)">
                    <label><?php echo e(__("Gmap API Key")); ?></label>
                    <div class="form-controls">
                        <input type="text" name="map_gmap_key" value="<?php echo e($settings['map_gmap_key'] ?? ''); ?>" class="form-control">
                        <p><i><a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="blank"><?php echo e(__("Learn how to get an api key")); ?></a></i></p>
                    </div>
                </div>
                <div class="form-group">
                    <label><?php echo e(__("Default Location")); ?></label>
                    <div class="control-map-group">
                        <div id="map_content"></div>
                        <input type="text" placeholder="<?php echo e(__("Search by name...")); ?>" class="bravo_searchbox form-control" autocomplete="off" onkeydown="return event.key !== 'Enter';">
                        <div class="g-control">
                            <div class="form-group">
                                <label><?php echo e(__("Map Latitude")); ?>:</label>
                                <input type="text" name="default_location_lat" class="form-control" value="<?php echo e($settings['default_location_lat'] ?? '0'); ?>" onkeydown="return event.key !== 'Enter';">
                            </div>
                            <div class="form-group">
                                <label><?php echo e(__("Map Longitude")); ?>:</label>
                                <input type="text" name="default_location_lng" class="form-control" value="<?php echo e($settings['default_location_lng'] ?? '0'); ?>" onkeydown="return event.key !== 'Enter';">
                            </div>
                            <div class="form-group">
                                <label><?php echo e(__("Map Zoom")); ?>:</label>
                                <input type="text" name="map_zoom" class="form-control" value="12" readonly onkeydown="return event.key !== 'Enter';">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__("Social Login")); ?></h3>
        <p class="form-group-desc"><?php echo e(__('Change social login information for your website')); ?></p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-title"><strong><?php echo e(__('Facebook')); ?></strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <label> <input type="checkbox" <?php if($settings['facebook_enable'] ?? '' == 1): ?> checked <?php endif; ?> name="facebook_enable" value="1"> <?php echo e(__("Enable Facebook Login?")); ?></label>
                </div>
                <div class="form-group" data-condition="facebook_enable:is(1)">
                    <label><?php echo e(__("Facebook Client Id")); ?></label>
                    <div class="form-controls">
                        <input type="text" name="facebook_client_id" value="<?php echo e($settings['facebook_client_id'] ?? ''); ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group" data-condition="facebook_enable:is(1)">
                    <label><?php echo e(__("Facebook Client Secret")); ?></label>
                    <div class="form-controls">
                        <input type="text" name="facebook_client_secret" value="<?php echo e($settings['facebook_client_secret'] ?? ''); ?>" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-title"><strong><?php echo e(__('Google')); ?></strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <label><input type="checkbox" <?php if($settings['google_enable'] ?? '' == 1): ?> checked <?php endif; ?> name="google_enable" value="1"> <?php echo e(__("Enable Google Login?")); ?></label>
                </div>
                <div class="form-group" data-condition="google_enable:is(1)">
                    <label><?php echo e(__("Google Client Id")); ?></label>
                    <div class="form-controls">
                        <input type="text" name="google_client_id" value="<?php echo e($settings['google_client_id'] ?? ''); ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group" data-condition="google_enable:is(1)">
                    <label><?php echo e(__("Google Client Secret")); ?></label>
                    <div class="form-controls">
                        <input type="text" name="google_client_secret" value="<?php echo e($settings['google_client_secret'] ?? ''); ?>" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-title"><strong><?php echo e(__('Twitter')); ?></strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <label> <input type="checkbox" <?php if($settings['twitter_enable'] ?? '' == 1): ?> checked <?php endif; ?> name="twitter_enable" value="1"> <?php echo e(__("Enable Twitter Login?")); ?></label>
                </div>
                <div class="form-group" data-condition="twitter_enable:is(1)">
                    <label><?php echo e(__("Twitter Client Id")); ?></label>
                    <div class="form-controls">
                        <input type="text" name="twitter_client_id" value="<?php echo e($settings['twitter_client_id'] ?? ''); ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group" data-condition="twitter_enable:is(1)">
                    <label><?php echo e(__("Twitter Client Secret")); ?></label>
                    <div class="form-controls">
                        <input type="text" name="twitter_client_secret" value="<?php echo e($settings['twitter_client_secret'] ?? ''); ?>" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-title"><strong><?php echo e(__('LinkedIn')); ?></strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <label> <input type="checkbox" <?php if(setting_item('linkedin_enable') == 1): ?> checked <?php endif; ?> name="linkedin_enable" value="1"> <?php echo e(__("Enable LinkedIn Login?")); ?></label>
                </div>
                <div class="form-group" data-condition="linkedin_enable:is(1)">
                    <label><?php echo e(__("LinkedIn Client Id")); ?></label>
                    <div class="form-controls">
                        <input type="text" name="linkedin_client_id" value="<?php echo e(setting_item('linkedin_client_id')); ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group" data-condition="linkedin_enable:is(1)">
                    <label><?php echo e(__("LinkedIn Client Secret")); ?></label>
                    <div class="form-controls">
                        <input type="text" name="linkedin_client_secret" value="<?php echo e(setting_item('linkedin_client_secret')); ?>" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__("Captcha")); ?></h3>
        <p class="form-group-desc"><?php echo e(__('Change map provider of your website')); ?></p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-title"><strong><?php echo e(__("ReCaptcha Config")); ?></strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="form-controls">
                        <label ><input type="checkbox" <?php if($settings['recaptcha_enable'] ?? '' == 1): ?> checked <?php endif; ?> name="recaptcha_enable" value="1"> <?php echo e(__("Enable ReCaptcha")); ?></label>
                    </div>
                </div>
                <div class="form-group" data-condition="recaptcha_enable:is(1)">
                    <label><?php echo e(__("Api Key")); ?></label>
                    <div class="form-controls">
                        <input type="text" name="recaptcha_api_key" value="<?php echo e($settings['recaptcha_api_key'] ?? ''); ?>" class="form-control">
                        <p><i><a href="http://www.google.com/recaptcha/admin" target="blank"><?php echo e(__("Learn how to get an api key")); ?></a></i></p>
                    </div>
                </div>
                <div class="form-group" data-condition="recaptcha_enable:is(1)">
                    <label><?php echo e(__("Api Secret")); ?></label>
                    <div class="form-controls">
                        <input type="text" name="recaptcha_api_secret" value="<?php echo e($settings['recaptcha_api_secret'] ?? ''); ?>" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__("Custom Scripts for all languages")); ?></h3>
        <p class="form-group-desc"><?php echo e(__('Add custom HTML script before and after the content, like tracking code')); ?></p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-title"><strong><?php echo e(__("Custom Scripts")); ?></strong></div>
            <div class="panel-body">
                <div class="form-group" >
                    <label><?php echo e(__("Head Script")); ?></label>
                    <div class="form-controls">
                        <textarea name="head_scripts"  cols="30" rows="10" class="form-control"><?php echo e($settings['head_scripts'] ?? ''); ?></textarea>
                        <p><i><?php echo e(__('scripts before closing head tag')); ?></i></p>
                    </div>
                </div>
                <div class="form-group" >
                    <label><?php echo e(__("Body Script")); ?></label>
                    <div class="form-controls">
                        <textarea name="body_scripts"  cols="30" rows="10" class="form-control"><?php echo e($settings['body_scripts'] ?? ''); ?></textarea>
                        <p><i><?php echo e(__('scripts after open of body tag')); ?></i></p>
                    </div>
                </div>
                <div class="form-group" >
                    <label><?php echo e(__("Footer Script")); ?></label>
                    <div class="form-controls">
                        <textarea name="footer_scripts"  cols="30" rows="10" class="form-control"><?php echo e($settings['footer_scripts'] ?? ''); ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__("Custom Scripts for :name",['name'=>request()->query('lang')])); ?></h3>
        <p class="form-group-desc"><?php echo e(__('Add custom HTML script before and after the content, like tracking code')); ?></p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-title"><strong><?php echo e(__("Custom Scripts")); ?></strong></div>
            <div class="panel-body">
                <div class="form-group" >
                    <label><?php echo e(__("Head Script")); ?></label>
                    <div class="form-controls">
                        <textarea name="head_scripts"  cols="30" rows="10" class="form-control"><?php echo e(setting_item_with_lang_raw('head_scripts',request()->get('lang'))); ?></textarea>
                        <p><i><?php echo e(__('scripts before closing head tag')); ?></i></p>
                    </div>
                </div>
                <div class="form-group" >
                    <label><?php echo e(__("Body Script")); ?></label>
                    <div class="form-controls">
                        <textarea name="body_scripts"  cols="30" rows="10" class="form-control"><?php echo e(setting_item_with_lang_raw('body_scripts',request()->get('lang'))); ?></textarea>
                        <p><i><?php echo e(__('scripts after open of body tag')); ?></i></p>
                    </div>
                </div>
                <div class="form-group" >
                    <label><?php echo e(__("Footer Script")); ?></label>
                    <div class="form-controls">
                        <textarea name="footer_scripts"  cols="30" rows="10" class="form-control"><?php echo e(setting_item_with_lang_raw('footer_scripts',request()->get('lang'))); ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__("Cookie agreement")); ?></h3>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-title"><strong><?php echo e(__("Cookie agreement config")); ?></strong></div>
            <div class="panel-body">
                <?php if(is_default_lang()): ?>
                    <div class="form-group">
                        <div class="form-controls">
                            <label ><input type="checkbox" <?php if(setting_item('cookie_agreement_enable') ?? '' == 1): ?> checked <?php endif; ?> name="cookie_agreement_enable" value="1"> <?php echo e(__("Enable Cookie agreement")); ?></label>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="form-group">
                        <div class="form-controls">
                            <label ><input type="checkbox" <?php if(setting_item('cookie_agreement_enable') ?? '' == 1): ?> checked <?php endif; ?> name="cookie_agreement_enable" disabled value="1"> <?php echo e(__("Enable Cookie agreement")); ?></label>
                        </div>
                    </div>
                    <?php if(setting_item('cookie_agreement_enable') != 1): ?>
                        <p><?php echo e(__('You must enable on main lang.')); ?></p>
                    <?php endif; ?>
                <?php endif; ?>


                <div class="form-group" data-condition="cookie_agreement_enable:is(1)">
                    <label><?php echo e(__("Agree Text Button")); ?></label>
                    <div class="form-controls">
                        <input type="text" name="cookie_agreement_button_text" value="<?php echo e(setting_item_with_lang('cookie_agreement_button_text',request()->query('lang')) ?? ''); ?>" class="form-control">

                    </div>
                </div>
                <div class="form-group" data-condition="cookie_agreement_enable:is(1)">
                    <label><?php echo e(__("Content")); ?></label>
                    <div class="form-controls">
                        <textarea name="cookie_agreement_content" rows="8" class="form-control d-none has-ckeditor"><?php echo e(setting_item_with_lang('cookie_agreement_content',request()->query('lang')) ?? ''); ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('Core::admin.settings.groups.parts.pusher', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('script.body'); ?>
    <?php echo App\Helpers\MapEngine::scripts(); ?>

    <script>
        jQuery(function ($) {
            new BravoMapEngine('map_content', {
                disableScripts: true,
                fitBounds: true,
                center: [<?php echo e(!empty($settings['default_location_lat']) ? $settings['default_location_lat'] : "51.505"); ?>, <?php echo e(!empty($settings['default_location_lng']) ? $settings['default_location_lng'] : "-0.09"); ?>],
                zoom: 12,
                ready: function (engineMap) {
                    <?php if( !empty($settings['default_location_lat']) && !empty($settings['default_location_lng'])): ?>
                    engineMap.addMarker([<?php echo e($settings['default_location_lat']); ?>, <?php echo e($settings['default_location_lng']); ?>], {
                        icon_options: {}
                    });
                    <?php endif; ?>
                    engineMap.on('click', function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=default_location_lat]").attr("value", dataLatLng[0]);
                        $("input[name=default_location_lng]").attr("value", dataLatLng[1]);
                    });
                    engineMap.on('zoom_changed', function (zoom) {
                        $("input[name=map_zoom]").attr("value", zoom);
                    });
                    engineMap.searchBox($('#customPlaceAddress'),function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=default_location_lat]").attr("value", dataLatLng[0]);
                        $("input[name=default_location_lng]").attr("value", dataLatLng[1]);
                    });
                    engineMap.searchBox($('.bravo_searchbox'),function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=default_location_lat]").attr("value", dataLatLng[0]);
                        $("input[name=default_location_lng]").attr("value", dataLatLng[1]);
                    });
                }
            });

        })
    </script>
<?php $__env->stopSection(); ?>
<?php /**PATH /home/customer/www/rvoize.com/public_html/modules/Core/Views/admin/settings/groups/advance.blade.php ENDPATH**/ ?>