<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$config['leftnews'] = array(
	0 => array(
		'name'		=> 'CATATAN DARI MEJA PENDETA',
		'cat_id'	=> '1',
		'limit'		=> '4'
	),

	1 => array(
		'name'		=> 'BERITA MAJELIS SINODE GPIB',
		'cat_id'	=> '14',
		'limit'		=> '4'
	),

	2 => array(
		'name'		=> 'INFORMASI SEKRETARIAT',
		'cat_id'	=> '4',
		'limit'		=> '4'
	),
);

$config['rightnews'] = array(
	0 => array(
		'name'		=> 'BERITA GPIB IMMANUEL PEKANBARU',
		'parent_id'	=> '5',
		'cat_id'	=> '7',
		'limit'		=> '8'
	),

	1 => array(
		'name'		=> 'JEMAAT SAKIT DAN MOHON DUKUNGAN DOA',
		'cat_id'	=> '7',
		'limit'		=> '4'
	),
);