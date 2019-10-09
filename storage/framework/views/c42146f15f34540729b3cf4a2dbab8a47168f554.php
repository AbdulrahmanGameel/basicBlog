<?php $__env->startSection('content'); ?>
<h1>Posts</h1>
<?php if(count($posts)): ?>

<ul class="list-group ">
    <?php if(count($posts)>0): ?>
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="well">
        <li class="list-group-item">

            <div class="row">
                <div class="col-md3 col-sm-3">
                <img style="width:100%" class="" src="/storage/cover_images/<?php echo e($post->image); ?>" alt="<?php echo e($post->image); ?>">
                </div>
                <div class="col-md8 col-sm-8">
                    <h4>
                        <a href=" posts/<?php echo e($post->id); ?>"><?php echo $post->title; ?></a>
                    </h4>
                    <p><?php echo $post->body; ?></p>
                    
                    <small>written <?php echo e($post->created_at); ?>, Last Edited <?php echo e($post->updated_at); ?> By:
                            <?php echo e($post->user->name); ?>

                    </small>
                </div>
            </div>

        

        </li>

    </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php echo e($posts->links()); ?>

    <?php else: ?>
    <div class="alert text-center alert-danger" role="alert">
        No Posts Found!!
    </div>
    <?php endif; ?>
</ul>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lsapp\resources\views/posts/index.blade.php ENDPATH**/ ?>