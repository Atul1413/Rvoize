<!-- Other Options -->
<div class="other-options">
    <div class="social-share">
        <h5>{{ __("Share this job") }}</h5>
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ $row->getDetailUrl() }}&amp;title={{ $translation->title }}" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i> {{ __("Facebook") }}</a>
        <a href="https://twitter.com/share?url={{ $row->getDetailUrl() }}&amp;title={{ $translation->title }}" target="_blank" class="twitter"><i class="fab fa-twitter"></i> {{ __("Twitter") }}</a>
        <!--<a href="http://pinterest.com/pin/create/button/?url={{ $row->getDetailUrl() }}&description={{ $translation->title }}" target="_blank" class="google"><i class="fab fa-pinterest"></i> {{ __("Pinterest") }}</a>-->
        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $row->getDetailUrl() }}&title={{ $translation->title }}" target="_blank" class="linkedin"><i class="fab fa-linkedin"></i> {{ __("LinkedIn") }}</a>
        
        <a href="#" onclick="copyLink()" class="google"><i class="far fa-copy"></i> {{ __("Copy Link") }}</a>
    </div>
</div>


<script>
    function copyLink() {
        const link = "{{ $row->getDetailUrl() }}";
        const tempInput = document.createElement("input");
        tempInput.value = link;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);
        // You can add additional logic here, such as displaying a success message
    }
</script>

