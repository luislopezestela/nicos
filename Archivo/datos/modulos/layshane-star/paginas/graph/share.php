<div class="page-margin">
    <div class="row wo_my_pages">
		<div class="col-md-12"><?php echo lui_LoadPage('graph/sidebar') ?></div>
        <div class="col-md-12">
            <div class="page-margin wow_content">
                    <ol style="list-style: initial;">
                        <li>Place the following code on your site, under the <?php echo htmlspecialchars('<head>') ?> tag: <br><br>
                        <pre>
<?php echo htmlspecialchars('<script>') ?>

function OpenWindow(url, windowName) {
   newwindow = window.open('<?php echo $wo['config']['site_url'] ?>/sharer?url=' + url, windowName, 'height=600,width=800');
   if (window.focus) {
      newwindow.focus();
   }
   return false;
}
<?php echo htmlspecialchars('</script>') ?>
                        </pre><br></li>
                        <li>Once placed, pass your site url to the function, example: <br><br>
                        <pre>
<?php echo htmlspecialchars('<button onclick="OpenWindow(\'http://yoursite.com/\')">Click me</button>') ?></pre><br></li>
                        <li>Example for test: <button class="btn btn-main btn-mat btn-mat-raised" onclick="OpenWindow('<?php echo $wo['config']['site_url'] ?>/sharer?url=<?php echo urlencode($wo['config']['site_url']) ?>');">Click me</button></li>
                    </ol>
            </div>
        </div>
    </div>
</div>

<script>
function OpenWindow(url, windowName) {
   newwindow = window.open(url, windowName, 'height=600,width=800');
   if (window.focus) {
      newwindow.focus();
   }
   return false;
}
</script>