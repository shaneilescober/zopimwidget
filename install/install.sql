CREATE TABLE IF NOT EXISTS `zopim_setting` (
	`idx` INT(11) NOT NULL AUTO_INCREMENT,
	`pzs_content` TEXT NOT NULL,
	PRIMARY KEY  (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
		
CREATE TABLE IF NOT EXISTS `zopim_customize` (
	`idx` INT(100) NOT NULL AUTO_INCREMENT,
	`pzc_position` VARCHAR(250),
	`pzc_hide_chat_offline` TINYINT(1),
	`pzc_bubble_title` VARCHAR(250),
	`pzc_bubble_msg` VARCHAR(250),
	`pzc_window_color` VARCHAR(250),
	`pzc_use_greeting_msg`  TINYINT(1),
	`pzc_online_msgChatBar` VARCHAR(250),
	`pzc_away_msgChatBar` VARCHAR(250),
	`pzc_offline_msgChatBar` VARCHAR(250),
	`pzc_online_msgChatPanel` VARCHAR(250),
	`pzc_away_msgChatPanel` VARCHAR(250),
	`pzc_offline_msgChatPanel` VARCHAR(250),
	PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;