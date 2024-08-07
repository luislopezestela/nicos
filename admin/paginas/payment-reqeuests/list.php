<tr id="UserID_<?php echo $wo['userlist']['id']?>" data-user-id="<?php echo $wo['userlist']['user']['user_id']?>" data_selected="<?php echo $wo['userlist']['id']?>">
   <td><input type="checkbox" id="check-data-<?php echo $wo['userlist']['id']?>" class="delete-checkbox filled-in"><label for="check-data-<?php echo $wo['userlist']['id']?>"></label></td>
   <td><?php echo $wo['userlist']['id']?></td>
   <td>
      <a href="<?php echo $wo['userlist']['user']['url']; ?>">
      <img src="<?php echo $wo['userlist']['user']['avatar']; ?>" class="setting-avatar" alt="<?php echo $wo['userlist']['user']['avatar']?> Profile Picture">
      <?php echo $wo['userlist']['user']['name']; ?>
      </a>
      <span class="pointer toggle-verification-request" onclick="Wo_ToggleVerfRequest(<?php echo $wo['userlist']['id']; ?>,this)">
         <i class="fa fa-caret-down" aria-hidden="true"></i>
      </span>
   </td>
   <td><?php echo $wo['userlist']['user']['paypal_email'];?></td>
   <td>$<?php echo $wo['userlist']['amount'];?></td>
   <td><a href="<?php echo lui_LoadAdminLinkSettings('referrals-list?id=' . $wo['userlist']['user_id']); ?>">Mostrar</a></td>
   <td>
   <?php 
   if ($wo['userlist']['status'] == 0) {
      echo '<span class="label label-warning">Pendiente</span>';
   } else 
   if ($wo['userlist']['status'] == 1) {
      echo '<span class="label label-success">Aprobado</span>';
   } else
   if ($wo['userlist']['status'] == 2) {
      echo '<span class="label label-danger">Rechazado</span>';
   }
   ?></td>
   <td>
      <button onclick="Wo_MarkPaid(<?php echo $wo['userlist']['id']?>,'hide');" type="button" class="btn bg-success admn_table_btn">Pagado</button>
      <button onclick="Wo_DeclinePayment(<?php echo $wo['userlist']['id']?>,'hide');" type="button" class="btn bg-danger admn_table_btn">Rechazar</button>
   </td>
</tr>
<tr id="review-verif-request-info-<?php echo $wo['userlist']['id']; ?>" style="display: none;">
   <td colspan="4">
      <div class="row">
           <div class="col-md-8">
               <div class="card">
                   <div class="card-body">
                       <div class="row">
                           <div class="col-md-6">
                            <?php if ($wo['userlist']['type'] == 'bank') { ?>
                                <p>
                                   <span class="badge bg-success-bright">Tipo de metodo</span>
                                </p>
                                <p>Bank</p>
                                <p>
                                   <span class="badge bg-success-bright text-success">IBAN</span>
                               </p>
                               <p><?php echo $wo['userlist']['iban']; ?></p>
                               <p>
                                   <span class="badge bg-info-bright text-info">Pais</span>
                               </p>
                               <p><?php echo $wo['userlist']['country']; ?></p>
                               <p>
                                   <span class="badge bg-info-bright text-info">Nombre completo</span>
                               </p>
                               <p><?php echo $wo['userlist']['full_name']; ?></p>
                               <p>
                                   <span class="badge bg-info-bright text-info">codigo SWIFT</span>
                               </p>
                               <p><?php echo $wo['userlist']['swift_code']; ?></p>
                               <p>
                                   <span class="badge bg-info-bright text-info">DIRECCION</span>
                               </p>
                               <p><?php echo $wo['userlist']['address']; ?></p>
                            <?php }else{ ?>
                                <p>
                                   <span class="badge bg-success-bright">Tipo de metodo</span>
                                </p>
                                <?php if ($wo['userlist']['type'] == 'custom') { ?>
                                    <p><?php echo($wo['config']['custom_name']) ?></p>
                                <?php }else{ ?>
                                    <p><?php echo(ucfirst($wo['userlist']['type'])) ?></p>
                                <?php } ?>
                                <p>
                                   <span class="badge bg-success-bright text-success">Informacion</span>
                                </p>
                                <p><?php echo $wo['userlist']['transfer_info']; ?></p>
                            <?php } ?>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
      </div>
   </td>
</tr>
