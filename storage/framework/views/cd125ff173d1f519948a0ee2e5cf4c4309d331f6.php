                <div class="form-group">
                <label for="search" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('bookmessages.search'); ?></label>
                <div class ="col-md-6">
                <input type="text" class="form-control" id="search" name="search" value="<?php echo e(old('search')); ?>">
                </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="selectoption" id="selectoption"><?php echo app('translator')->getFromJson('bookmessages.searchOption'); ?></label>
                    <div class="col-md-6">
                    <select class="form-control" name="selectoption" id="selectoption">
                    <option value="booktitle"
                    <?php if($option == 'booktitle'): ?>
                    selected = "selected"
                    <?php endif; ?>><?php echo app('translator')->getFromJson('bookmessages.booktitle'); ?></option>
                    <option value="author"
                    <?php if($option == 'author'): ?>
                    selected = "selected"
                    <?php endif; ?>><?php echo app('translator')->getFromJson('bookmessages.searchAuthor'); ?></option>
                    <option value="readby"
                    <?php if($option == 'readby'): ?>
                    selected = "selected"
                    <?php endif; ?>><?php echo app('translator')->getFromJson('bookmessages.searchReadby'); ?></option>
                    <?php if (app('laravel-acl.directives.role')->handle('admin')): ?>
                    <option value="remark"
                    <?php if($option == 'remark'): ?>
                    selected="selected"
                    <?php endif; ?>><?php echo app('translator')->getFromJson('bookmessages.searchremark'); ?></option>
                    <?php endif; ?>
                    </select>
                    </div>
                    </div>
                
                <div class="form-group">
                <div class="col-md-8 col-offset-4">
                <button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson('bookmessages.search'); ?></button>
                </div>
                </div>
