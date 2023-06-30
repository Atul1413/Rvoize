@extends('admin.layouts.app')

@section('title','All Advertisement')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("All Advertisements")}}</h1>
            {{-- <div class="title-actions">
                <a href="#" class="btn btn-primary">{{__("Add Advertisement")}}</a>
            </div> --}}
        </div>
        @include('admin.message')
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">
                @if(!empty($rows))
                    <form method="post" action="{{ route('company.advertisement.admin.bulkEdit') }}" class="filter-form filter-form-left d-flex justify-content-start">
                        {{csrf_field()}}
                        <select name="action" class="form-control">
                            <option value="">{{__(" Bulk Actions ")}}</option>
                            <option value="delete">{{__(" Delete ")}}</option>
                        </select>
                        <button data-confirm="{{__("Do you want to delete?")}}" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button">{{__('Apply')}}</button>
                    </form>
                @endif
            </div>
            <div class="col-left">
                <form method="get" action="#" class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
                    <input type="text" name="s" value="{{ Request()->s }}" placeholder="{{__('Search by Title / URL')}}" class="form-control">
                   
                    <select name="status" class="form-control">
                        <option value="">{{ __('-- Status --')}} </option>
                        <option @if((Request()->status == 'publish')) selected @endif value="publish"> {{__('Publish')}} </option>
                        <option @if((Request()->status == 'blocked')) selected @endif value="blocked"> {{__('Blocked')}} </option>
                    </select>
                   
                    <button class="btn-info btn btn-icon btn_search" type="submit">{{__('Search Ads')}}</button>
                </form>
            </div>
        </div>
        <div class="text-right">
            <p><i>{{__('Found :total items',['total'=> $rows->total()])}}</i></p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <form action="" class="bravo-form-item">
                            <div class="alert alert-info alert-block d-none" id="adApproveAlert">
                                
                            </div>
                            <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th width="60px"><input type="checkbox" class="check-all"></th>
                                    <th class="title"> {{ __('Ttile')}}</th>
                                    <th class="title"> {{ __('Banner')}}</th>
                                    <th class="title"> {{ __('URL')}}</th>
                                    <th class="title"> {{ __('Company')}}</th>
                                    <th class="title"> {{ __('Countries')}}</th>
                                    <th class="title"> {{ __('Start Date')}}</th>
                                    <th width="title"> {{ __('End Date')}}</th>
                                    <th width="title">{{  __('Status')}}</th>
                                    <th width="title">{{  __('Approved')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($rows->total() > 0)
                                    @foreach($rows as $row)
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="check-item" name="ids[]" value="{{$row->id}}">
                                            </td>
                                            <td class="title"> {{$row->title}} </td>
                                            <td>
                                                @php
                                                    $image = $row->banner()?->first()?->file_path ?? null;
                                                @endphp
                                                @if (!empty($image))
                                                    <img src="{{ asset('uploads/'.$image) }}" alt="{{ $row->title }}" style="height:50px;width:auto;obect-fit:contain;">
                                                    @else 
                                                    <span>No Image image</span>
                                                @endif
                                            </td>
                                            <td> 
                                                <a href="{{ $row->url }}" target="_blank" title="{{ $row->url }}">URL</a>
                                            </td>
                                            <td> {{ $row->companies?->name ?? '' }}</td>
                                            <td>
                                                {{ implode(', ',$row->countries?->pluck('country')?->toArray() ?? [])}}
                                            </td>
                                            <td> {{ display_date($row->start_date)}}</td>
                                            <td> {{ display_date($row->end_date)}}</td>
                                            <td><span class="badge badge-{{ $row->status }}">{{ $row->status }}</span></td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" @if($row->is_approved) checked="true" @endif data-id="{{ $row->id }}" class="ad-approve" id="{{ "approve_ad__".$row->id }}">
                                                    <label class="form-check-label" for="{{ "approve_ad__".$row->id }}"></label>
                                                  </div>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8">{{__("No data")}}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            </div>
                        </form>
                        {{$rows->appends(request()->query())->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

<script>
    const adAlert = $('#adApproveAlert');
   
    $(document).on('click','.ad-approve',function(evt) {
        adId = evt.target.id;
        adEl = $(`#${adId}`);
        if(adEl.length > 0) {
            value = adEl.is(':checked');
            adEl.attr('checked',!value);
            $.ajax({
                url: `{{ route('company.advertisement.admin.approveAd') }}`,
                data: {
                    'ad_id' : adEl.data('id'), 
                    'approve': value
                },
                dataType: 'json',
                type: 'post',
                success: function (res) {
                    if (res.status === false) {
                        superioApp.showError(res);
                        adAlert.addClass('d-none')
                    }
                    if (res.status === true) {
                        adAlert.removeClass('d-none')
                        adAlert.html('<button type="button" class="close" data-dismiss="alert">×</button> <span>' + res.message + '</span>');
                        
                    }
                },
                error: function (e) {
                    superioApp.showAjaxError(e);
                }
            });
        }
    });
</script>
    
@endpush
