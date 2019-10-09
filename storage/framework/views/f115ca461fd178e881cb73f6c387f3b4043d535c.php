<?php $__env->startSection('content'); ?>
    <h1>Create a Post</h1>

    <?php echo e(Form::open(['action'=>'PostsController@store', 'method' => 'POST', 'enctype'=>'multipart/form-data'])); ?>

    <div class="form-group">
            <?php echo e(Form::label('title','Title')); ?>

            <?php echo e(Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])); ?>    
    </div>
    <?php echo e(Form::open(['action'=>'PostsController@store', 'method' => 'POST'])); ?>

    <div class="form-group">
            <?php echo e(Form::label('body','Body')); ?>

            <?php echo e(Form::textarea('body','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Body'])); ?>

    </div>
    <div class="form-group">
        <?php echo e(Form::file('cover_image')); ?>

    </div>
    <?php echo e(Form::submit('Submit',['class'=> 'btn btn-primary'])); ?>


    <?php echo e(Form::close()); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lsapp\resources\views/posts/create.blade.php ENDPATH**/ ?>