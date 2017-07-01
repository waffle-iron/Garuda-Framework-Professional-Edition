<?php
/**
 * Garuda Framework Pro Edition 
 *
 * @package  GF-Pro
 * @author   Lamhot Simamora < lamhotsimamora36@gmail.com >
 */




	defined('sys_run_app') OR exit('403 You dont have permission to access / on this server...');

	class Template_HTML
	{
		
		private $title;
		private $icon ;

		private $css;
		private $meta;

		private $path_image;


		public function setTitle($value=null)
		{
			$this->title = $value;
		}

		public function setIcon($value= "test.png")
		{

			$this->icon = $value;
		}

		private function setPathImage()
		{
			$this->path_image = __full_url__.'app/storage/';
		}

		
		public function setCSS($value=null)
		{
			if ($value != null)
			{

				$this->css = '<style>'.$value.'</style>';
			}
			else
			{
				$this->css = '';
			}
			
		}

		public function setMeta($meta_html = array())
		{
			$this->setPathImage();
			$result  = '<meta name="og:image" 		content="'.$this->path_image.$meta_html['image'].'" />
						<META name="ROBOTS" 		content="index" />
						<meta name="image" 			content="'.$this->path_image.$meta_html['image'].'" />
						<meta name="og:description" content="'.$meta_html['description'].'" />
						<meta name="og:url" 		content="'.__full_url__.'" />
						<meta name="og:title" 		content="'.$meta_html['title'].'" />
						<meta name="Description" 	content="'.$meta_html['description'].'" />
						<meta name="Author" 		content="'.$meta_html['author'].'" />
						<meta name="copyright" 		content="'.$meta_html['copyright'].'" />
						<meta name="language" 		content="Indonesian, English" />
						<meta name="distribution" 	content="Global" />
						<meta name="rating" 		content="General" />
						<meta name="expires" 		content="1800" /> ';

		   $this->meta = $result;
		}

	

		public function render()
		{

			
			echo '<!DOCTYPE html>
					<html lang="en">
					<head>
					'.$this->meta.'
					<link rel="shortcut icon" type="image/png" href="'.__view_url__.'vendor/icon/'.$this->icon.'"/>
					<link rel="shortcut icon" type="image/png" href="'.__view_url__.'vendor/icon/'.$this->icon.'"/>
					<meta charset="UTF-8">
					<meta name="viewport" content="width=device-width, initial-scale=1">
			        <title>'.$this->title.'</title>'
			        ._importJQuery().'
			        '._importSweetAlert().'
			    	'._importGF().'<script> var full_url = "'.__full_url__.'"; </script>
					'._importBootstrap().''
					.$this->css.'</head><body>';
		}

		
}

function  _closeBody()
{
return '</body></html>';
}
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




function _importCKEditor()
{
	return _importJS('vendor/editor/ckeditor.js').
		   _importJS('vendor/editor/js/sample.js').
		   _importCSS('vendor/editor/css/samples.css').
		   _importCSS('vendor/editor/toolbarconfigurator/lib/codemirror/neo.css');
}

function _importSweetAlert(){
	$sweetAlertCSS = "vendor/js/sweetalert/sweetalert.css";
	$sweetAlertJS = "sweetalert-dev.js";
	return '<script src="'.__view_url__.'vendor/js/sweetalert/'.$sweetAlertJS.'"></script>'._importCSS($sweetAlertCSS);
}
 function _importBootstrap()
 {
 
 	return 	_importCSS("vendor/css/bootstrap/css/bootstrap.css").
 			_importCSS("vendor/css/bootstrap/css/bootstrap-min.css").
 			_importJS('vendor/css/bootstrap/js/bootstrap.js');
 }

function _importJQuery()
{
	$jquery_1 = "jquery-3.2.1.js";
	$jquery_2 = "jquery-3.2.1.min.js";
	
	return '<script src="'.__view_url__.'vendor/js/jquery/'.$jquery_1.'"></script>
	        <script src="'.__view_url__.'vendor/js/jquery/'.$jquery_2.'"></script>';
 }


function _importGF(){
	return  _importJS('vendor/js/gf/GF-1.js');
}


/*
*
*/

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

