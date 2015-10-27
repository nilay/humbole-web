<?php namespace App\External\Cms;
/**
 * Fetch posts directly from CMS backend (Wordpress) to generate simtemap.xml
 */
 
 class Content
 {
 	
 	private $con;
 	
 	public function __construct()
 	{
 		$this->con = mysqli_connect(env('CMS_DB_HOST'),env('CMS_DB_USER'),env('CMS_DB_PASSWORD'),env('CMS_DB_NAME'));
 		if (mysqli_connect_errno())
		{
		  throw new \Exception("Failed to connect to MySQL: " . mysqli_connect_error());
		}
 	}
 	public function getCmsContents()
 	{	$posts = [];
 		$resultSet = mysqli_query($this->con, "select id, post_name, post_title, post_modified_gmt from wp_posts where post_status='publish' and post_type='post' order by post_modified");
 		if(!$resultSet)
 		{
 			throw new \Exception("Error executing mysql query");
 		}
 		while ($post = mysqli_fetch_object($resultSet))
 		{
 			$posts[] = $post;
 		}
 		/* free result set */
		mysqli_free_result($resultSet);
 		
 		
 		$cms = new \stdClass();
 		$cms->posts = $posts;
 		
 		return $cms;
 	}
	
	public function updateShareCount($post_id){		
		$resultSet = mysqli_query($this->con, "UPDATE `wp_posts` SET `share_count` = `share_count` + 1 WHERE `id` = '$post_id';");
	}
	
	public function updateViewCount($post_id){		
		$resultSet = mysqli_query($this->con, "UPDATE `wp_posts` SET `view_count` = `view_count` + 1 WHERE `id` = '$post_id';");
	}
	
	public function getShareCount($post_id){		
		$resultSet = mysqli_query($this->con, "select share_count from wp_posts WHERE `id` = '$post_id';");
		if(!$resultSet)
 		{
 			throw new \Exception("Error executing mysql query");
 		}
		
		$shares = mysqli_fetch_object($resultSet);
		mysqli_free_result($resultSet);
		if(empty($shares->share_count)){
			return 0;
		}
		
		return $shares->share_count;
	}
 	
 }
