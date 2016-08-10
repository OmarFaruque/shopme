<?php
/*
* Option Data Save function
*/

class ch_option{
	/*
	* Save all post data to database
	*/
	public function data_save($post){
		unset($post['submit']);
		$get_existing_option = get_option( 'ch_theme_option' );
		if(empty($get_existing_option) || !is_array($get_existing_option)){
			add_option( 'ch_theme_option', $post, '', 'yes' );
		}else{
			update_option( 'ch_theme_option', $post );
		}
	}

	/*
	* get single data from anyware using item title slug
	*/
	public function ch_get_opt($ch_option){
		$ch_get_option = get_option('ch_theme_option' ); 
		return $ch_get_option[$this->ch_stringReplace($ch_option)];
	}

	/*
	* Replace string, space & get lowarecase 
	*/
	public function ch_stringReplace($replace){
		$replace = str_replace(' ', '_', strtolower($replace));
		return $replace;
	}
	
} // End Class 