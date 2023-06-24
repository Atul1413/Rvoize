@extends('layouts.user')
@section('head')
    <style>
        #permanentlyDeleteAccount .close-modal {
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
                <h3 class="title">{{ __('My Profile') }}</h3>
                <div class="text">{{ __('Ready to jump back in?') }}</div>
            </div>
            {{--
            <div class="title-actions">
                <a href="{{route('user.upgrade_company')}}" class="btn btn-warning text-light">{{__("Become a Company")}}</a>
                 @if ($url = $row->getDetailUrl())
                    <a href="{{$url}}" class="btn btn-info text-light ml-3"><i class="la la-eye"></i> {{__("View profile")}}</a>
                @endif 
            </div>
            --}}
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


                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <!-- Profile Progress Bar End-->


        <form action="{{ route('user.candidate.store') }}" method="post" class="default-form">
            @csrf
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="ls-widget mb-4">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>{{ __('Basic Information') }}</h4>
                            </div>
                            <div class="widget-content">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{ __('First name') }} <span class="text-danger">*</span></label>
                                                <input type="text" value="{{ old('first_name', $user->first_name) }}"
                                                    name="first_name" placeholder="{{ __('First name') }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{ __('Last name') }} <span class="text-danger">*</span></label>
                                                <input type="text" value="{{ old('last_name', $user->last_name) }}"
                                                    name="last_name" placeholder="{{ __('Last name') }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{ __('Contact Number') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" value="{{ old('phone', @$row->user?->phone) }}"
                                                    placeholder="{{ __('Contact Number') }}" name="phone"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        @if (empty($row->user?->phone_verified_at) && !empty($row->user?->phone))
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
                                                <label>{{ __('E-mail') }} <span class="text-danger">*</span></label>
                                                <input type="email" required
                                                    value="{{ old('email', $row->user?->email) }}"
                                                    placeholder="{{ __('Email') }}" name="email" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <!-- Basic Extra -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('Current position') }} <span class="text-danger">*</span></label>
                                            <input type="text" value="{{ old('title', @$user->candidate->title) }}"
                                                name="title" placeholder="{{ __('Current position') }}" required
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('Website') }}</label>
                                            <input type="text" value="{{ old('website', @$user->candidate->website) }}"
                                                name="website" placeholder="{{ __('Website') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">{{ __('Gender') }}</label>
                                            <select class="form-control" id="gender" name="gender">
                                                <option value="" @if (old('gender', @$user->candidate->gender) == '') selected @endif>
                                                    {{ __('Select') }}</option>
                                                <option value="male" @if (old('gender', @$user->candidate->gender) == 'male') selected @endif>
                                                    {{ __('Male') }}</option>
                                                <option value="female" @if (old('gender', @$user->candidate->gender) == 'female') selected @endif>
                                                    {{ __('Female') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('Expected Salary') }}</label>
                                            <div class="input-group">
                                                <input type="text"
                                                    value="{{ old('expected_salary', @$user->candidate->expected_salary) }}"
                                                    placeholder="{{ __('Expected Salary') }}" name="expected_salary"
                                                    class="form-control">
                                                <div class="input-group-append">
                                                    <select class="form-control" name="salary_type">
                                                        <option value="hourly"
                                                            @if (old('salary_type', @$user->candidate->salary_type) == 'hourly') selected @endif>
                                                            {{ currency_symbol() . __('/hourly') }} </option>
                                                        <option value="daily"
                                                            @if (old('salary_type', @$user->candidate->salary_type) == 'daily') selected @endif>
                                                            {{ currency_symbol() . __('/daily') }}</option>
                                                        <option value="weekly"
                                                            @if (old('salary_type', @$user->candidate->salary_type) == 'weekly') selected @endif>
                                                            {{ currency_symbol() . __('/weekly') }}</option>
                                                        <option value="monthly"
                                                            @if (old('salary_type', @$user->candidate->salary_type) == 'monthly') selected @endif>
                                                            {{ currency_symbol() . __('/monthly') }}</option>
                                                        <option value="yearly"
                                                            @if (old('salary_type', @$user->candidate->salary_type) == 'yearly') selected @endif>
                                                            {{ currency_symbol() . __('/yearly') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('Experience') }}</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control"
                                                    placeholder="{{ __('Experience') }}" name="experience_year"
                                                    value="{{ old('experience_year', @$user->candidate->experience_year) }}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"
                                                        style="font-size: 14px;">{{ __('year(s)') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="education_level">{{ __('Education Level') }}</label>
                                            <select class="form-control" id="education_level" name="education_level">
                                                <option value="" @if (old('education_level', @$user->candidate->education_level) == '') selected @endif>
                                                    {{ __('Select') }}</option>
                                                <option value="certificate"
                                                    @if (old('education_level', @$user->candidate->education_level) == 'certificate') selected @endif>
                                                    {{ __('Certificate') }}</option>
                                                <option value="diploma"
                                                    @if (old('education_level', @$user->candidate->education_level) == 'diploma') selected @endif>
                                                    {{ __('Diploma') }}</option>
                                                <option value="associate"
                                                    @if (old('education_level', @$user->candidate->education_level) == 'associate') selected @endif>
                                                    {{ __('Associate') }}</option>
                                                <option value="bachelor"
                                                    @if (old('education_level', @$user->candidate->education_level) == 'bachelor') selected @endif>
                                                    {{ __('Bachelor') }}</option>
                                                <option value="master" @if (old('education_level', @$user->candidate->education_level) == 'master') selected @endif>
                                                    {{ __('Master') }}</option>
                                                <option value="professional"
                                                    @if (old('education_level', @$user->candidate->education_level) == 'professional') selected @endif>
                                                    {{ __('Professional') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('Language') }}</label>
                                            <select id="languages" name="languages[]" class="form-control"
                                                multiple="multiple">
                                                <option value="">{{ __('-- Please Select --') }}</option>
                                                <?php
                                                foreach ($languages as $language) {
                                                    $selected = '';
                                                    if (!empty($user->candidate->languages)) {
                                                        $lang = explode(',', $user->candidate->languages);
                                                        $lang = array_map('trim', $lang);
                                                        if (in_array($language, $lang)) {
                                                            $selected = 'selected';
                                                        }
                                                    }
                                                    printf("<option value='%s' %s>%s</option>", $language, $selected, $language);
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <!--  Basic Extra End -->
                            </div>
                        </div>
                    </div>
                    <div class="ls-widget mb-4">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>{{ __('About') }}</h4>
                            </div>
                            <div class="widget-content">
                                <textarea name="bio" rows="12" class="form-control">{{ strip_tags(old('bio', $user->bio)) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="ls-widget mb-4">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>{{ __('Location Info') }}</h4>
                            </div>
                            <div class="widget-content">
                                <!--Location -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="">{{ __('Country') }}</label>
                                            <select name="country" class="form-control" id="country-sms-testing">
                                                <option value="">{{ __('-- Select --') }}</option>
                                                @foreach (get_country_lists() as $id => $name)
                                                    <option @if (@$user->candidate->country == $id) selected @endif
                                                        value="{{ $id }}">{{ $name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('City') }}</label>
                                            <input type="text" value="{{ old('city', @$user->candidate->city) }}"
                                                name="city" placeholder="{{ __('City') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{ __('Address Line') }}</label>
                                            <input type="text"
                                                value="{{ old('address', @$user->candidate->address) }}"
                                                placeholder="{{ __('Address') }}" name="address" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">{{ __('Location') }}</label>
                                    @if (!empty($is_smart_search))
                                        <div class="form-group-smart-search">
                                            <div class="form-content">
                                                @php
                                                    $location_name = '';
                                                    $list_json = [];
                                                    $candidate = $user->candidate;
                                                    $traverse = function ($locations, $prefix = '') use (&$traverse, &$list_json, &$location_name, $candidate) {
                                                        foreach ($locations as $location) {
                                                            $translate = $location->translateOrOrigin(app()->getLocale());
                                                            if (@$candidate->location_id == $location->id) {
                                                                $location_name = $translate->name;
                                                            }
                                                            $list_json[] = [
                                                                'id' => $location->id,
                                                                'title' => $prefix . ' ' . $translate->name,
                                                            ];
                                                            $traverse($location->children, $prefix . '-');
                                                        }
                                                    };
                                                    $traverse($locations);
                                                @endphp
                                                <div class="smart-search">
                                                    <input type="text"
                                                        class="smart-search-location parent_text form-control"
                                                        placeholder="{{ __('-- Please Select --') }}"
                                                        value="{{ $location_name }}"
                                                        data-onLoad="{{ __('Loading...') }}"
                                                        data-default="{{ json_encode($list_json) }}">
                                                    <input type="hidden" class="child_id" name="location_id"
                                                        value="{{ @$user->candidate->location_id ?? Request::query('location_id') }}">
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="">
                                            <select name="location_id" class="form-control">
                                                <option value="">{{ __('-- Please Select --') }}</option>
                                                @php
                                                    $candidate = $user->candidate;
                                                    $traverse = function ($locations, $prefix = '') use (&$traverse, $candidate) {
                                                        foreach ($locations as $location) {
                                                            $selected = '';
                                                            if (@$candidate->location_id == $location->id) {
                                                                $selected = 'selected';
                                                            }
                                                            printf("<option value='%s' %s>%s</option>", $location->id, $selected, $prefix . ' ' . $location->name);
                                                            $traverse($location->children, $prefix . '-');
                                                        }
                                                    };
                                                    $traverse($locations);
                                                @endphp
                                            </select>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
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
                                                    value="{{ @$user->candidate->map_lat ?? '51.505' }}"
                                                    onkeydown="return event.key !== 'Enter';">
                                            </div>
                                            <div class="form-group">
                                                <label>{{ __('Map Longitude') }}:</label>
                                                <input type="text" name="map_lng" class="form-control"
                                                    value="{{ @$user->candidate->map_lng ?? '-0.09' }}"
                                                    onkeydown="return event.key !== 'Enter';">
                                            </div>
                                            <div class="form-group">
                                                <label>{{ __('Map Zoom') }}:</label>
                                                <input type="text" name="map_zoom" class="form-control"
                                                    value="{{ @$user->candidate->map_zoom ?? '8' }}"
                                                    onkeydown="return event.key !== 'Enter';">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Location End -->

                            </div>
                        </div>
                    </div>
                    <div class="ls-widget mb-4 card-sub_information">
                        <div class="tabs-box">
                            <div class="widget-title"><strong>{{ __('Education - Experience - Award') }}</strong></div>
                            <div class="widget-content">
                                <!-- EEA -->

                                <h3 class="panel-body-title">{{ __('Education') }}</h3>
                                <div class="form-group-item">
                                    <div class="g-items-header">
                                        <div class="row">
                                            <div class="col-md-2">{{ __('Year') }}</div>
                                            <div class="col-md-3">{{ __('Location') }}</div>
                                            <div class="col-md-3">{{ __('Reward') }}</div>
                                            <div class="col-md-3">{{ __('More Information') }}</div>
                                            <div class="col-md-1"></div>
                                        </div>
                                    </div>
                                    <div class="g-items">
                                        @php $educations = @$user->candidate->education; @endphp
                                        @if (!empty($educations))
                                            @foreach ($educations as $key => $item)
                                                <div class="item" data-number="{{ $key }}">
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <input type="text"
                                                                name="education[{{ $key }}][from]"
                                                                class="form-control" value="{{ @$item['from'] }}"
                                                                placeholder="{{ __('From') }}">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <input type="text"
                                                                name="education[{{ $key }}][to]"
                                                                class="form-control" value="{{ @$item['to'] }}"
                                                                placeholder="{{ __('To') }}">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text"
                                                                name="education[{{ $key }}][location]"
                                                                class="form-control" value="{{ @$item['location'] }}">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text"
                                                                name="education[{{ $key }}][reward]"
                                                                class="form-control" value="{{ @$item['reward'] }}">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <textarea name="education[{{ $key }}][information]" class="form-control">{{ @$item['information'] }}</textarea>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <span class="btn btn-danger btn-sm btn-remove-item"><i
                                                                    class="fa fa-trash"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="text-right">
                                        <span class="btn btn-info btn-sm btn-add-item"><i
                                                class="icon ion-ios-add-circle-outline"></i> {{ __('Add item') }}</span>
                                    </div>
                                    <div class="g-more hide">
                                        <div class="item" data-number="__number__">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="text" __name__="education[__number__][from]"
                                                        class="form-control" value=""
                                                        placeholder="{{ __('From') }}">
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="text" __name__="education[__number__][to]"
                                                        class="form-control" value=""
                                                        placeholder="{{ __('To') }}">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" __name__="education[__number__][location]"
                                                        class="form-control" value="">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" __name__="education[__number__][reward]"
                                                        class="form-control" value="">
                                                </div>
                                                <div class="col-md-3">
                                                    <textarea __name__="education[__number__][information]" class="form-control"></textarea>
                                                </div>
                                                <div class="col-md-1">
                                                    <span class="btn btn-danger btn-sm btn-remove-item"><i
                                                            class="fa fa-trash"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <h3 class="panel-body-title">{{ __('Experience') }}</h3>
                                <div class="form-group-item">
                                    <div class="g-items-header">
                                        <div class="row">
                                            <div class="col-md-2">{{ __('Year') }}</div>
                                            <div class="col-md-3">{{ __('Location') }}</div>
                                            <div class="col-md-3">{{ __('Position') }}</div>
                                            <div class="col-md-3">{{ __('More Information') }}</div>
                                            <div class="col-md-1"></div>
                                        </div>
                                    </div>
                                    <div class="g-items">
                                        @php $experiences = @$user->candidate->experience; @endphp
                                        @if (!empty($experiences))
                                            @foreach ($experiences as $key => $item)
                                                <div class="item" data-number="{{ $key }}">
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <input type="text"
                                                                name="experience[{{ $key }}][from]"
                                                                class="form-control" value="{{ @$item['from'] }}"
                                                                placeholder="{{ __('From') }}">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <input type="text"
                                                                name="experience[{{ $key }}][to]"
                                                                class="form-control" value="{{ @$item['to'] }}"
                                                                placeholder="{{ __('To') }}">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text"
                                                                name="experience[{{ $key }}][location]"
                                                                class="form-control" value="{{ @$item['location'] }}">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text"
                                                                name="experience[{{ $key }}][position]"
                                                                class="form-control" value="{{ @$item['position'] }}">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <textarea name="experience[{{ $key }}][information]" class="form-control">{{ @$item['information'] }}</textarea>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <span class="btn btn-danger btn-sm btn-remove-item"><i
                                                                    class="fa fa-trash"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="text-right">
                                        <span class="btn btn-info btn-sm btn-add-item"><i
                                                class="icon ion-ios-add-circle-outline"></i> {{ __('Add item') }}</span>
                                    </div>
                                    <div class="g-more hide">
                                        <div class="item" data-number="__number__">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="text" __name__="experience[__number__][from]"
                                                        class="form-control" value=""
                                                        placeholder="{{ __('From') }}">
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="text" __name__="experience[__number__][to]"
                                                        class="form-control" value=""
                                                        placeholder="{{ __('To') }}">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" __name__="experience[__number__][location]"
                                                        class="form-control" value="">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" __name__="experience[__number__][position]"
                                                        class="form-control" value="">
                                                </div>
                                                <div class="col-md-3">
                                                    <textarea __name__="experience[__number__][information]" class="form-control" value=""></textarea>
                                                </div>
                                                <div class="col-md-1">
                                                    <span class="btn btn-danger btn-sm btn-remove-item"><i
                                                            class="fa fa-trash"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <h3 class="panel-body-title">{{ __('Skills') }}</h3>
                                <div class="form-group">
                                    <div class="">
                                        <select id="skills" name="skills[]" class="form-control" multiple="multiple">
                                            <option value="">{{ __('-- Please Select --') }}</option>
                                            <?php
                                            foreach ($skills as $oneSkill) {
                                                $selected = '';
                                                if (!empty($row->skills)) {
                                                    foreach ($row->skills as $skill) {
                                                        if ($oneSkill->id == $skill->id) {
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

                                <hr>
                                <h3 class="panel-body-title">{{ __('Certifications') }}</h3>
                                <div class="form-group-item">
                                    <div class="g-items-header">
                                        <div class="row">
                                            <div class="col-md-2">{{ __('Year') }}</div>
                                            <div class="col-md-3">{{ __('Location') }}</div>
                                            <div class="col-md-3">{{ __('Reward') }}</div>
                                            <div class="col-md-3">{{ __('More Information') }}</div>
                                            <div class="col-md-1"></div>
                                        </div>
                                    </div>
                                    <div class="g-items">
                                        @php $awards = @$candidate->award; @endphp
                                        @if (!empty($awards))
                                            @foreach ($awards as $key => $item)
                                                <div class="item" data-number="{{ $key }}">
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <input type="text"
                                                                name="award[{{ $key }}][from]"
                                                                class="form-control" value="{{ @$item['from'] }}"
                                                                placeholder="{{ __('From') }}">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <input type="text" name="award[{{ $key }}][to]"
                                                                class="form-control" value="{{ @$item['to'] }}"
                                                                placeholder="{{ __('To') }}">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text"
                                                                name="award[{{ $key }}][location]"
                                                                class="form-control" value="{{ @$item['location'] }}">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text"
                                                                name="award[{{ $key }}][reward]"
                                                                class="form-control" value="{{ @$item['reward'] }}">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <textarea name="award[{{ $key }}][information]" class="form-control">{{ @$item['information'] }}</textarea>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <span class="btn btn-danger btn-sm btn-remove-item"><i
                                                                    class="fa fa-trash"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="text-right">
                                        <span class="btn btn-info btn-sm btn-add-item"><i
                                                class="icon ion-ios-add-circle-outline"></i> {{ __('Add item') }}</span>
                                    </div>
                                    <div class="g-more hide">
                                        <div class="item" data-number="__number__">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="text" __name__="award[__number__][from]"
                                                        class="form-control" value=""
                                                        placeholder="{{ __('From') }}">
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="text" __name__="award[__number__][to]"
                                                        class="form-control" value=""
                                                        placeholder="{{ __('To') }}">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" __name__="award[__number__][location]"
                                                        class="form-control" value="">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" __name__="award[__number__][reward]"
                                                        class="form-control" value="">
                                                </div>
                                                <div class="col-md-3">
                                                    <textarea __name__="award[__number__][information]" class="form-control"></textarea>
                                                </div>
                                                <div class="col-md-1">
                                                    <span class="btn btn-danger btn-sm btn-remove-item"><i
                                                            class="fa fa-trash"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- EEA End -->
                            </div>
                        </div>
                    </div>



                    @include('Core::frontend.seo-meta.seo-meta')

                    <div class="mb-4 d-none d-md-block">
                        <button class="theme-btn btn-style-one" type="submit"><i class="fa fa-save"
                                style="padding-right: 5px"></i> {{ __('Save Changes') }}</button>
                    </div>
                </div>

                <div class="col-lg-3 col-12">
                    <div class="ls-widget mb-4 ">
                        <div class="tabs-box">
                            <div class="widget-title"><strong>{{ __('Profile') }}</strong></div>
                            <div class="widget-content">
                                <div class="form-group">
                                    {!! \Modules\Media\Helpers\FileHelper::fieldUpload('avatar_id', old('avatar_id', $user->avatar_id)) !!}
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="ls-widget mb-4 ">
                        <div class="tabs-box">
                            <div class="widget-title"><strong>{{ __('Visibility') }}</strong></div>
                            <div class="widget-content">
                                <div class="form-group">
                                    <select required class="custom-select" name="allow_search">
                                        <option @if (old('allow_search', @$row->allow_search) == 'hide') selected @endif value="hide">
                                            {{ __('Hide') }}</option>
                                        <option @if (old('allow_search', @$row->allow_search) == 'publish') selected @endif value="publish">
                                            {{ __('Publish') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ls-widget mb-4">
                        <div class="tabs-box">
                            <div class="widget-title"><strong>{{ __('Categories') }}</strong></div>
                            <div class="widget-content">
                                <div class="form-group">
                                    <select id="categories" class="form-control" name="categories[]"
                                        multiple="multiple">
                                        <option value="">{{ __('-- Please Select --') }}</option>
                                        <?php
                                        foreach ($categories as $oneCategories) {
                                            $selected = '';
                                            if (!empty($row->categories)) {
                                                foreach ($row->categories as $category) {
                                                    if ($oneCategories->id == $category->id) {
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



                    <div class="ls-widget mb-4 card-social">
                        <div class="tabs-box">
                            <div class="widget-title"><strong>{{ __('Social Media') }}</strong></div>
                            <div class="widget-content">
                                <?php $socialMediaData = !empty($row) ? $row->social_media : []; ?>
                                {{-- <div class="input-group mb-3">
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
                                    </div> --}}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-google"><i
                                                class="fab fa-linkedin"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="social_media[linkedin]"
                                        value="{{ @$socialMediaData['linkedin'] }}" placeholder="{{ __('Linkedin') }}"
                                        aria-label="{{ __('Linkedin') }}" aria-describedby="social-linkedin">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 text-center">
                        <button class="theme-btn btn-style-one" type="submit"><i class="fa fa-save"
                                style="padding-right: 5px"></i> {{ __('Save Changes') }}</button>
                    </div>
                </div>
            </div>
        </form>
        <hr>

    </div>

    @if (!empty(setting_item('user_enable_permanently_delete')) and !is_admin())
        <div class="row">
            <div class="col-lg-9">
                <div class="ls-widget">
                    <div class="widget-title">
                        <h4 class="text-danger">
                            {{ __('Delete account') }}
                        </h4>
                    </div>
                    <div class="widget-content">
                        <div class="mb-4 mt-2">
                            {!! clean(
                                setting_item_with_lang(
                                    'user_permanently_delete_content',
                                    '',
                                    __(
                                        'Your account will be permanently deleted. Once you delete your account, there is no going back. Please be certain.',
                                    ),
                                ),
                            ) !!}
                        </div>
                        <a rel="modal:open" class="btn btn-danger"
                            href="#permanentlyDeleteAccount">{{ __('Delete your account') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal bravo-form" id="permanentlyDeleteAccount">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Confirm permanently delete account') }}</h5>
                    </div>
                    <div class="modal-body ">
                        <div class="my-3">
                            {!! clean(setting_item_with_lang('user_permanently_delete_content_confirm')) !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#close-modal" rel="modal:close" class="btn btn-secondary">{{ __('Close') }}</a>
                        <a href="{{ route('user.permanently.delete') }}"
                            class="btn btn-danger">{{ __('Confirm') }}</a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Modal -->
    @if (empty(@$row->user?->phone_verified_at) && !empty(@$row->user?->phone))
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
                                    <input type="hidden" name="user_id" value="{{ @$row->create_user }}">
                                    <input type="text" name="otp" placeholder="{{ __('Enter OTP') }}" required>
                                </div>
                                <div class="form-group d-flex flex-column flex-sm-row  justify-content-around">
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
        @if (is_candidate() || !empty($candidate_create))
            $(document).ready(function() {
                $('#categories').select2();
                $('#skills').select2();
                $('#languages').select2();
            });

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

            })
        @endif
    </script>
@endsection
