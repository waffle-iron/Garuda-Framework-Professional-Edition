<?php
/**
 * Garuda Framework Pro Edition 
 *
 * @package  GF-Pro
 * @author   Lamhot Simamora < lamhotsimamora36@gmail.com >
 */
( session_status() == PHP_SESSION_NONE) ? session_start() : false;

$_SESSION['sys_run_app'] = 'vm1230paklzis';


$GF_PATH 		= array(
					'GF_DIR_NAME' 			=> substr(dirname($_SERVER['PHP_SELF'])
												,strrpos(dirname($_SERVER['PHP_SELF']),'/') + 1), 
					'GF_System'				=> 'GF_System',
					'GF_Production'			=> 'GF_Production',
					'GF_Helper'				=> 'GF_Helper',
					'GF_Image_Error'		=> 'GF_Image_Error',
					'GF_Anonymous' 			=> 'GF_Anonymous',
					
					'GF_STORAGE'			=> 'storage/',
					'GF_APP_DIR'    		=> 'app/',
					'GF_Router_DIR' 		=> 'router/',
					'GF_Controlelr_DIR' 	=> 'controller/',
					'GF_Helper_DIR'			=> 'helper/',
					'GF_View_DIR'           => 'view/'
														);


$GF_EXTENSION  = array(	
						'PHP' 	=> ".php",
					    'HTML' 	=> ".html",
					   					);


