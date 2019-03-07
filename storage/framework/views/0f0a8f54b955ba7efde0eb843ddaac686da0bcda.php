

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <h1><?php echo app('translator')->getFromJson('Reading.contact'); ?></h1>
                <ul>
                <li><a href="<?php echo e(action('Reading\PersonController@create')); ?>"><?php echo app('translator')->getFromJson('Reading.ReadingForm'); ?></a></li>
                </ul>
                </div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <h2><?php echo app('translator')->getFromJson('Reading.list'); ?></h2>
                    <?php if(isset($person)): ?>
                    <table class="table">
                    <th><?php echo app('translator')->getFromJson('Reading.dateheader'); ?></th><th><?php echo app('translator')->getFromJson('Reading.titleheader'); ?></th><th><?php echo app('translator')->getFromJson('Reading.statusheader'); ?></th>
                    <?php $__currentLoopData = $person; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    <td><?php echo e($date->parse($data->created_at)->toFormattedDateString() . ' ' . $date->parse($data->created_at)->toTimeString()); ?></td>
                    <td><a href="<?php echo e(action('Reading\PersonController@show', ['id' => $data->id])); ?>"><?php echo e($data->book_title); ?></a></td>
                    <td><?php echo e($data->status->name); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                    <?php else: ?>
                    <p>
                    <?php echo app('translator')->getFromJson('Reading.notfound'); ?>
                    </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>