<?php $__env->startComponent('mail::message'); ?>
# รายละเอียดการขอจองอ่านหนังสือ

เรียนเจ้าหน้าที่ห้องสมุด ขณะนี้ได้มีผู้จองอ่านหนังสือเข้ามาซึ่งมีรายละเอียดดังต่อไปนี้<br>

ชื่อหนังสือ: <?php echo e($reading->book_title); ?><br>
ผู้แต่ง: <?php echo e($reading->book_author); ?><br>
ผู้ขอจองอ่าน: <?php echo e($reading->firstname . ' ' . $reading->lastname); ?><br>
อีเมล์ติดต่อกลับ: <a href="mailto:<?php echo e($reading->email); ?>?subject=ติดต่อจากทีมงานห้องสมุดเรื่อง <?php echo e($reading->book_title); ?>ที่คุณจองอ่าน"><?php echo e($reading->email); ?></a><br>
หากต้องการจัดการกับข้อมูลสามารถเข้าไปได้ตามลิ้งก์ชื่อหนังสือด้านล่างนี้

<?php $__env->startComponent('mail::button', ['url' => url("/reading/person/{$reading->id}")]); ?>
<?php echo e($reading->book_title); ?>

<?php echo $__env->renderComponent(); ?>

ขอบคุณ<br>
ระบบติดต่ออ่านหนังสือ ห้องสมุดคนตาบอดและผู้พิการทางสื่อสิ่งพิมพ์แห่งชาติ
<?php echo $__env->renderComponent(); ?>
