
<div id="ad-carousel" class="owl-carousel owl-theme p-3 my-2">
    <?php $__currentLoopData = $banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a target="_blank" style="text-decoration:none;" href="<?php echo e($ad['url']); ?>">
            <div class="d-flex justify-content-center" style="border-radius:5px;"> 
                <div class="d-none">.</div>
                <img src="<?php echo e($ad['banner']); ?>" style="height:250px;width:auto;object-fit:contain;" alt="<?php echo e($ad['title']); ?>">
            </div>
        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>


<?php $__env->startPush('js'); ?>
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
<?php $__env->stopPush(); ?>
<?php /**PATH /home/customer/www/sahila35.sg-host.com/public_html/modules/Layout/parts/advertisement.blade.php ENDPATH**/ ?>