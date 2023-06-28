
<div id="ad-carousel" class="owl-carousel owl-theme p-3 my-2">
    @foreach ($banner as $ad)
        <a target="_blank" style="text-decoration:none;" href="{{ $ad['url'] }}">
            <div class="d-flex justify-content-center" style="border-radius:5px;"> 
                <div class="d-none">.</div>
                <img src="{{ $ad['banner'] }}" style="height:250px;width:auto;object-fit:contain;" alt="{{ $ad['title'] }}">
            </div>
        </a>
    @endforeach

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
