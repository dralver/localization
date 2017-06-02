<ul class="navbar-locales">
    <?php $__currentLoopData = $supportedLocales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="<?php echo e(localization()->getCurrentLocale() == $key ? 'active' : ''); ?>">
            <a href="<?php echo e(localization()->getLocalizedURL($key)); ?>" rel="alternate" hreflang="<?php echo e($key); ?>">
                <?php echo e($locale->native()); ?>

            </a>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
