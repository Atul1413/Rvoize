

@if (!empty($banner))

    <div class="row justify-content-center">
        <div class="col-11 col-md-8 p-md-0">
            <div id="ad-carousel" class="owl-carousel owl-theme">
                    @foreach ($banner as $ads)
                        <a target="_blank" style="text-decoration:none;" href="{{ $ads['url'] }}">
                            <div class="d-flex justify-content-center" style="border-radius:5px;"> 
                                <div class="d-none">.</div>
                                <img src="{{ $ads['banner'] }}" style="height:210px;width:auto;object-fit:fill;" alt="{{ $ads['title'] }}">
                            </div>
                        </a>
                    @endforeach
             
              </div>
           
        </div>
    </div>

@push('js')
    
<script type="text/javascript">
    $(document).ready(function(){
      

        $('#ad-carousel').owlCarousel({
            loop: true,
            margin: 10,
            // nav: true,
            dots: true,
            smartSpeed:450,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            items: 1,
        });
    });
</script>
@endpush

@endif