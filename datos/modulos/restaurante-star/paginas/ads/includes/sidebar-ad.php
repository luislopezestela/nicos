<ul class="list-group sidebar-ad-wrapper pointer rads-<?php echo $wo['sidebar-ad']['bidding']; ?>" id="<?php echo $wo['sidebar-ad']['id']; ?>">
    <li class="sidebar-ad-header sidebar-title-back"><?php echo $wo['lang']['sponsored'] ?></li>
    <div class="sidebar-ad-body">
        <img src="<?php echo $wo['sidebar-ad']['ad_media']; ?>" alt="Picture">
    </div>
    <div class="sidebar-ad-footer">
        <p class="ad-title">
            <?php echo $wo['sidebar-ad']['headline']; ?>
        </p>
        <p class="small ad-descrition ">
            <?php echo $wo['sidebar-ad']['description']; ?>
        </p>
        <time>
            <a href="<?php  echo $wo['sidebar-ad']['url'];?>" class="main" target="_blank">
                <?php echo lui_UrlDomain($wo['sidebar-ad']['url']); ?>
            </a>
        </time>
    </div>
</ul>