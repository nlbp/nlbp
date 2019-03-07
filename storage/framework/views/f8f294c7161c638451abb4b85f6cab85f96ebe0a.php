                    <form action="<?php echo e(action('Reading\PersonController@confirm')); ?>" method="get" novalidate="novalidate" role="form">
                    <?php echo e(csrf_field()); ?>

                                        
                    <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                    <input type="hidden" name="booktitle" value="<?php echo e(old('booktitle')); ?>">
                    <input type="hidden" name="firstname" id="firstname" value="<?php echo e(old('firstname')); ?>">
                    <input type="hidden" name="lastname" id="lastname" value="<?php echo e(old('lastname')); ?>">
                    <input type="hidden" name="email" id="email" value="<?php echo e(old('email')); ?>">
                    <input type="hidden" name="phone" id="phone" value="<?php echo e(old('phone')); ?>">
                    <input type="hidden" name="bookauthor" id="bookauthor" value="<?php echo e(old('bookauthor')); ?>">
                    <input type="hidden" name="booktrans" id="booktrans" value="<?php echo e(old('booktrans')); ?>">
                    <input type="hidden" name="bookpublish" id="bookpublish" value="<?php echo e(old('bookpublish')); ?>">
                    <button class="btn btn-primary" type="submit">
                    <?php echo app('translator')->getFromJson('Reading.continue'); ?>
                    </button>
                    </div>
                    </div>
                    </form>
                    <p>
                    <a class="btn btn-default" href="<?php echo e(url('reading/person/create')); ?>" role="button"><?php echo app('translator')->getFromJson('Reading.CheckBook.BackCreate'); ?></a>
                    </p>
                    