<?php $http_header           = 'http://';
	if (!empty($_SERVER['HTTPS'])) {
	    $http_header = 'https://';
	}
	$this_url   = $http_header . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

	$this_url = str_replace('admin', 'admin-cp', $this_url);
	header("Location: $this_url");
	exit(); ?>