<style>
:root{
    --header-background:<?php echo $wo['config']['header_background'];?>;
    --body-background:<?php echo $wo['config']['body_background']?>;
    --body-color:#333;
}
<?php
if (!empty($wo['reactions_types'])) {
    foreach ($wo['reactions_types'] as $key => $value) {
?>
.reaction-<?php echo $value['id'];?>::before {
    content: "<?php echo $value['name'];?>";
}
<?php } } ?>
.loading::before {background-color: <?php echo $wo['config']['btn_background_color'];?>;}

#notification-popup {
    position: fixed;
    left: 20px;
    width: 300px;
    bottom: 20px;
    z-index: 10000;
}
#notification-popup .notifications-popup-list:empty {
    padding: 0;
}
#notification-popup .notifications-popup-list {
    position: relative;
    background:  <?php echo $wo['config']['header_hover_border'];?> !important;
    border-radius: 10px;
    padding: 6px;
    width: 100%;
    margin-bottom: 10px;
    z-index: 10000;
    box-shadow: 0 2px 4px rgb(0 0 0 / 10%);
}
#notification-popup .notifications-popup-list, #notification-popup .notifications-popup-list a, #notification-popup .notifications-popup-list .main-color, #notification-popup .notifications-popup-list svg, #notification-popup .notifications-popup-list .notification-text, #notification-popup .notifications-popup-list .notification-time {
    color: <?php echo $wo['config']['header_color'];?> !important;
}
#notification-popup .notifications-popup-list .notification-list {
    border-radius: 10px;
}
#notification-popup .notifications-popup-list .notification-list:hover {
    background: rgba(255, 255, 255, 0.1);
}
:root{
    --header-fondo:<?php echo $wo['config']['header_background'];?>;
    --header-color:<?php echo $wo['config']['header_color'];?>;
    --header-hober-borde:<?php echo $wo['config']['header_hover_border'];?>;
    --boton-fondo:<?php echo $wo['config']['btn_background_color'];?>;
    --boton-hover-fondo:<?php echo $wo['config']['btn_hover_background_color'];?>;
    --boton-color:<?php echo $wo['config']['btn_color'];?>;
    --boton-hover-color:<?php echo $wo['config']['btn_hover_color'];?>;
    --body-fondo:<?php echo $wo['config']['body_background']?>;
}
</style>