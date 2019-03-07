

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <h1><?php echo e(__('Reading.CheckBook.Title')); ?> </h1>
                </div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <p>
                    <?php echo e(__('Reading.CheckBook.Description')); ?>

                    </p>
                    <form action="<?php echo e(action('Reading\PersonController@checkBook')); ?>" method="get" novalidate="novalidate" role="form">
                    <?php echo e(csrf_field()); ?>

                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="booktitle"><?php echo e(__('Reading.CheckBook.BookTitle')); ?></label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="booktitle" id="booktitle" placeholder="<?php echo e(__('Reading.CheckBook.BookTitle')); ?>" required="required" value="<?php echo e(old('booktitle')); ?>">
                    
                    <?php if($errors->has('booktitle')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('booktitle')); ?></strong>
                                    </span>
                                <?php endif; ?>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                    <button class="btn btn-primary" type="submit">
                    <?php echo app('translator')->getFromJson('Reading.CheckBook.Submit'); ?>
                    </button>
                    </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>