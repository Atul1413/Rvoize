<script src="<?php echo e(asset('libs/jquery-3.6.0.min.js')); ?>"></script>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    let $currency = '<?php echo e(strtoupper($payment['currency'])); ?>';
    let $amount = '<?php echo e($payment['amount']); ?>';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
        }
    });
    var options = {
        "key": "<?php echo e($key); ?>",
        "amount": <?php echo e(($payment['converted_amount'] > 0) ? ($payment['converted_amount'] * 100) :
        $payment['amount'] * 100); ?>,

        "currency": "<?php echo e(($payment['converted_currency'] != '') ? strtoupper($payment['converted_currency']) : strtoupper($payment['currency'])); ?>",
        "name": '<?php echo e(setting_item("site_title")." - #".$payment->id); ?>',
        "description": '<?php echo e(setting_item("site_title")." - #".$payment->id); ?>',
        "image": "",
        "order_id": "<?php echo e($r); ?>",
        "handler": function (response){
                let data = response;
                data['_token'] = '<?php echo e(csrf_token()); ?>'
            $.ajax({
                url: '<?php echo e($form_url); ?>',
                type: 'post',
                data: data,
                datatype: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                success: function (msg) {
                    window.location.href = msg;
                }
            });
        },
        "prefill": {
            "name": "<?php echo e($payment->first_name . ' ' . $payment->last_name); ?>",
            "email": "<?php echo e($payment->email); ?>",
            "contact": ""
        },
        "notes": {
            "address": ""
        },
        "modal": {
            "ondismiss": function(){
                window.location.replace("<?php echo e($cancelUrl); ?>");
            }
        }
    };
    if($currency != 'INR')
    {
        options['display_amount'] = $amount;
        options['display_currency'] = $currency;
    }
    var rzp1 = new Razorpay(options);
    rzp1.open();
</script>
<?php /**PATH /home/customer/www/rvoize.com/public_html/plugins/PaymentRazorPay/Views/frontend/razorpaycheckout.blade.php ENDPATH**/ ?>