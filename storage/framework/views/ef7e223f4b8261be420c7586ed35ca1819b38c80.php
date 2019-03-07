

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <h1><?php echo app('translator')->getFromJson('Reading.CheckBook.Results'); ?></h1>
                </div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <?php if(isset($book)): ?>
                    <p>
                    <?php echo app('translator')->getFromJson('Reading.CheckBook.ListFoundBook'); ?>
                    </p>
                    <?php $__currentLoopData = $book; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h2><?php echo app('translator')->getFromJson('Reading.CheckBook.BookTitle'); ?> <?php echo e($data->btitle); ?></h2>
                    <p>
                    <?php echo app('translator')->getFromJson('Reading.CheckBook.BookAuthor'); ?> <?php echo e($data->bauthor); ?>

                    </p>
                    <p>
                    <?php echo app('translator')->getFromJson('Reading.CheckBook.BookPublish'); ?> <?php echo e($data->bpublish); ?>

                    </p>
                    <p>
                    <?php echo app('translator')->getFromJson('Reading.CheckBook.BookTrans'); ?> <?php echo e($data->btrans); ?>

                    </p>
                    <p>
                    <?php echo app('translator')->getFromJson('Reading.CheckBook.ReadBy'); ?> <?php echo e($data->bread); ?>

                    </p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <p>
                    <a class="btn btn-default" href="<?php echo e(url('reading/person/create')); ?>" role="button"><?php echo app('translator')->getFromJson('Reading.CheckBook.BackCreate'); ?></a>
                    </p>
                    <?php endif; ?>
                    
                    <?php if(isset($samebook)): ?>
                    <p>
                    <?php echo app('translator')->getFromJson('Reading.CheckBook.ListFoundSameBook'); ?>
                    </p>
                    <?php $__currentLoopData = $samebook; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h2><?php echo app('translator')->getFromJson('Reading.CheckBook.BookTitle'); ?> <?php echo e($data->btitle); ?></h2>
                    <p>
                    <?php echo app('translator')->getFromJson('Reading.CheckBook.BookAuthor'); ?> <?php echo e($data->bauthor); ?>

                    </p>
                    <p>
                    <?php echo app('translator')->getFromJson('Reading.CheckBook.BookPublish'); ?> <?php echo e($data->bpublish); ?>

                    </p>
                    <p>
                    <?php echo app('translator')->getFromJson('Reading.CheckBook.BookTrans'); ?> <?php echo e($data->btrans); ?>

                    </p>
                    <p>
                    <?php echo app('translator')->getFromJson('Reading.CheckBook.ReadBy'); ?> <?php echo e($data->bread); ?>

                    </p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('reading.person.step1', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endif; ?>
                    
                    <?php if(isset($person)): ?>
                    <p>
                    <?php echo app('translator')->getFromJson('Reading.CheckBook.ListFoundPerson'); ?>
                    </p>
                    <?php $__currentLoopData = $person; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h2><?php echo app('translator')->getFromJson('Reading.CheckBook.BookTitle'); ?> <?php echo e($data->book_title); ?></h2>
                    <p>
                    <?php echo app('translator')->getFromJson('Reading.CheckBook.BookAuthor'); ?> <?php echo e($data->book_author); ?>

                    </p>
                    <p>
                    <?php echo app('translator')->getFromJson('Reading.CheckBook.BookTrans'); ?> <?php echo e($data->book_trans); ?>

                    </p>
                    <p>
                    <?php echo app('translator')->getFromJson('Reading.CheckBook.BookPublish'); ?> <?php echo e($data->book_publish); ?>

                    </p>
                    <p>
                    <?php echo app('translator')->getFromJson('Reading.CheckBook.ReadByPerson'); ?> <?php echo e($data->firstname . ' ' . $data->lastname); ?>

                    </p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <p>
                    <a class="btn btn-default" href="<?php echo e(url('reading/person/create')); ?>" role="button"><?php echo app('translator')->getFromJson('Reading.CheckBook.BackCreate'); ?></a>
                    </p>
                    <?php endif; ?>
                    
                    <?php if(isset($sameperson)): ?>
                    <p>
                    <?php echo app('translator')->getFromJson('Reading.CheckBook.ListFoundSamePerson'); ?>
                    </p>
                    <?php $__currentLoopData = $sameperson; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h2><?php echo app('translator')->getFromJson('Reading.CheckBook.BookTitle'); ?> <?php echo e($data->book_title); ?></h2>
                    <p>
                    <?php echo app('translator')->getFromJson('Reading.CheckBook.BookAuthor'); ?> <?php echo e($data->book_author); ?>

                    </p>
                    <p>
                    <?php echo app('translator')->getFromJson('Reading.CheckBook.BookTrans'); ?> <?php echo e($data->book_trans); ?>

                    </p>
                    <p>
                    <?php echo app('translator')->getFromJson('Reading.CheckBook.BookPublish'); ?> <?php echo e($data->book_publish); ?>

                    </p>
                    <p>
                    <?php echo app('translator')->getFromJson('Reading.CheckBook.ReadByPerson'); ?> <?php echo e($data->firstname . ' ' . $data->lastname); ?>

                    </p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('reading.person.step1', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endif; ?>
                    
                    <?php if(empty($book)): ?>
                    <?php if(empty($person)): ?>
                    <?php if(empty($samebook)): ?>
                    <?php if(empty($sameperson)): ?>
                    <p>
                    <?php echo app('translator')->getFromJson('Reading.CheckBook.ListNotFound'); ?>
                    </p>
                    <?php echo $__env->make('reading.person.step1', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>