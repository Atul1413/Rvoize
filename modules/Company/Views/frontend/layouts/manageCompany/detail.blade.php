@extends('layouts.user')

@section('head')
    <style>
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
    @php
        $languages = \Modules\Language\Models\Language::getActive();
    @endphp
    <div class="bravo_user_profile">
        <form method="post" action="{{ route('user.company.update') }}" class="default-form">
            @csrf
            <div class="upper-title-box">
    <h3>{{ __('Edit: ') . $row->name }}</h3>
    <div class="text">
        @if ($row->slug)
            <p class="item-url-demo">
                {{ __('Permalink') }}:
                <span id="permalink">
                    {{ url(config('companies.companies_route_prefix')) }}/<a href="#" class="open-edit-input" data-name="slug">{{ trim($row->slug) }}</a>
                </span>
                <i class="fas fa-copy copy-icon" onclick="copyPermalink()"></i>
            </p>
        @endif
    </div>
</div>


<script>
    function copyPermalink() {
        const permalink = document.getElementById('permalink');
        const permalinkText = permalink.innerText;

        // Create a temporary input element
        const tempInput = document.createElement('input');
        tempInput.setAttribute('value', permalinkText);
        document.body.appendChild(tempInput);

        // Select the text in the input element
        tempInput.select();
        tempInput.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text to the clipboard
        document.execCommand('copy');

        // Remove the temporary input element
        document.body.removeChild(tempInput);
    }
</script>

            <!-- Notify -->
            @if (count($percentage) > 0)
                @foreach ($percentage as $percentName => $percentValue)
                    @if ($percentName === 'errors' && !empty($percentValue))
                    <div class="row justify-content-center">
                        <div class="col-12 mb-3">
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ __('Need to complete Company profile before posting a job') }}</strong>
                            </div>
                        </div>
                        </div>
                        @continue;
                    @endif
                @endforeach
            @endif
            <!-- Notify End-->

            @include('admin.message')

            @if ($row->id)
                @include('Language::admin.navigation')
            @endif

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
                            </div>
                            @continue;
                        @endif
                        <div class="col-xl-3 col-md-4 col-sm-6 mb-5">
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

            <div class="row">
                <div class="col-lg-9 col-12">
                    <!-- Ls widget -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>{{ __('Basic Information') }}</h4>
                            </div>
                            <div class="widget-content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('Company name') }} <span class="text-danger">*</span></label>
                                            <input type="text" required value="{{ old('name', $translation->name) }}"
                                                name="name" placeholder="{{ __('Company name') }}" class="form-control">
                                        </div>
                                    </div>
                                    @if (is_default_lang())
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{ __('E-mail') }} <span class="text-danger">*</span></label>
                                                <input type="email" required value="{{ old('email', $row->email) }}"
                                                    placeholder="{{ __('Email') }}" name="email" class="form-control">
                                            </div>
                                        </div>
                                    @endif

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('Contact Number [Enter country Code eg +91] ') }} <span class="text-danger">*</span></label>
                                            <input type="text" value="{{ old('phone', $row->getAuthor?->phone) }}"
                                                placeholder="{{ __('Contact Number') }}" name="phone"
                                                class="form-control" required>
                                        </div>
                                    </div>

                                    @if (empty($row->getAuthor?->phone_verified_at) && !empty($row->getAuthor?->phone))
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{ __('Verify Contact Number') }} </label>
                                                <br />
                                                <button class="btn btn-primary bc-call-modal mt-1 verifyNumber"
                                                    type="button">Send Verify Status</button>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('Website') }}</label>
                                            <input type="text" value="{{ old('website', $row->website) }}" name="website"
                                                placeholder="{{ __('Website') }}" class="form-control">
                                        </div>
                                    </div>
                                    @if (is_default_lang())
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{ __('Est. Since') }}</label>
                                                <input type="text"
                                                    value="{{ old('founded_in', $row->founded_in ? date('Y/m/d', strtotime($row->founded_in)) : '') }}"
                                                    placeholder="{{ __('Est. Since') }}" name="founded_in"
                                                    class="form-control has-datepicker input-group date">
                                            </div>
                                        </div>
                                    @endif
                                   
                                    @if (is_default_lang())
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input @if ($row->allow_search) checked @endif type="checkbox"
                                                    name="allow_search" value="1" class="form-control">
                                                <label>{{ __('Allow In Search & Listing') }}</label>
                                            </div>
                                        </div>
                                    @endif
                                   
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>{{ __('Location Information') }}</h4>
                            </div>
                            <div class="widget-content">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('Address') }}</label>
                                            <input type="text" value="{{ old('address', $row->address) }}"
                                                placeholder="{{ __('Address') }}" name="address" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('City') }}</label>
                                            <input type="text" value="{{ old('city', $row->city) }}" name="city"
                                                placeholder="{{ __('City') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('State') }}</label>
                                            <input type="text" value="{{ old('state', $row->state) }}" name="state"
                                                placeholder="{{ __('State') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="">{{ __('Country') }}</label>
                                            <select name="country" class="form-control" id="country-sms-testing">
                                                <option value="">{{ __('-- Select --') }}</option>
                                                @foreach (get_country_lists() as $id => $name)
                                                    <option @if ($row->country == $id) selected @endif
                                                        value="{{ $id }}">{{ $name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('Zip Code') }}</label>
                                            <input type="text" value="{{ old('zip_code', $row->zip_code) }}"
                                                name="zip_code" placeholder="{{ __('Zip Code') }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label">{{ __('Location') }}</label>
                                    @if (!empty($is_smart_search))
                                        <div class="form-group-smart-search">
                                            <div class="form-content">
                                                <?php
                                                $location_name = '';
                                                $list_json = [];
                                                $traverse = function ($locations, $prefix = '') use (&$traverse, &$list_json, &$location_name, $row) {
                                                    foreach ($locations as $location) {
                                                        $translate = $location->translateOrOrigin(app()->getLocale());
                                                        if ($row->location_id == $location->id) {
                                                            $location_name = $translate->name;
                                                        }
                                                        $list_json[] = [
                                                            'id' => $location->id,
                                                            'title' => $prefix . ' ' . $translate->name,
                                                        ];
                                                        $traverse($location->children, $prefix . '-');
                                                    }
                                                };
                                                $traverse($company_location);
                                                ?>
                                                <div class="smart-search">
                                                    <input type="text"
                                                        class="smart-search-location parent_text form-control"
                                                        placeholder="{{ __('-- Please Select --') }}"
                                                        value="{{ $location_name }}"
                                                        data-onLoad="{{ __('Loading...') }}"
                                                        data-default="{{ json_encode($list_json) }}">
                                                    <input type="hidden" class="child_id" name="location_id"
                                                        value="{{ $row->location_id ?? Request::query('location_id') }}">
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="">
                                            <select name="location_id" class="form-control">
                                                <option value="">{{ __('-- Please Select --') }}</option>
                                                <?php
                                                $traverse = function ($locations, $prefix = '') use (&$traverse, $row) {
                                                    foreach ($locations as $location) {
                                                        $selected = '';
                                                        if ($row->location_id == $location->id) {
                                                            $selected = 'selected';
                                                        }
                                                        printf("<option value='%s' %s>%s</option>", $location->id, $selected, $prefix . ' ' . $location->name);
                                                        $traverse($location->children, $prefix . '-');
                                                    }
                                                };
                                                $traverse($company_location);
                                                ?>
                                            </select>
                                        </div>
                                    @endif
                                </div>

                                {{--<div class="form-group">
                                    <label class="control-label">{{ __('The geographic coordinate') }}</label>
                                    <div class="control-map-group">
                                        <div id="map_content"></div>
                                        <input type="text" placeholder="{{ __('Search by name...') }}"
                                            class="bravo_searchbox form-control" autocomplete="off"
                                            onkeydown="return event.key !== 'Enter';">
                                        <div class="g-control">
                                            <div class="form-group">
                                                <label>{{ __('Map Latitude') }}:</label>
                                                <input type="text" name="map_lat" class="form-control"
                                                    value="{{ $row->map_lat }}"
                                                    onkeydown="return event.key !== 'Enter';">
                                            </div>
                                            <div class="form-group">
                                                <label>{{ __('Map Longitude') }}:</label>
                                                <input type="text" name="map_lng" class="form-control"
                                                    value="{{ $row->map_lng }}"
                                                    onkeydown="return event.key !== 'Enter';">
                                            </div>
                                            <div class="form-group">
                                                <label>{{ __('Map Zoom') }}:</label>
                                                <input type="text" name="map_zoom" class="form-control"
                                                    value="{{ $row->map_zoom ?? '8' }}"
                                                    onkeydown="return event.key !== 'Enter';">
                                            </div>
                                        </div>
                                    </div>
                                </div>--}}
                            </div>
                        </div>
                    </div>

                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>{{ __('About Information') }}</h4>
                            </div>
                            <div class="widget-content">
                                <div class="row">

                                    @if (is_default_lang())
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="cat_id"> {{__('Category') }}</label>
                                                <select id="cat_id" class="form-control" name="category_id">
                                                    <?php
                                                    $selectedIds = !empty($row->category_id) ? explode(',', $row->category_id) : [];
                                                    $traverse = function ($categories, $prefix = '') use (&$traverse, $selectedIds) {
                                                        foreach ($categories as $category) {
                                                            $selected = '';
                                                            if (in_array($category->id, $selectedIds)) {
                                                                $selected = 'selected';
                                                            }
                                                            printf("<option value='%s' %s>%s</option>", $category->id, $selected, $prefix . ' ' . $category->name);
                                                            $traverse($category->children, $prefix . '-');
                                                        }
                                                    };
                                                    $traverse($categories);
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    @endif

                                    @if (is_default_lang())
                                        <div class="col-md-12">
                                            @foreach ($attributes as $attribute)
                                                    <div class="form-group">
                                                        <label>{{ __(':name', ['name' => $attribute->name]) }}</label>
                                                        <div class="terms-scrollable mb-4">
                                                            @foreach ($attribute->terms as $term)
                                                                <label class="term-item">
                                                                    <input @if (!empty($selected_terms) and $selected_terms->contains($term->id)) checked @endif type="checkbox"
                                                                        name="terms[]" value="{{ $term->id }}">
                                                                    <span class="term-name">{{ $term->name }}</span>
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                               
                                            @endforeach
                                        </div>
                                    @endif

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">{{ __('About Company') }}</label>
                                            <div class="">
                                                <textarea name="about" class="d-none has-ckeditor" cols="30" rows="10">{{ old('about', $translation->about) }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--@include('Core::frontend/seo-meta/seo-meta')--}}

                    <div class="mb-4 d-none d-md-block">
                        <button class="theme-btn btn-style-one" type="submit"><i class="fa fa-save"
                                style="padding-right: 5px"></i> {{ __('Save Changes') }}</button>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="ls-widget">
                        <div class="widget-title">
                            <h4>{{ __('Publish') }}</h4>
                        </div>
                        <div class="widget-content">
                            <div class="form-group">
                                @if (is_default_lang())
                                    <div>
                                        <label><input @if ($row->status == 'publish') checked @endif type="radio"
                                                name="status" value="publish"> {{ __('Publish') }}
                                        </label>
                                    </div>
                                    <div>
                                        <label><input @if ($row->status == 'draft' or !$row->status) checked @endif type="radio"
                                                name="status" value="draft"> {{ __('Draft') }}
                                        </label>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="text-right">
                                    <button class="theme-btn btn-style-one" type="submit"><i class="fa fa-save"></i>
                                        {{ __('Save Changes') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>

                   

                    @if (is_default_lang())
                        <div class="ls-widget">
                            <div class="widget-title">
                                <h4>{{ __('Logo') }} </h4>
                            </div>
                            <div class="widget-content pb-4">
                                {!! \Modules\Media\Helpers\FileHelper::fieldUpload('avatar_id', $row->avatar_id) !!}
                                <p><i>({{ __('Recommended size 330px x 300px') }})</i></p>
                            </div>
                        </div>
                    @endif

                    @if (is_default_lang())
                        <div class="ls-widget">
                            <div class="widget-title">
                                <h4>{{ __('Social Media') }}</h4>
                            </div>
                            <div class="widget-content">
                                <?php $socialMediaData = $row->social_media; ?>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-skype"><i
                                                class="la la-skype"></i></span>
                                    </div>
                                    <input type="text" class="form-control" autocomplete="off"
                                        name="social_media[skype]" value="{{ $socialMediaData['skype'] ?? '' }}"
                                        placeholder="{{ __('Skype') }}" aria-label="{{ __('Skype') }}"
                                        aria-describedby="social-skype">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-facebook"><i
                                                class="la la-facebook"></i></span>
                                    </div>
                                    <input type="text" class="form-control" autocomplete="off"
                                        name="social_media[facebook]" value="{{ $socialMediaData['facebook'] ?? '' }}"
                                        placeholder="{{ __('Facebook') }}" aria-label="{{ __('Facebook') }}"
                                        aria-describedby="social-facebook">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-twitter"><i
                                                class="la la-twitter"></i></span>
                                    </div>
                                    <input type="text" class="form-control"autocomplete="off"
                                        name="social_media[twitter]" value="{{ $socialMediaData['twitter'] ?? '' }}"
                                        placeholder="{{ __('Twitter') }}" aria-label="{{ __('Twitter') }}"
                                        aria-describedby="social-twitter">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-instagram"><i
                                                class="la la-instagram"></i></span>
                                    </div>
                                    <input type="text" class="form-control" autocomplete="off"
                                        name="social_media[instagram]" value="{{ $socialMediaData['instagram'] ?? '' }}"
                                        placeholder="{{ __('Instagram') }}" aria-label="{{ __('Instagram') }}"
                                        aria-describedby="social-instagram">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-linkedin"><i
                                                class="la la-linkedin"></i></span>
                                    </div>
                                    <input type="text" class="form-control" autocomplete="off"
                                        name="social_media[linkedin]" value="{{ $socialMediaData['linkedin'] ?? '' }}"
                                        placeholder="{{ __('Linkedin') }}" aria-label="{{ __('Linkedin') }}"
                                        aria-describedby="social-linkedin">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-google"><i
                                                class="la la-google"></i></span>
                                    </div>
                                    <input type="text" class="form-control" autocomplete="off"
                                        name="social_media[google]" value="{{ @$socialMediaData['google'] ?? '' }}"
                                        placeholder="{{ __('Google') }}" aria-label="{{ __('Google') }}"
                                        aria-describedby="social-google">
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </form>
    </div>

    <!-- Modal -->
    @if (empty(@$row->getAuthor?->phone_verified_at) && !empty(@$row->getAuthor?->phone))
        <div class="modal fade verifyNumber" id="verifyNumber">
            <div id="login-modal">
                <div class="login-form default-form">
                    <div class="form-inner">
                        <div class="form-inner">
                            <h3>Verify Phone Number</h3>
                            <div class="alert alert-danger " id="verifyNumberAlert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ __('Please check the form below for problems') }}
                                <ul class="pl-2" id="verifyNumberAlertContent">
                                </ul>
                            </div>
                            <form class="form" id="bravo-form-verify-otp" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="user_id" value="{{ @$row->owner_id }}">
                                    <input type="text" name="otp" placeholder="{{ __('Enter OTP') }}" required>
                                </div>
                                <div class="form-group d-flex flex-column flex-sm-row justify-content-around">
                                    <button class="btn btn-primary m-1" id="sendOtp" type="button">SEND OTP
                                        <span class="spinner-grow spinner-grow-sm icon-loading" role="status"
                                            aria-hidden="true"></span>
                                    </button>
                                    <button class="btn btn-success m-1" id="verifyOtp" type="button">VERIFY
                                        <span class="spinner-grow spinner-grow-sm icon-loading" role="status"
                                            aria-hidden="true"></span>
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
    <script src="{{ asset('libs/select2/js/select2.min.js') }}"></script>
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
        }).on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY/MM/DD'));
        });

        $(document).on('click', '.bc-call-modal.verifyNumber', function(event) {
            event.preventDefault();
            this.blur();
            $("#verifyNumber").modal({
                fadeDuration: 300,
                fadeDelay: 0.15
            });
        });

        const verifyAlert = $('#verifyNumberAlert');
        const verifyAlertContent = $('#verifyNumberAlertContent');

        verifyAlert.hide();

        $(document).on('click', '.bc-call-modal.verifyNumber', function(event) {
            event.preventDefault();
            this.blur();
            $("#verifyNumber").modal({
                fadeDuration: 300,
                fadeDelay: 0.15
            });
        });

        $('#sendOtp').on('click', function(e) {
            e.preventDefault();
            let form = $('#bravo-form-verify-otp');
            verifyAlert.hide();
            verifyAlertContent.empty();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': form.find('input[name="_token"]').val()
                }
            });
            $.ajax({
                'url': `{{ route('user.sendOtp') }}`,
                'data': {
                    'id': form.find('input[name=user_id]').val(),
                },
                'type': 'POST',
                beforeSend: function() {
                    form.find('.error').hide();
                    form.find('.icon-loading').css("display", 'inline-block');
                },
                success: function(data) {
                    form.find('.icon-loading').hide();
                    console.log(data);
                    if (data.error === true) {
                        if (data.messages !== undefined) {
                            for (var item in data.messages) {
                                var msg = data.messages[item];
                                verifyAlertContent.append(`<li>${msg}</li>`);
                            }
                        }

                        verifyAlert.show();
                    }
                },
                error: function(e) {
                    form.find('.icon-loading').hide();
                    console.log(e);
                    // if(typeof e.responseJSON !== "undefined" && typeof e.responseJSON.message !='undefined'){
                    //     form.find('.message-error').show().html('<div class="alert alert-danger">' + e.responseJSON.message + '</div>');
                    // }
                }
            });
        });

        $('#verifyOtp').on('click', function(e) {
            e.preventDefault();
            let form = $('#bravo-form-verify-otp');
            verifyAlert.hide();
            verifyAlertContent.empty();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': form.find('input[name="_token"]').val()
                }
            });
            $.ajax({
                'url': `{{ route('user.verifyNumber') }}`,
                'data': {
                    'id': form.find('input[name=user_id]').val(),
                    'otp': form.find('input[name=otp]').val(),
                },
                'type': 'POST',
                beforeSend: function() {
                    form.find('.error').hide();
                    form.find('.icon-loading').css("display", 'inline-block');
                },
                success: function(data) {
                    form.find('.icon-loading').hide();
                    if (data.error === true) {
                        if (data.messages !== undefined) {
                            for (var item in data.messages) {
                                console.log(item);
                                var msg = data.messages[item];
                                verifyAlertContent.append(`<li>${msg}</li>`);
                            }
                        }
                        verifyAlert.show();
                    } else {
                        window.location.reload()
                    }

                },
                error: function(e) {
                    form.find('.icon-loading').hide();
                    console.log(e);
                    // if(typeof e.responseJSON !== "undefined" && typeof e.responseJSON.message !='undefined'){
                    //     form.find('.message-error').show().html('<div class="alert alert-danger">' + e.responseJSON.message + '</div>');
                    // }
                }
            });
        });


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
        let mapLat = {{ $row->map_lat ?? setting_item('default_location_lat', '51.505') }};
        let mapLng = {{ $row->map_lng ?? setting_item('default_location_lng', '-0.09') }};
        let mapZoom = {{ $row->map_zoom ?? '8' }};

        jQuery(function($) {
            new BravoMapEngine('map_content', {
                disableScripts: true,
                fitBounds: true,
                center: [mapLat, mapLng],
                zoom: mapZoom,
                ready: function(engineMap) {
                    engineMap.addMarker([mapLat, mapLng], {
                        icon_options: {}
                    });
                    engineMap.on('click', function(dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                    engineMap.on('zoom_changed', function(zoom) {
                        $("input[name=map_zoom]").attr("value", zoom);
                    });
                    engineMap.searchBox($('#customPlaceAddress'), function(dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                    engineMap.searchBox($('.bravo_searchbox'), function(dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                }
            });

        });

        jQuery(function($) {
            "use strict"
            $('.open-edit-input').on('click', function(e) {
                e.preventDefault();
                $(this).replaceWith('<input type="text" name="' + $(this).data('name') + '" value="' + $(
                    this).html() + '">');
            });
        })
    </script>
@endsection
