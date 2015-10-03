This application uses customize wordpress application as a backend CMS. Customization was aim to add two native fields for post object for advance filteration of content.


Execute following sql against your wordpress database:

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



