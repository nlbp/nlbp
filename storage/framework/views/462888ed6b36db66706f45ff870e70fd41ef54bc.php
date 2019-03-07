<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <h1>Nlbp data</h1>
                </div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    
                    <h1><?php echo app('translator')->getFromJson('SearchMessages.BookLatest'); ?></h1>
                <?php $__currentLoopData = $book; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($data->book->book_set == 1): ?>
                <h3><a href="<?php echo e(url('search', ['id' => $data->book->aid])); ?>"><?php echo e($data->btitle); ?> <?php echo app('translator')->getFromJson('bookmessages.bookset'); ?></a></h3>
                <?php else: ?>
                <h3><a href="<?php echo e(url('search', ['id' => $data->book->aid])); ?>"><?php echo e($data->btitle); ?></a></h3>
                <?php endif; ?>
                <ul>
                <?php if($data->bdatein ==! null): ?>
                <li><?php echo app('translator')->getFromJson('bookmessages.datein', ['date' => $data->bdatein]); ?></li>
                <?php endif; ?>
                <?php if($data->bauthor ==! null): ?>
                <li><?php echo app('translator')->getFromJson('bookmessages.author', ['name' => $data->bauthor]); ?></li>
                <?php endif; ?>
                <?php if($data->btranslate ==! null): ?>
                <li><?php echo app('translator')->getFromJson('bookmessages.translate', ['name' => $data->btranslate]); ?></li>
                <?php endif; ?>
                <?php if($data->bpublish ==! null): ?>
                <li><?php echo app('translator')->getFromJson('bookmessages.publish', ['name' => $data->bpublish]); ?></li>
                <?php endif; ?>
                <?php if($data->bread ==! null): ?>
                <li><?php echo app('translator')->getFromJson('bookmessages.readby', ['name' => $data->bread]); ?></li>
                <?php endif; ?>
                </ul>
                <?php echo e($data->bdetail); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>