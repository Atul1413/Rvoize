@extends('layouts.user')

@section('content')
  
    <form method="post" action="{{ route('user.company.advertisement.store.ads',['id' => $row->id ?? '-1']) }}" enctype="multipart/form-data" class="default-form">
        @csrf
        <input type="hidden" name="id" value="{{$row->id}}">
        <div class="upper-title-box">
            <div class="row">
                <div class="col-md-9">
                    <h4>{{$row->id ? __('Edit: ').$row->title : __('New Advertisement')}}</h4>
                </div>
              
            </div>
        </div>
        @include('admin.message')

        {{-- @if($row->id)
            @include('Language::admin.navigation')
        @endif --}}

        <div class="row">
            <div class="col-xl-9">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title"><h4>{{ __("Advertisement Content") }}</h4></div>
                        <div class="widget-content">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>{{__("Title")}} <span class="required">*</span></label>
                                        <input type="text" value="{{ old('title', $row->title) }}" placeholder="{{__("Title")}}" name="title" required class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{__("Advertisement URL")}}</label>
                                        <input type="text" name="url" required class="form-control" value="{{old('url',$row->url)}}" placeholder="{{__("Advertisement URL")}}">
                                    </div>
                                </div>
                            </div>
                         
                         
                            @if(is_default_lang())
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{__("Start Date")}} <span class="required">*</span></label>
                                            <input type="text" value="{{ old( 'start_date', $row->start_date ? date('Y/m/d', strtotime($row->start_date)) : '') }}" placeholder="YYYY/MM/DD" name="start_date" autocomplete="false" required class="form-control has-datepicker bg-white">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{__("End Date")}} <span class="required">*</span></label>
                                            <input type="text" value="{{ old( 'end_date', $row->end_date ? date('Y/m/d', strtotime($row->end_date)) : '') }}" placeholder="YYYY/MM/DD" name="end_date" autocomplete="false" required class="form-control has-datepicker bg-white">
                                        </div>
                                    </div>
                                    
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="position">Advertisement Position  <span class="required">*</span></label>
                                            <div class="">
                                                <select name="position" required class="form-control" required>
                                                    <option disabled selected value="">{{__("-- Select --")}}</option>
                                                    @php
                                                    foreach ($positions as $positionId => $position) {
                                                        $selected = '';
                                                        if (old('position', $row->position) == $positionId)
                                                            $selected = 'selected';
                                                        printf("<option value='%s' %s>%s</option>", $positionId, $selected, $position);
                                                    }
                                                    @endphp
                                                </select>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="">
                                                <label for="countries">Countries <strong>( Advertise in these countries)</strong> </label>
                                                <select id="countries" name="countries[]" class="form-control" required multiple="multiple">
                                                    <option value="">{{ __('-- Please Select --') }}</option>
                                                    @php
                                                    foreach (get_country_lists() as $countryId => $country) {
                                                        $selected = '';
                                                        if (!empty($row->countries)) {
                                                            foreach ($row->countries as $selectedCountry) {
                                                                if ($countryId == $selectedCountry->country) {
                                                                    $selected = 'selected';
                                                                }
                                                            }
                                                        }
                                                        printf("<option value='%s' %s>%s</option>", $countryId, $selected, $country);
                                                    }
                                                    @endphp
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                                                    

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{__("Banner Image") }} ({{__('Recommended size image: '.\Modules\Advertisement\Models\Advertisement::HEIGHT.' px x '.\Modules\Advertisement\Models\Advertisement::WIDTH.' px')}})</label>
                                            <div class="form-group">
                                                {!! \Modules\Media\Helpers\FileHelper::fieldUpload('banner',$row->banner) !!}
                                            </div>
                                        </div>
                                    </div>

                                    
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

               
                <div class="mb-4 d-none d-md-block">
                    <button class="theme-btn btn-style-one" type="submit"><i class="fa fa-save" style="padding-right: 5px"></i> {{__('Save Changes')}}</button>
                </div>

            </div>

            <div class="col-xl-3">

                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title"><h4>{{ __("Publish") }}</h4></div>
                        <div class="widget-content pb-4">
                            @if(is_default_lang())
                                <div>
                                    <label><input @if($row->status =='publish') checked @endif type="radio" name="status" value="publish"> {{__("Publish")}}</label>
                                </div>
                                <div>
                                    <label><input @if($row->status =='draft') checked @endif type="radio" name="status" value="draft"> {{__("Draft")}}</label>
                                </div>
                            @endif
                            <div class="text-right">
                                <button class="theme-btn btn-style-one" type="submit"><i class="fa fa-save"></i> {{__('Save Changes')}}</button>
                            </div>
                        </div>
                    </div>
                </div>

              
               
            </div>
        </div>
    </form>

@endsection

@section('footer')
    <script type="text/javascript" src="{{ asset('libs/daterange/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('libs/daterange/daterangepicker.min.js') }}"></script>
    <script src="{{ asset('libs/select2/js/select2.min.js') }}" ></script>
    <script>
        jQuery(function ($) {
            "use strict"

            $('.has-datepicker').daterangepicker({
                singleDatePicker: true,
                showCalendar: false,
                autoUpdateInput: false, //disable default date
                showDropdowns: true,
                sameDate: true,
                autoApply           : true,
                disabledPast        : true,
                enableLoading       : true,
                showEventTooltip    : true,
                classNotAvailable   : ['disabled', 'off'],
                disableHightLight: true,
                minDate: `{{ auth()->user()->user_plan?->start_date?->format('Y-m-d H:i:s') }}`,
                maxDate: `{{ auth()->user()->user_plan?->end_date?->format('Y-m-d H:i:s') }}`,
                locale:{
                    format:'YYYY/MM/DD'
                }
            }).on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('YYYY/MM/DD'));
            });


        })

        $(document).ready(function() {
                $('#countries').select2();
        });
    </script>
@endsection
