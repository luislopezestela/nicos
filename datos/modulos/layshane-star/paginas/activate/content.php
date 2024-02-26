<?php
if ($wo['loggedin'] == true) {
   header("Location: " . $wo['config']['site_url']);
   exit();
} else {
  if (isset($_GET['link2'])) {
   if ($_GET['link2'] == 'success') {
?>
<div class="text-center">
   <h2><?php echo $wo['lang']['your_account_activated'];?></h2>
   <div class="account-activate-icon"><i class="fa fa-check-circle"></i></div>
   <h4><?php echo str_replace('{login}', $wo['lang']['login'], $wo['lang']['free_to_login']);?></h4>
</div>
<?php
    } else {
      header("Location: " . lui_SeoLink('index.php?link1=welcome'));
      exit();
    }
  } else if (isset($_GET['email'], $_GET['code']) === true) {
      $email = $_GET['email'];
      $code  = $_GET['code'];
      if (lui_EmailExists($email) === false) {
        header("Location: " . lui_SeoLink('index.php?link1=welcome'));
        exit();
      } else if (lui_ActivateUser($email, $code) === false) {   
        header("Location: " . lui_SeoLink('index.php?link1=welcome'));   
        exit();   
      } else {
        $session = lui_CreateLoginSession(lui_UserIdFromEmail($email));
        $_SESSION['user_id'] = $session;
        setcookie(
            "user_id",
            $session,
            time() + (10 * 365 * 24 * 60 * 60)
        );
        setcookie("user_id", $session, time() + (10 * 365 * 24 * 60 * 60));
        if (!empty($wo['config']['auto_friend_users'])) {
            $autoFollow = lui_AutoFollow(lui_UserIdFromEmail($email));
        }
        if (!empty($wo['config']['auto_page_like'])) {
            lui_AutoPageLike(lui_UserIdFromEmail($email));
        }
        if (!empty($wo['config']['auto_group_join'])) {
            lui_AutoGroupJoin(lui_UserIdFromEmail($email));
        }
        header("Location: " . lui_SeoLink('index.php?link1=start-up'));
        exit();
      }
  } else {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
  }
}
?>