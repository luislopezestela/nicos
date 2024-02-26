<div class="modal fade" id="logged-out-modal" role="dialog" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title"><i class="fa fa-exclamation-circle"></i> <?php echo $wo['lang']['session_expired'];?></h4>
         </div>
         <div class="modal-body">
            <p><?php echo $wo['lang']['session_expired_message'];?></p>
         </div>
         <div class="modal-footer">
            <a href="<?php echo lui_SeoLink('index.php?link1=welcome');?>" type="button" class="btn btn-default"><?php echo $wo['lang']['login'];?></a>
         </div>
      </div>
   </div>
</div>