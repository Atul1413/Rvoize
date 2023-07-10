<?php if($author = $row->author): ?>
    <div class="profile-card mb-4">
        <div class="seller-card">
            <div class="profile-info">
                <div class="user-profile-image">
                    <label class="profile-pict w-100">
                        <?php if($avatar_url = $author->getAvatarUrl()): ?>
                            <img class="avatar" src="<?php echo e($avatar_url); ?>" alt="<?php echo e($author->getDisplayName()); ?>">
                        <?php else: ?>
                            <span class="s-avatar-text"><?php echo e(ucfirst($author->getDisplayName()[0])); ?></span>
                        <?php endif; ?>
                    </label>
                </div>
                <div class="user-profile-label">
                    <div class="username-line"><a href="<?php echo e($author->getDetailUrl()); ?>" class="seller-link"><?php echo e($author->getDisplayName()); ?></a></div>
                    <div class="one-liner-rating-wrapper"><p class="one-liner"><?php echo e($author->address); ?></p>
                    </div>
                    <button class="btn btn-sm mt-2 contact-me d-none"><?php echo e(__("Contact Me")); ?></button>
                </div>
            </div>
            <div class="stats-desc">
                <ul class="user-stats">
                    <li><?php echo e(__("From")); ?><strong><?php echo e($author->country); ?></strong></li>
                    <li><?php echo e(__("Member since")); ?><strong><?php echo e(date_format($author->created_at , 'M Y')); ?></strong></li>
                </ul>
                <article class="seller-desc">
                    <strong><?php echo e(__("Description")); ?></strong>
                    <div class="mt-2">
                        <?php echo e($author->bio); ?>

                    </div>
                </article>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/customer/www/sahila35.sg-host.com/public_html/modules/Gig/Views/frontend/layouts/details/profile-card.blade.php ENDPATH**/ ?>