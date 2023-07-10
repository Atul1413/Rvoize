
<?php $__env->startSection('head'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('dist/frontend/css/contact.css')); ?>">
	<style type="text/css">
		.bravo-contact-block .section{
			padding: 80px 0 !important;
		}
	</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div id="bravo_content-wrapper">
	<?php echo $__env->make("Contact::frontend.blocks.contact.index", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/rvoize.com/public_html/modules/Contact/Views/index.blade.php ENDPATH**/ ?>