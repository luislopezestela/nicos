<div class="wo_ad_header_format list-group-funding sidebar-ad-wrapper-funding pointer rads-<?php echo $wo['sidebar-ad']['bidding']; ?>" id="<?php echo $wo['sidebar-ad']['id']; ?>">
    <div class="sidebar-ad-header-funding sidebar-title-back-funding sponsored"><?php echo $wo['lang']['sponsored'] ?></div>
    <div class="sidebar-ad-body-funding imgs">
        <img src="<?php echo $wo['sidebar-ad']['ad_media']; ?>" alt="Picture">
    </div>
    <div class="sidebar-ad-footer-funding details">
        <p class="ad-title-funding">
            <?php echo $wo['sidebar-ad']['headline']; ?>
        </p>
        <p class="small ad-descrition-funding ">
            <?php echo $wo['sidebar-ad']['description']; ?>
        </p>
        <time>
            <a href="<?php  echo $wo['sidebar-ad']['url'];?>" class="main-funding" target="_blank">
                <?php echo lui_UrlDomain($wo['sidebar-ad']['url']); ?>
            </a>
        </time>
    </div>
</div>