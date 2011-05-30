<?php
/**
 * Enter description here ...
 * @author s.buckpesch
 *
 */
class WordpressData {
	
	private $debug = false;
	
	/**
	 * Enter description here ...
	 * @param String $test ...
	 */
	public function __construct(){

	
	}
	
	
	/**
	* Returns all values of the current wordpress post. Includes all custom fields as well.
	* @return Array Contains all available fields for the current wordpress post
	*/
	public function getCurrentPost(){		
		global $global;
		
		// Get Post data
		$sql = "SELECT * 
				FROM `wp_posts` 
				WHERE `post_date`< NOW() AND `post_type`='dailypresent' AND `post_status`='publish'
				ORDER BY `post_date` DESC 
				LIMIT 1";
		$post = $global->db->fetchRow($sql);

		// Get postmeta data and custom fields
		$sql = "SELECT meta_key, meta_value
				FROM `wp_postmeta`
				WHERE post_id = " . $post['ID'];
		$postmeta = $global->db->fetchAll($sql);
		
		foreach ($postmeta as $arrValue) {
			$post[$arrValue['meta_key']] = $arrValue['meta_value'];
		}
		
		return $post;
	}
	
}