<div class="users-profiles">
<?php
if ($wo['config']['profile_privacy'] == 1) {
  $users = lui_WelcomeUsers(8,'welcome');
  foreach ($users as $key => $wo['user']) {
  	 $wo['key'] = $key + 1;
  	 echo lui_LoadPage('welcome/welcome-users-list');
  }
}
?>
</div>