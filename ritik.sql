ALTER TABLE `daily_blog` 
MODIFY title varchar(255) null,
MODIFY content text null,
MODIFY author varchar(255) null,
MODIFY publication_date date null;


-- daly blog table query

CREATE TABLE `daily_blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `publication_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_c

-- // for the comment table where blog comment are stored 
CREATE TABLE blog_comment (
 id int AUTO_INCREMENT PRIMARY KEY,
 post_id int default  null,
 user_id int default null,
 content varchar(255) DEFAULT null,
 created_at timestamp DEFAULT CURRENT_TIMESTAMP,
 updated_at timestamp default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
FOREIGN KEY (post_id) REFERENCES daily_blog(id) on DELETE CASCADE
)