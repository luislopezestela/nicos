<div class="wo_ad_header_format list-group-jobs sidebar-ad-wrapper-jobs pointer rads-<?php echo $wo['sidebar-ad']['bidding']; ?>" id="<?php echo $wo['sidebar-ad']['id']; ?>">
    <div class="sidebar-ad-header-jobs sidebar-title-back-jobs sponsored"><?php echo $wo['lang']['sponsored'] ?></div>
    <div class="sidebar-ad-body imgs">
        <img src="<?php echo $wo['sidebar-ad']['ad_media']; ?>" alt="Picture">
    </div>
    <div class="sidebar-ad-footer-jobs details">
        <p class="ad-title-jobs">
            <?php echo $wo['sidebar-ad']['headline']; ?>
        </p>
        <p class="small ad-descrition-jobs ">
            <?php echo $wo['sidebar-ad']['description']; ?>
        </p>
        <time>
            <a href="<?php  echo $wo['sidebar-ad']['url'];?>" class="main-jobs" target="_blank">
                <?php echo lui_UrlDomain($wo['sidebar-ad']['url']); ?>
            </a>
        </time>
    </div>
</div>