<?php $__env->startSection('content'); ?>

<a href="/posts" class="btn btn-secondary"> Go Back</a>
<br>
<br>
<div class="post-head">
    <h2><?php echo $post->title; ?></h1>
</div>

<div class="container post-body">
    <h4><?php echo $post->body; ?></h1>
</div>

<hr>
<small class="muted">written <?php echo e($post->created_at); ?>, Last Edited <?php echo e($post->updated_at); ?>  By: <?php echo e($post->user->name); ?></small>
<hr>
<?php if(!Auth::guest()&& (Auth::user()->id==$post->user->id)): ?>
<a href="/posts/<?php echo e($post->id); ?>/edit" class="btn btn-outline-secondary">EDIT</a>

<?php echo Form::open(['action'=> ['PostsController@destroy',$post->id], 'method'=>'POST', 'class'=>'float-right' ]); ?>

    <?php echo e(Form::hidden('_method','DELETE')); ?>

    <?php echo e(Form::submit('Delete', ['class' => 'btn-danger btn'])); ?>

<?php echo Form::close(); ?>  
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lsapp\resources\views/posts/view.blade.php ENDPATH**/ ?>