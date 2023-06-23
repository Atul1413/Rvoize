@extends('layouts.user')
@section('head')
    <style>
        #permanentlyDeleteAccount .close-modal{
            top: 35px;
        }

        .progress {
            width: 150px;
            height: 150px;
            background: none;
            position: relative;
        }

        .progress::after {
            content: "";
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 6px solid #eee;
            position: absolute;
            top: 0;
            left: 0;
        }

        .progress>span {
            width: 50%;
            height: 100%;
            overflow: hidden;
            position: absolute;
            top: 0;
            z-index: 1;
        }

        .progress .progress-left {
            left: 0;
        }

        .progress .progress-bar {
            width: 100%;
            height: 100%;
            background: none;
            border-width: 6px;
            border-style: solid;
            position: absolute;
            top: 0;
        }

        .progress .progress-left .progress-bar {
            left: 100%;
            border-top-right-radius: 80px;
            border-bottom-right-radius: 80px;
            border-left: 0;
            -webkit-transform-origin: center left;
            transform-origin: center left;
        }

        .progress .progress-right {
            right: 0;
        }

        .progress .progress-right .progress-bar {
            left: -100%;
            border-top-left-radius: 80px;
            border-bottom-left-radius: 80px;
            border-right: 0;
            -webkit-transform-origin: center right;
            transform-origin: center right;
        }

        .progress .progress-value {
            position: absolute;
            top: 0;
            left: 0;
        }
    </style>
@endsection
@section('content')
    <div class="bravo_user_profile p-0">
        <div class="d-flex justify-content-between mb20">
            <div class="upper-title-box">
                <h3 class="title">{{__("My Profile")}}</h3>
                <div class="text">{{ __("Ready to jump back in?") }}</div>
            </div>
            <div class="title-actions">
                <a href="{{route('user.upgrade_company')}}" class="btn btn-warning text-light">{{__("Become a Company")}}</a>
                @if($url = $row->getDetailUrl())
                    <a href="{{$url}}" class="btn btn-info text-light ml-3"><i class="la la-eye"></i> {{__("View profile")}}</a>
                @endif
            </div>
        </div>
        @include('admin.message')

        <!-- Profile Progress Bar -->
        @if (count($percentage) > 0)
        <div class="row justify-content-center">
            @foreach ($percentage as $percentName => $percentValue)
                @if ($percentName === 'errors' && !empty($percentValue))
                    <div class="col-12">
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ __('Please fill the following below to complete the Profile progress') }}
                            <ul class="pl-2">
                                @foreach ($percentValue as $fillUpMessage)
                                    <li>{{ $fillUpMessage }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @continue;
                    </div>
                @endif
                <div class="col-xl-2 col-md-4 col-sm-6 mb-5">
                    <div class="bg-white rounded-lg p-4 shadow-sm">
                        <h2 class="h6 font-weight-bold text-center mb-4" style="height:30px;">{{ $percentName }}
                            Percentage
                        </h2>

                        <!-- Progress bar 3 -->
                        <div class="progress mx-auto" data-value='{{ $percentValue }}'>

                            <span class="progress-left">
                                <span class="progress-bar border-primary"></span>
                            </span>
                            <span class="progress-right">
                                <span class="progress-bar border-primary"></span>
                            </span>
                            <div
                                class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                <div class="h3 font-weight-bold">{{ $percentValue }} <span class="small">%</span>
                                </div>
                            </div>
                        </div>
                        <!-- END -->

                        {{-- <div class="row text-center mt-4">
                            <div class="col-6 border-right">
                                <div class="h4 font-weight-bold mb-0">28%</div><span class="small text-gray">Last
                                    week</span>
                            </div>
                            <div class="col-6">
                                <div class="h4 font-weight-bold mb-0">60%</div><span class="small text-gray">Last
                                    month</span>
                            </div>
                        </div>  --}}
                    </div>
                </div>
            @endforeach

        </div>
        @endif
        <!-- Profile Progress Bar End-->


        <form action="{{ route('user.candidate.store') }}" method="post" class="default-form">
            @csrf
            <div class="row">
                <div class="col-lg-9">
                    <div class="ls-widget mb-4">
                        <div class="tabs-box">
                            <div class="widget-title"><h4>{{ __("Candidate Info") }}</h4></div>
                            <div class="widget-content">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{__("First name")}} <span class="text-danger">*</span></label>
                                                <input type="text" value="{{old('first_name',$user->first_name)}}" name="first_name" placeholder="{{__("First name")}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{__("Last name")}} <span class="text-danger">*</span></label>
                                                <input type="text" required value="{{old('last_name',$user->last_name)}}" name="last_name" placeholder="{{__("Last name")}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{ __('Phone Number')}} <span class="text-danger">*</span></label>
                                                <input type="text" value="{{old('phone',@$row->phone)}}" placeholder="{{ __('Phone')}}" name="phone" class="form-control" required   >
                                            </div>
                                        </div>
                                        @if (empty($row->phone_verified_at))
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>{{__("Verify Phone")}} </label> 
                                                    <br/>
                                                    <button class="btn btn-primary bc-call-modal verifyNumber" type="button">Send Verify Status</button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                @include('Candidate::admin.candidate.form',['row'=>$user])
                            </div>
                        </div>
                    </div>
                    <div class="ls-widget mb-4">
                        <div class="tabs-box">
                            <div class="widget-title"><h4>{{ __("About") }}</h4></div>
                            <div class="widget-content">
                                <textarea name="bio" rows="5" class="form-control">{{ strip_tags(old('bio',$user->bio)) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="ls-widget mb-4">
                        <div class="tabs-box">
                            <div class="widget-title"><h4>{{ __("Location Info") }}</h4></div>
                            <div class="widget-content">
                                @include('Candidate::admin.candidate.location',['row'=>$user])
                            </div>
                        </div>
                    </div>
                    <div class="ls-widget mb-4 card-sub_information">
                        <div class="tabs-box">
                            <div class="widget-title"><strong>{{ __("Education - Experience - Award") }}</strong></div>
                            <div class="widget-content">
                                @include('Candidate::admin.candidate.sub_information',['row'=>$user])
                            </div>
                        </div>
                    </div>

                    @include('Core::frontend.seo-meta.seo-meta')

                    <div class="mb-4 d-none d-md-block">
                        <button class="theme-btn btn-style-one" type="submit"><i class="fa fa-save" style="padding-right: 5px"></i> {{__('Save Changes')}}</button>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="ls-widget mb-4 ">
                        <div class="tabs-box">
                            <div class="widget-title"><strong>{{ __('Avatar')}}</strong></div>
                            <div class="widget-content">
                                <div class="form-group">
                                    {!! \Modules\Media\Helpers\FileHelper::fieldUpload('avatar_id',old('avatar_id',$user->avatar_id)) !!}
                                </div>
                            </div>
                        </div>
                    </div>


                        <div class="ls-widget mb-4 ">
                            <div class="tabs-box">
                                <div class="widget-title"><strong>{{ __('Visibility')}}</strong></div>
                                <div class="widget-content">
                                    <div class="form-group">
                                        <select required class="custom-select" name="allow_search">
                                            <option @if(old('allow_search',@$row->allow_search) =='hide') selected @endif value="hide">{{ __('Hide')}}</option>
                                            <option @if(old('allow_search',@$row->allow_search) =='publish') selected @endif value="publish">{{ __('Publish')}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ls-widget mb-4">
                            <div class="tabs-box">
                                <div class="widget-title"><strong>{{__('Categories')}}</strong></div>
                                <div class="widget-content">
                                    <div class="form-group">
                                        <select id="categories" class="form-control" name="categories[]" multiple="multiple">
                                            <option value="">{{__("-- Please Select --")}}</option>
                                            <?php
                                            foreach ($categories as $oneCategories) {
                                                $selected = '';
                                                if (!empty($row->categories)){

                                                    foreach ($row->categories as $category){
                                                        if($oneCategories->id == $category->id){
                                                            $selected = 'selected';
                                                        }
                                                    }
                                                }
                                                $trans = $oneCategories->translateOrOrigin(app()->getLocale());
                                                printf("<option value='%s' %s>%s</option>", $oneCategories->id, $selected, $oneCategories->name);
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="ls-widget mb-4">
                            <div class="tabs-box">
                                <div class="widget-title"><strong>{{__("Skills")}}</strong></div>
                                <div class="widget-content">
                                    <div class="form-group">
                                        <div class="">
                                            <select id="skills" name="skills[]" class="form-control" multiple="multiple">
                                                <option value="">{{__("-- Please Select --")}}</option>
                                                <?php
                                                foreach ($skills as $oneSkill) {
                                                    $selected = '';
                                                    if (!empty($row->skills)){
                                                        foreach ($row->skills as $skill){
                                                            if($oneSkill->id == $skill->id){
                                                                $selected = 'selected';
                                                            }
                                                        }
                                                    }
                                                    $trans = $oneSkill->translateOrOrigin(app()->getLocale());
                                                    printf("<option value='%s' %s>%s</option>", $oneSkill->id, $selected, $trans->name);
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="ls-widget mb-4 card-social">
                            <div class="tabs-box">
                                <div class="widget-title"><strong>{{ __('Social Media')}}</strong></div>
                                <div class="widget-content">
                                    <?php $socialMediaData = !empty($row) ? $row->social_media : []; ?>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="social-skype"><i class="fab fa-skype"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="social_media[skype]" value="{{@$socialMediaData['skype']}}" placeholder="{{__('Skype')}}" aria-label="{{__('Skype')}}" aria-describedby="social-skype">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="social-facebook"><i class="fab fa-facebook"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="social_media[facebook]" value="{{@$socialMediaData['facebook']}}" placeholder="{{__('Facebook')}}" aria-label="{{__('Facebook')}}" aria-describedby="social-facebook">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="social-twitter"><i class="fab fa-twitter"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="social_media[twitter]" value="{{@$socialMediaData['twitter']}}" placeholder="{{__('Twitter')}}" aria-label="{{__('Twitter')}}" aria-describedby="social-twitter">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="social-instagram"><i class="fab fa-instagram"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="social_media[instagram]" value="{{@$socialMediaData['instagram']}}" placeholder="{{__('Instagram')}}" aria-label="{{__('Instagram')}}" aria-describedby="social-instagram">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="social-pinterest"><i class="fab fa-pinterest"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="social_media[pinterest]" value="{{@$socialMediaData['pinterest']}}" placeholder="{{__('Pinterest')}}" aria-label="{{__('Pinterest')}}" aria-describedby="social-pinterest">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="social-dribbble"><i class="fab fa-dribbble"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="social_media[dribbble]" value="{{@$socialMediaData['dribbble']}}" placeholder="{{__('Dribbble')}}" aria-label="{{__('Dribbble')}}" aria-describedby="social-dribbble">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="social-google"><i class="fab fa-google"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="social_media[google]" value="{{@$socialMediaData['google']}}" placeholder="{{__('Google')}}" aria-label="{{__('Google')}}" aria-describedby="social-google">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="social-google"><i class="fab fa-linkedin"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="social_media[linkedin]" value="{{@$socialMediaData['linkedin']}}" placeholder="{{__('Linkedin')}}" aria-label="{{__('Linkedin')}}" aria-describedby="social-linkedin">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="mb-4">
                        <button class="theme-btn btn-style-one" type="submit"><i class="fa fa-save" style="padding-right: 5px"></i> {{__('Save Changes')}}</button>
                    </div>
                </div>
            </div>
        </form>
        <hr>

    </div>
    @if(!empty(setting_item('user_enable_permanently_delete')) and !is_admin())
        <div class="row">
            <div class="col-lg-9">
                <div class="ls-widget">
                    <div class="widget-title">
                        <h4 class="text-danger">
                            {{__("Delete account")}}
                        </h4>
                    </div>
                    <div class="widget-content">
                        <div class="mb-4 mt-2">
                            {!! clean(setting_item_with_lang('user_permanently_delete_content','',__('Your account will be permanently deleted. Once you delete your account, there is no going back. Please be certain.'))) !!}
                        </div>
                        <a rel="modal:open" class="btn btn-danger" href="#permanentlyDeleteAccount">{{__('Delete your account')}}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal bravo-form" id="permanentlyDeleteAccount">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('Confirm permanently delete account')}}</h5>
                    </div>
                    <div class="modal-body ">
                        <div class="my-3">
                            {!! clean(setting_item_with_lang('user_permanently_delete_content_confirm')) !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#close-modal" rel="modal:close" class="btn btn-secondary">{{__('Close')}}</a>
                        <a href="{{route('user.permanently.delete')}}" class="btn btn-danger">{{__('Confirm')}}</a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Modal -->
    @if (empty(@$row->phone_verified_at))
        <div class="modal fade verifyNumber" id="verifyNumber" style="opacity: 1; display: inline-block;">
            <div id="login-modal">
                <div class="login-form default-form">
                    <div class="form-inner">
                        <div class="form-inner">
                            <h3>Verify Phone Number</h3>
                            <form class="form" id="bravo-form-verify-otp" method="post">
                                <div class="form-group">
                                    <input type="text" name="otp" placeholder="{{ __('Enter OTP') }}" required>
                                </div>
                                <div class="form-group">
                                    <button class="btn-sm btn-style-one" type="button">SEND OTP
                                        <span class="spinner-grow spinner-grow-sm icon-loading" role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </form>
            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- Modal End -->


@endsection
@section('footer')
    {!! App\Helpers\MapEngine::scripts() !!}
    <script type="text/javascript" src="{{ asset('libs/daterange/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('libs/daterange/daterangepicker.min.js') }}"></script>
    <script src="{{ asset('libs/select2/js/select2.min.js') }}" ></script>
    <script>
        $('.has-datepicker').daterangepicker({
            singleDatePicker: true,
            showCalendar: false,
            autoUpdateInput: false,
            sameDate: true,
            autoApply: true,
            disabledPast: true,
            enableLoading: true,
            showEventTooltip: true,
            classNotAvailable: ['disabled', 'off'],
            disableHightLight: true,
            locale: {
                format: 'YYYY/MM/DD'
            }
        }).on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('YYYY/MM/DD'));
        });

        $(document).on('click', '.bc-call-modal.verifyNumber', function(event) {
            event.preventDefault();
            this.blur();
            $("#verifyNumber").modal({
                fadeDuration: 300,
                fadeDelay: 0.15
            });
        })

        $(function() {

        $(".progress").each(function() {

            var value = $(this).attr('data-value');
            var left = $(this).find('.progress-left .progress-bar');
            var right = $(this).find('.progress-right .progress-bar');

            if (value > 0) {
                if (value <= 50) {
                    right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
                } else {
                    right.css('transform', 'rotate(180deg)')
                    left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
                }
            }

        })

        function percentageToDegrees(percentage) {

            return percentage / 100 * 360

        }
        });
    </script>
    <script>
        @if(is_candidate() || !empty($candidate_create))
        $(document).ready(function() {
            $('#categories').select2();
            $('#skills').select2();
            $('#languages').select2();
        });

        let mapLat = {{ $row->map_lat ?? setting_item('default_location_lat', "51.505") }};
        let mapLng = {{ $row->map_lng ?? setting_item('default_location_lng', "-0.09") }};
        let mapZoom = {{ $row->map_zoom ?? "8" }};

        jQuery(function ($) {
            new BravoMapEngine('map_content', {
                disableScripts: true,
                fitBounds: true,
                center: [mapLat, mapLng],
                zoom: mapZoom,
                ready: function (engineMap) {
                    engineMap.addMarker([mapLat, mapLng], {
                        icon_options: {}
                    });
                    engineMap.on('click', function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                    engineMap.on('zoom_changed', function (zoom) {
                        $("input[name=map_zoom]").attr("value", zoom);
                    });
                    engineMap.searchBox($('#customPlaceAddress'),function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                    engineMap.searchBox($('.bravo_searchbox'),function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                }
            });

        })
        @endif
    </script>
@endsection
