<?php
$lang = new DatosLang();
$lang->lang_files = $_POST['lang_file'];
$lang->palabra = $_POST['langs_word'];
$lang->nueva_palabra = $_POST['lang_word_data'];
$lang->change_word_new_label();
