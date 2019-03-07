                    <form action="<?php echo e(action('Reading\PersonController@store')); ?>" method="post" novalidate="novalidate" role="form" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    
                    <div v-if="inputActive == false"
                    class="form-group">
<span class="help-block">
                                        <strong><?php echo e(__('Reading.booktitle')); ?> <?php echo e(old('booktitle')); ?></strong>
                                    </span>
                    <div class="col-md-6">
                    <button type="button"
                    @click="inputActive = true, checkedit = 1">
                    <?php echo e(__('Reading.TitleEdit')); ?>

                    </button>
                    </div>
                    </div>
                    
                    <div v-if="inputActive == true"
                    class="form-group">
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
                    <label class="col-md-4 control-label" for="firstname"><?php echo app('translator')->getFromJson('Reading.firstname'); ?></label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="firstname" id="firstname" required="required" value="<?php echo e(old('firstname')); ?>">
                    
                    <?php if($errors->has('firstname')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('firstname')); ?></strong>
                                    </span>
                                <?php endif; ?>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="lastname"><?php echo app('translator')->getFromJson('Reading.lastname'); ?></label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="lastname" id="lastname" required="required" value="<?php echo e(old('lastname')); ?>">
                    
                    <?php if($errors->has('lastname')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('lastname')); ?></strong>
                                    </span>
                                <?php endif; ?>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="email"><?php echo app('translator')->getFromJson('Reading.email'); ?></label>
                    <div class="col-md-6">
                    <input type="email" class="form-control" name="email" id="email" required="required" value="<?php echo e(old('email')); ?>">
                    
                    <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="phone"><?php echo app('translator')->getFromJson('Reading.phone'); ?></label>
                    <div class="col-md-6">
                    <input type="tel" class="form-control" name="phone" id="phone" required="required" value="<?php echo e(old('phone')); ?>">
                    
                    <?php if($errors->has('phone')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('phone')); ?></strong>
                                    </span>
                                <?php endif; ?>
                    </div>
                    </div>
                    
                                        <div class="form-group">
                    <label class="col-md-4 control-label" for="bookauthor"><?php echo app('translator')->getFromJson('Reading.CheckBook.BookAuthor'); ?></label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="bookauthor" id="bookauthor" placeholder="<?php echo app('translator')->getFromJson('Reading.CheckBook.BookAuthor'); ?>" required="required" value="<?php echo e(old('bookauthor')); ?>">
                    
                    <?php if($errors->has('bookauthor')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('bookauthor')); ?></strong>
                                    </span>
                                <?php endif; ?>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="booktrans"><?php echo app('translator')->getFromJson('Reading.CheckBook.BookTrans'); ?></label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="booktrans" id="booktrans" placeholder="<?php echo app('translator')->getFromJson('Reading.CheckBook.BookTrans'); ?>" value="<?php echo e(old('booktrans')); ?>">
                    
                    <?php if($errors->has('booktrans')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('booktrans')); ?></strong>
                                    </span>
                                <?php endif; ?>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="bookpublish"><?php echo app('translator')->getFromJson('Reading.CheckBook.BookPublish'); ?></label>
                    <div class="col-md-6">
                    <select class="form-control" name="bookpublish" id="bookpublish" required multiple="multiple">
                    <?php $__currentLoopData = $publisher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data['name']); ?>"
                    <?php if($data['name'] == old('bookpublish')): ?>
                    selected="selected"
                    <?php endif; ?>><?php echo e($data['name']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    
                    <?php if($errors->has('bookpublish')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('bookpublish')); ?></strong>
                                    </span>
                                <?php endif; ?>
                    </div>
                    </div>
                                        
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="bookimage"><?php echo app('translator')->getFromJson('Reading.bookimage'); ?></label>
                    <div class="col-md-6">
                    <input type="file" class="form-control" name="bookimage" id="bookimage">
                    
                    <?php if($errors->has('bookimage')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('bookimage')); ?></strong>
                                    </span>
                                <?php endif; ?>
                    </div>
                    </div>
                                        
                    <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                    <input v-if="inputActive == false" type="hidden" name="booktitle" value="<?php echo e(old('booktitle')); ?>">
                    <input type="hidden" name="checkedit" :value="checkedit">
                    <button class="btn btn-primary"
                    type="submit"
                    v-if="inputActive == false">
                    <?php echo e(__('Reading.save')); ?>

                    </button>
                    <button class="btn btn-primary"
                    type="submit"
                    v-if="inputActive == true">
                    <?php echo e(__('Reading.CheckBook.Submit')); ?>

                    </button>
                    </div>
                    </div>
                    </form>
                    