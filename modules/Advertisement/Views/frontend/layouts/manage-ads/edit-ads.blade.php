@extends('layouts.user')

@section('content')
  
    <form method="post" class="default-form">
        @csrf
        <input type="hidden" name="id" value="{{$row->id}}">
        <div class="upper-title-box">
            <div class="row">
                <div class="col-md-9">
                    <h3>{{$row->id ? __('Edit: ').$row->title : __('New Advertisement')}}</h3>
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
                        <div class="widget-title"><h4>{{ __("Advertise Content") }}</h4></div>
                        <div class="widget-content">
                            <div class="form-group">
                                <label>{{__("Title")}} <span class="required">*</span></label>
                                <input type="text" value="{{ old('title', $row->title) }}" placeholder="{{__("Title")}}" name="title" required class="form-control">
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
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{__("Experience")}}</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="{{ __("Experience") }}" name="experience" value="{{ old('experience',$row->experience) }}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" style="font-size: 14px;">{{ __("year(s)") }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{__("Number Of Recruitments")}}</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="{{ __("0") }}" name="number_recruitments" value="{{ old('number_recruitments',$row->number_recruitments) }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">{{__("Video Url")}}</label>
                                            <input type="text" name="video" class="form-control" value="{{old('video',$row->video)}}" placeholder="{{__("Youtube link video")}}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{__("Video Cover Image")}}</label>
                                            <div class="form-group">
                                                {!! \Modules\Media\Helpers\FileHelper::fieldUpload('video_cover_id',$row->video_cover_id) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">{{__("Gallery")}} ({{__('Recommended size image:1080 x 1920px')}})</label>
                                            @php
                                                $gallery_id = $row->gallery ?? old('gallery');
                                            @endphp
                                            {!! \Modules\Media\Helpers\FileHelper::fieldGalleryUpload('gallery', $gallery_id) !!}
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
    {{-- <script src="{{ asset('js/condition.js') }}"></script> --}}
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
                locale:{
                    format:'YYYY/MM/DD'
                }
            }).on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('YYYY/MM/DD'));
            });


        })
    </script>
@endsection
