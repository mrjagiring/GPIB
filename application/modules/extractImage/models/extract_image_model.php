<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Extract_image_model extends CI_Model
{
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor
	}
    
    function extractImage($id, $htmlContent)
    {
		$destinationToSave = "./assets/images/excerptImages/";
		$thumbName = 'beritaID'.$id;
    		
    	//-----extract the raw text with only img tag-----
		$Content = strip_tags(html_entity_decode($htmlContent),'<img>');
		$regular_expression = '~src="[^"]*"~';
		preg_match_all( $regular_expression, $Content, $allpics );
		
		// Count the number of images found.
		$NumberOfPics = count($allpics[0]);
			
		//intialize value of the variable		
		$newFileName = ''; 
			
		if($NumberOfPics)
		{
				
			for ( $i=0; $i < 1  ; $i++ )
			{			
				$str1=$allpics[0][$i];
				$str1=trim($str1);
				$len=strlen($str1);
				$imgpath=substr_replace(substr($str1,5,$len),"",-1);
			}
					
			$originalfileName = basename($imgpath);		// Get orignal image file name with extension
			$path_parts = pathinfo($imgpath); 				
			$imageEXtension = $path_parts['extension'];	// Get image file name extension 

			$this->load->library('image_moo');
			// single thumbnail
			$this->image_moo
				->load('..' .  $imgpath)
				->resize_crop(120,80)
				->save($destinationToSave . $thumbName . '.' . $imageEXtension, TRUE);
			//if ($this->image_moo->error) print $this->image_moo->display_errors();
			/*
			$newFileName = $thumbName.'.'.$imageEXtension ; 
					
			$config['image_library'] = 'gd2';
			$config['source_image'] = '..' .  $imgpath;
			$config['new_image'] = $destinationToSave . $newFileName;
			$config['maintain_ratio'] = TRUE;
			$config['width']         = 100;
			$config['height']       = 80;

			$this->load->library('image_lib', $config);
			if(!$this->image_lib->resize())
			{
    			echo $config['source_image'] . $this->image_lib->display_errors();
			}
			$this->image_lib->clear();
			*/
		}
			
		//----- function return 1 if get any image else return 0----
		If($NumberOfPics) return $destinationToSave . $thumbName . '.' . $imageEXtension;
		else return $result = $destinationToSave . '120x80.png';
    }
}
?>