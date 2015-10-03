This application uses customize wordpress application as a backend CMS. Customization was aim to add two native fields for post object for advance filteration of content.


Execute following sql against your wordpress database:

```
ALTER TABLE `wp_posts` ADD `post_gender` ENUM('universal','male','female','') NOT NULL DEFAULT 'universal' AFTER `comment_count`, ADD INDEX `gender` (`post_gender`);

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
