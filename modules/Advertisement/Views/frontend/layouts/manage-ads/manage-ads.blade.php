@extends('layouts.user')

@section('content')

    <div class="row">
        <div class="col-md-9">
            <div class="upper-title-box">
                <h3>{{ __("Manage Advertisements") }}</h3>
                {{-- <div class="text">{{ __("Ready to jump back in?") }}</div> --}}
            </div>
        </div>
        <div class="col-md-3 text-right">
            <a class="theme-btn btn-style-one" href="#">{{__("Create New Ad")}}</a>
        </div>
    </div>
    @include('admin.message')
    <div class="row">
        <div class="col-lg-12">
            <!-- Ls widget -->
            <div class="ls-widget">
                <div class="tabs-box">
                    <div class="widget-title">
                        <h4>{{ __("Manage Ads") }}</h4>
                    </div>
                    <div class="widget-content">
                        <div class="table-outer">
                            <table class="default-table manage-job-table">
                                <thead>
                                <tr>
                                    <th width="230px">{{ __("Title") }}</th>
                                    <th width="140px">{{ __('Banner')}}</th>
                                    <th width="50px">{{ __('Location')}}</th>
                                    <th width="50px">{{ __('URL')}}</th>
                                    <th width="100px">{{ __('Start Date')}}</th>
                                    <th width="100px">{{ __('End Date')}}</th>
                                    <th width="100px">{{ __('Status')}}</th>
                                    <th width="100px"> {{ __('Approved')}}</th>
                                    <th width="100px">{{ __('Action') }}</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if($rows->total() > 0)
                                    @foreach($rows as $row)
                                        <tr class="{{$row->status}}">
                                            <td class="title">
                                                <a href="#">{{$row->title}}</a>
                                            </td>
                                            <td> 
                                                @if(!empty($row->banner))
                                                    <img src="{{ $row->banner }}" style="height:30px;width:auto;object-fit:contain;" />
                                                @endif
                                            </td>
                                            <td>{{$row->location ?? ''}}</td>
                                            <td>
                                                @if (!empty($row->url))
                                                    <a target="_blank" style="color:blue;text-decoration:underline;" href="{{ $row->url }}">URL</a>
                                                @endif
                                            </td>
                                            <td>{{display_date($row->start_date) ?? ''}}</td>
                                            <td>{{display_date($row->end_date) ?? ''}}</td>
                                            <td><span class="badge badge-{{ $row->status }}">{{ $row->status }}</span></td>
                                            <td> @if($row->is_approved) 
                                                <span class="badge badge-success"> {{ __('Approved')}} </span>
                                                @else
                                                <span class="badge badge-danger"> {{ __('Not-Approved') }} </span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="option-box">
                                                    <ul class="option-list">
                                                        <li><a href="#" target="_blank" data-text="{{ __("View Ad") }}" ><span class="la la-eye"></span></a></li>
                                                        <li><a href="#" data-text="{{ __("Edit Ad") }}"><span class="la la-pencil"></span></a></li>
                                                        <li><a href="#" data-text="{{ __("Delete Ad") }}" class="bc-delete-item" data-confirm="{{__("Do you want to delete?")}}"><span class="la la-trash"></span></a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="9">{{__("No data")}}</td>
                                    </tr>
                                @endif

                                </tbody>
                            </table>
                        </div>

                        <div class="ls-pagination">
                            {{$rows->appends(request()->query())->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
