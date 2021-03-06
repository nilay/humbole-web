# tweak wordpress to work with Humbole
This application uses customize wordpress application as a backend CMS. Customization was aim to add two native fields for post object for advance filteration of content.


Execute following sql against your wordpress database:

```
ALTER TABLE `wp_posts` ADD `post_gender` ENUM('universal','male','female','') NOT NULL DEFAULT 'universal' AFTER `comment_count`, ADD INDEX `gender` (`post_gender`);

ALTER TABLE  `wp_posts` ADD  `share_count` INT( 10 ) UNSIGNED NOT NULL DEFAULT  '0',
ADD  `view_count` INT( 10 ) UNSIGNED NOT NULL DEFAULT  '0';

CREATE TABLE IF NOT EXISTS `wp_groups` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `wp_groups`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `wp_groups`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;


CREATE TABLE IF NOT EXISTS `wp_group_relationships` (
  `post_id` bigint(20) NOT NULL,
  `group_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `wp_group_relationships`
  ADD PRIMARY KEY (`post_id`,`group_id`);
  
  
INSERT INTO `wp_groups` (`id`, `name`, `slug`) VALUES
(1, 'Kids', 'kids'),
(2, 'Teens', 'teens'),
(3, 'Bachelors', 'bachelors'),
(4, 'Techies', 'techies'),
(5, '40+', 'fourty-plus'),
(6, '60+', 'sixty-plus'),
(7, 'Mom', 'mom');

  
  
```


Create wp-admin/includes/groups.php file and put following code in it.

```
<?php
function wp_get_object_groups($object_id) {
	global $wpdb;
	$query = "SELECT group_id FROM wp_group_relationships where post_id = $object_id";
	$selectedGroups = $wpdb->get_results( $query );
	$selectedGroupIds = [];
	foreach($selectedGroups as $selected)
	{
		$selectedGroupIds[] = $selected->group_id;
	}
	return $selectedGroupIds;
}

function wp_get_groups() {
	global $wpdb;
	$query = "SELECT * FROM wp_groups order by name";
	return $wpdb->get_results( $query );
}

function wp_set_post_groups($post_id, $post_data){
	global $wpdb;
	$query = "delete FROM wp_group_relationships where post_id = $post_id";
	$wpdb->get_results( $query );
	
	foreach($post_data as $data){
		$wpdb->get_results( "insert into wp_group_relationships values($post_id, $data)");
	}
}

function wp_set_post_gender($post_id, $post_data){
	global $wpdb;
	$query = "update wp_posts set post_gender='$post_data' where ID = $post_id";
	$wpdb->get_results( $query );
	
}

```

Add include statement under wp-admin/includes/admin.php

```
/** Custom Groups Administration API */
require_once(ABSPATH . 'wp-admin/includes/groups.php');
```


Add following code at the end of wp-admin/includes/template.php

```
function wp_groups_checklist($post_id=null){
	$groups = wp_get_groups();
	$selectedGroups = $post_id ? wp_get_object_groups($post_id) : [];	
	
	foreach($groups as $group)
	{
		$checked = in_array($group->id, $selectedGroups) ? 'checked="checked"' : '';
		echo "<li><label class=\"selectit\"><input type=\"checkbox\" {$checked} name=\"post_groups[]\" value=\"{$group->id}\"> {$group->name} </label></li>";
	}
	
}

function wp_gender_checklist($post_gender=null){
	$gender_options = [
		'universal'=>'Universal',
		'male'=>'Male',
		'female'=>'Female'
	];
	foreach($gender_options as $key => $option)
	{
		$checked = $key == $post_gender ? 'selected="selected"' : '';
		echo "<option value='$key' {$checked} >{$option}</option>";
	}
	
}
```

Add following code in wp-admin/includes/meta-boxes.php under the end of `post_categories_meta_box` function.
```
	<?php /********* Custom code to add group field ********/?>
	<h3 class="hndle ui-sortable-handle">
		<span>Gender</span>
	</h3>
	
	<div id="gender" class="categorydiv">
		<select name="post_gender">
			<?php wp_gender_checklist($post->post_gender);?>
		</select>
	</div>


	<h3 class="hndle ui-sortable-handle">
		<span>Groups</span>
	</h3>


	<div id="group-all" class="tabs-panel">
		<ul id="<?php echo $tax_name; ?>checklist" data-wp-lists="list:<?php echo $tax_name; ?>" class="categorychecklist form-no-clear">
			<?php wp_groups_checklist( $post->ID); ?>
		</ul>
	</div>

	<?php /********* End of custom code ********/?>

```

Add following codes in wp-includes/post.php under wp_insert_post function at line number 3416 just below where wp_set_post_categories function is called


```
	/**** custom code to set groups for post ****/
	if ( isset( $postarr['post_groups'] ) ) {
		wp_set_post_groups( $post_ID, $postarr['post_groups'] );
	}

	if ( isset( $postarr['post_gender'] ) ) {
		wp_set_post_gender( $post_ID, $postarr['post_gender'] );
	}

	/***** end of custom code **********/


```

# tweak wordpress json api
First install json api Wordpress plugin.
Add following method under class JSON_API_Core_Controller in wp-content/plugins/json-api/controllers/core.php

After adding following function, you can call json api with following url param

`
/?json=get_humboles&cat_slug=jobs&group_slug=teens&gender=female&offset=0
`

```
  public function get_humboles(){
	global $wpdb;
	global $json_api;
    $url = parse_url($_SERVER['REQUEST_URI']);
    $query = wp_parse_args($url['query']);
    unset($query['json']);
    $count = @$query['count'] ? @$query['count'] : 10;
    $gender_clause='';
    $score_generator_select='wp_posts.post_modified as score';		// this will determine the post display order
    switch(@$query['gender']){
    	case "universal":
    		$gender_clause = " and wp_posts.post_gender='universal'";
    		$score_generator_select = " wp_posts.post_modified as score";
    		break;
    	case "female":
    		$gender_clause = " and wp_posts.post_gender in ('universal', 'female')";
    		$score_generator_select = " if(wp_posts.post_gender='female', 2, 0) - DATEDIFF(CURDATE(),wp_posts.post_modified) as score";
    		break;
    	case "female_only":
     		$gender_clause = " and wp_posts.post_gender ='female'";
    		$score_generator_select = " wp_posts.post_modified as score";
    		break;
    	case "male":
     		$gender_clause = " and wp_posts.post_gender in ('universal', 'male')";
    		$score_generator_select = " if(wp_posts.post_gender='male', 2, 0) - DATEDIFF(CURDATE(),wp_posts.post_modified) as score";
    		break;
    	case "male_only":
     		$gender_clause = " and wp_posts.post_gender 'male'";
    		$score_generator_select = " wp_posts.post_modified as score";
    		break;    		
    }
    
    $limit = @$query['offset'] ? " limit {$query['offset']}, $count" : " limit 0, $count" ;
    $order = " order by score desc";
    $cat_clause = '';
    if(@$query['cat_slug'] ){
    	$cat_clause = "and wp_posts.ID in (select wp_term_relationships.object_id from wp_terms, wp_term_relationships, wp_term_taxonomy ".
    					"where wp_term_relationships.term_taxonomy_id = wp_terms.term_id ".
    					"and wp_terms.term_id=wp_term_taxonomy.term_id ".
    					"and wp_term_taxonomy.taxonomy='category' ".
    					"and wp_terms.slug ='{$query['cat_slug']}') ";
    }
    
    $tags_clause = '';
    if(@$query['tags_slug'] ){
		$tagsSlug = str_replace(",", "','", $query['tags_slug']);
		$tagsSlug = "'$tagsSlug'";
    	$tags_clause = "and wp_posts.ID in (select wp_term_relationships.object_id from wp_terms, wp_term_relationships, wp_term_taxonomy ".
    					"where wp_term_relationships.term_taxonomy_id = wp_terms.term_id ".
    					"and wp_terms.term_id=wp_term_taxonomy.term_id ".
    					"and wp_term_taxonomy.taxonomy='post_tag' ".
    					"and wp_terms.slug in ($tagsSlug)) ";
    }

    
    $group_table = '';
    $group_clause = '';
    if(@$query['group_slug']){
    	$group_table = ", wp_groups, wp_group_relationships";
    	$group_clause = "and wp_posts.ID=wp_group_relationships.post_id " .
    		"and wp_group_relationships.group_id = wp_groups.id " .
    		"and wp_groups.slug='{$query['group_slug']}'";
    	
    }

    $not_clause ='';
    if(@$query['not']){
	    $not_clause = "and wp_posts.ID != {$query['not']} ";
    }

    
    $select = "select wp_posts.ID, $score_generator_select from wp_posts $group_table " .
    		"where post_status='publish' and post_type='post' $not_clause " .
    		"$cat_clause $tags_clause $group_clause $gender_clause $order $limit";
    
    
    $post_ids = $wpdb->get_results( $select );
    
    $ids= [];
    foreach($post_ids as $post){
    	$ids[] = $post->ID;
    }
    
    
    // No matching post found. pass 0 as id so api could compose response with 0 post
    if(count($ids) == 0){
    	$ids[] = 0;
    }
    
    $posts = $json_api->introspector->get_posts(['post__in'=>$ids]);
    
    // rearrenge array as per post id sequence
    $sortedPosts = []; 
    foreach($ids as $id){
    	foreach($posts as $post){
    		if($post->id == $id){ 
    			$post->content=''; 
    			$post->excerpt=''; 
			$sortedPosts[] = $post;
    		}
    	}
    }
    
    $result = $this->posts_result($sortedPosts);
    return $result;
    
  }


```

Make following amendment under wp-content/plugins/json-api/models/post.php to make added field visible inside jso api response
1. Add following code under the var declation part of JSON_API_Post class

```
  var $post_gender;		// String
  var $share_count;		// Integer
  var $view_count;		// Integer
```
2. Add Follwoing code under 'import_wp_object' method before 'do_action' is called

```
    $this->set_value('post_gender', $wp_post->post_gender);
    $this->set_value('share_count', (int) $wp_post->share_count);
    $this->set_value('view_count', (int) $wp_post->view_status);
```
