<?php
/**
 * Garuda Framework Pro Edition 
 *
 * @package  GF-Pro
 * @author   Lamhot Simamora < lamhotsimamora36@gmail.com >
 */
$_SESSION['sys_run_app'] ?? exit('403 You dont have permission to access / on this server...');

return $app_production = array(
								'maintenance'  		=> false,
								'file_maintenance' 	=> 'maintenance',
								'notice_error' 		=> true,
								'time_zone'	   		=> 'Asia/Jakarta',
								'uri_parameter'		=> 'p',
								'start_benchmark'   => true);
