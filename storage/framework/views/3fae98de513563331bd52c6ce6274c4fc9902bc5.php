

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                                <form class="form-horizontal" role="search" method="POST" action="<?php echo e(url('/books/results')); ?>">
                <?php echo e(csrf_field()); ?>


                <?php echo $__env->make('books.searchform', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </form>
                
                <?php if( isset($book)): ?>
                <h1><?php echo app('translator')->getFromJson('bookmessages.bookindex'); ?></h1>
                <?php endif; ?>
                <?php if( isset($results)): ?>
                <h1><?php echo app('translator')->getFromJson('bookmessages.searchpage'); ?></h1>
                <?php endif; ?>
                                <ul>
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create.book')): ?>
                <li><a href="<?php echo e(url('/books/create')); ?>"><?php echo app('translator')->getFromJson('bookCreate.add'); ?></a></li>
				<?php endif; ?>
                </ul>
                                </div>
                                                  
                <div class="panel-body" role="main">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view.book')): ?>
<?php if(isset($book) && $book->total() > 0): ?>
    <p>
    <?php echo app('translator')->getFromJson('bookmessages.booktotal'); ?> <?php echo e($book->total()); ?>

    </p>
                <table class="table">
                <th><?php echo app('translator')->getFromJson('bookmessages.booknumber'); ?></th><th><?php echo app('translator')->getFromJson('bookmessages.booktitle'); ?></th><th><?php echo app('translator')->getFromJson('bookmessages.bookisbn'); ?></th><th><?php echo app('translator')->getFromJson('bookmessages.bookprod'); ?></th><th><?php echo app('translator')->getFromJson('bookmessages.bookamount'); ?></th><th><?php echo app('translator')->getFromJson('bookmessages.booktype'); ?></th><th><?php echo app('translator')->getFromJson('bookmessages.bookstatus'); ?></th><th><?php echo app('translator')->getFromJson('bookmessages.bookcategory'); ?></th><th><?php echo app('translator')->getFromJson('bookmessages.action'); ?></th>
                <?php $__currentLoopData = $book; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                <td><?php echo e($data->abnumber); ?></td><td><a href="<?php echo e(action('Books\BookController@show', ['id' => $data->aid])); ?>">
                <?php if($data->book_set == 1): ?>
                <?php echo e($data->detail['btitle']); ?> <?php echo app('translator')->getFromJson('bookmessages.bookset'); ?>
                <?php else: ?>
                <?php echo e($data->detail['btitle']); ?> 
                <?php endif; ?></a></td>
                <td><?php echo e($data->detail['bisbn']); ?></td><td><?php echo e($data->aprod); ?></td><td><?php echo e($data->aamount); ?></td><td><?php echo e($data->type['btname']); ?></td><td><?php echo e($data->status['bsstatus']); ?></td><td><?php echo e($data->detail['main']['bmmain']); ?></td><td><a class="btn btn-default" href="<?php echo e(action('Books\BookController@edit', ['id' => $data->aid])); ?>" role="button"><?php echo app('translator')->getFromJson('bookCreate.edit'); ?></a><a class="btn btn-default" href="<?php echo e(action('Books\BookController@remove', ['id' => $data->aid])); ?>" role="button"><?php echo app('translator')->getFromJson('bookCreate.remove'); ?></a></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
                                <h3><?php echo app('translator')->getFromJson('bookmessages.pages'); ?></h3>
<?php echo e($book->links()); ?>

                <?php endif; ?>

                <?php if( isset($results)): ?>
                <h2><?php echo app('translator')->getFromJson('bookmessages.results'); ?></h2>
                <?php if($results->total() > 0): ?>
                <p>
                <?php echo app('translator')->getFromJson('bookmessages.founditems', ['total' => $results->total()]); ?>
                </p>
                                <table class="table">
                <th><?php echo app('translator')->getFromJson('bookmessages.booknumber'); ?></th><th><?php echo app('translator')->getFromJson('bookmessages.booktitle'); ?></th><th><?php echo app('translator')->getFromJson('bookmessages.bookisbn'); ?></th><th><?php echo app('translator')->getFromJson('bookmessages.bookprod'); ?></th><th><?php echo app('translator')->getFromJson('bookmessages.bookamount'); ?></th><th><?php echo app('translator')->getFromJson('bookmessages.booktype'); ?></th><th><?php echo app('translator')->getFromJson('bookmessages.bookstatus'); ?></th><th><?php echo app('translator')->getFromJson('bookmessages.bookcategory'); ?></th><th><?php echo app('translator')->getFromJson('bookmessages.action'); ?></th>
                <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                <td><?php echo e($data->abnumber); ?></td><td><a href="<?php echo e(action('Books\BookController@show', ['id' => $data->aid])); ?>">
                <?php if($data->book_set == 1): ?>
                <?php echo e($data->detail['btitle']); ?> <?php echo app('translator')->getFromJson('bookmessages.bookset'); ?>
                <?php else: ?>
                <?php echo e($data->detail['btitle']); ?> 
                <?php endif; ?></a></td>
                <td><?php echo e($data->detail['bisbn']); ?></td><td><?php echo e($data->aprod); ?></td><td><?php echo e($data->aamount); ?></td><td><?php echo e($data->type['btname']); ?></td><td><?php echo e($data->status['bsstatus']); ?></td><td><?php echo e($data->detail['main']['bmmain']); ?></td><td><a class="btn btn-default" href="<?php echo e(action('Books\BookController@edit', ['id' => $data->aid])); ?>" role="button"><?php echo app('translator')->getFromJson('bookCreate.edit'); ?></a></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
                <?php else: ?>
                <?php echo app('translator')->getFromJson('SearchMessages.BookNotFound'); ?>
                <?php endif; ?>
                <?php if( $results->lastPage() > 1 ): ?>
                                <h3><?php echo app('translator')->getFromJson('bookmessages.searchpages', ['currentpage' => $results->currentPage(), 'lastpage' => $results->lastPage()]); ?></h3>
<?php echo e($results->links()); ?>

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