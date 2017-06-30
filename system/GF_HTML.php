<?php
/**
 * Garuda Framework Pro Edition 
 *
 * @package  GF-Pro
 * @author   Lamhot Simamora < lamhotsimamora36@gmail.com >
 */


use System\GF_URL as URL;


defined('sys_run_app') OR exit('403 You dont have permission to access / on this server...');


function _importCKEditor()
{
	return _importJS('vendor/editor/ckeditor.js').
		   _importJS('vendor/editor/js/sample.js').
		   _importCSS('vendor/editor/css/samples.css').
		   _importCSS('vendor/editor/toolbarconfigurator/lib/codemirror/neo.css');
}


function _importJQuery()
{
	$jquery_1 = "jquery-3.2.1.js";
	$jquery_2 = "jquery-3.2.1.min.js";
	$sweetAlert = "sweetalert-dev.js";
	return '<script src="'.__view_url__.'vendor/js/jquery/'.$jquery_1.'"></script>
	        <script src="'.__view_url__.'vendor/js/jquery/'.$jquery_2.'"></script>
					<script src="'.__view_url__.'vendor/js/sweetalert/'.$sweetAlert.'"></script>';
 }


function _importJS($path='')
{
	return '<script src="'.__view_url__.''.$path.'"></script>';
}
function _importJSOnline($url=''){
	return '<script src="'.$url.'"></script>';
}

function _importCSS($path='')
{
	return '<link href="'.__view_url__.''.$path.'" rel="stylesheet">';
}

function _javascript($val='')
{
	return '<script type="text/javascript">'.$val.'</script>';
}

function _openBody()
{
	$meta_html =  array('content' 			=> "Garuda Framework",
						'author'  			=> "Lamhot Simamora",
						'description'		=> "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
												consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
												cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
												proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
						'image'				=> __view_url__."img/GF-1-small.png",
						'keywords'			=> "Framework php, Framework javascript",
						'title' 			=> "Garuda Framework Title" ,
						'copyright' 		=> "Copyright@2017 All Right Reserved");
	return '</head><body>

			<meta name="og:image" 	content="'.$meta_html['image'].'" />
			<META name="ROBOTS" 	content="index" />
			<meta name="image" 		content="'.$meta_html['image'].'" />

			<meta name="og:description" content="'.$meta_html['description'].'" />

			<meta name="og:url" 	content="'.__view_url__.'" />

			<meta name="og:title" 	content="'.$meta_html['title'].'" />
			<meta name="Description" content="'.$meta_html['description'].'" />

			<meta name="Author" 	content="'.$meta_html['author'].'" />
			<meta name="copyright" 	content="'.$meta_html['copyright'].'" />

			<meta name="language" 	content="Indonesian, English" />
			<meta name="distribution" content="Global" />
			<meta name="rating" 	content="General" />
			<meta name="expires" 	content="1800" />';
}

function _closeBody()
{
	return '</body></html>';
}





function _title($val=null)
{


    $sweetAlert = "vendor/js/sweetalert/sweetalert.css";

	$icon    = "test.png";
	$GF_1_JS = _importJS('vendor/js/gf/GF-1.js');

	$result  =
	'<!DOCTYPE html>
		<html lang="en">
		<head>
		<link rel="shortcut icon" type="image/png" href="'.__view_url__.'vendor/icon/'.$icon.'"/>
		<link rel="shortcut icon" type="image/png" href="'.__view_url__.'vendor/icon/'.$icon.'"/>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
	        <title>'.$val.'</title>
			'._importJQuery().'
		    '.$GF_1_JS.''._importCSS($sweetAlert).'
			<script> var full_url = "'.__full_url__.'"; </script>
			'._importBootstrap();
		return $result;
}

/* Bootstrap */

function _createModal($id='',$header='',$content='',$type='')
{	
	if ($type=='large')
	{
		$set = 'lg';
	}
	else if ($type=='small')
	{
		$set = 'sm';
	}
	else
	{
		$set ='sm';
	}
	
	return '<div id="'.$id.'" class="modal fade" role="dialog">
			<div class="modal-dialog modal-'.$set.'">

				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">'.$header.'</h4>
					</div>
					<div class="modal-body">
						'.$content.'
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>

			</div>
		</div></br>';
}

 function _importBootstrap()
 {
 	return 	_importCSS("vendor/css/bootstrap/css/bootstrap.css")._importCSS("vendor/css/bootstrap/css/bootstrap-min.css")._importJS('vendor/css/bootstrap/js/bootstrap.js');
 }
