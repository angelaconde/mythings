CREATE TABLE `auditing` (
  `user_id` int(11) NOT NULL,
  `inserts` int(11) NOT NULL DEFAULT 0,
  `updates` int(11) NOT NULL DEFAULT 0,
  `deletes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `auditing`
  ADD PRIMARY KEY (`user_id`);

DELIMITER $$
CREATE TRIGGER `add_new_audit_user` AFTER INSERT ON `users` FOR EACH ROW BEGIN
   INSERT INTO auditing
   VALUES (NEW.id, 0, 0, 0);
END
$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER `increment_insert_ug` AFTER INSERT ON `user_games` FOR EACH ROW BEGIN
UPDATE auditing
    SET auditing.inserts = auditing.inserts+1
    WHERE auditing.user_id = NEW.user_id;
END
$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER `increment_update_ug` AFTER UPDATE ON `user_games` FOR EACH ROW BEGIN
UPDATE auditing
    SET auditing.updates = auditing.updates+1
    WHERE auditing.user_id = NEW.user_id;
END
$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER `increment_delete_ug` AFTER DELETE ON `user_games` FOR EACH ROW BEGIN
UPDATE auditing
    SET auditing.deletes = auditing.deletes+1
    WHERE auditing.user_id = OLD.user_id;
END
$$
DELIMITER ;
