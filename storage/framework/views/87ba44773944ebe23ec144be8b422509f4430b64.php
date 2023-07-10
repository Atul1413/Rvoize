<div class="bravo-candidates">
<?php
    $title_page = setting_item_with_lang("candidate_page_list_title");
    if(!empty($custom_title_page)){
        $title_page = $custom_title_page;
    }
    $translation = $row->translateOrOrigin(app()->getLocale());
?>

<!-- Candidate Detail Section -->
    <section class="candidate-detail-section">
        <!-- Upper Box -->
        <?php echo $__env->make('Candidate::frontend.layouts.details.candidate-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="candidate-detail-outer">
            <div class="auto-container">
                <div class="row">
                    <div class="content-column col-lg-8 col-md-12 col-sm-12">
                        <?php echo $__env->make('Candidate::frontend.layouts.details.candidate-detail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
                        <div class="sidebar">
                            <?php echo $__env->make('Candidate::frontend.layouts.details.candidate-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End candidate Detail Section -->
</div>
<?php /**PATH /home/customer/www/rvoize.com/public_html/modules/Candidate/Views/frontend/layouts/detail-ver/candidate-single-v1.blade.php ENDPATH**/ ?>