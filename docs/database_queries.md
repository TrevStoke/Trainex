#	Database Queries

##	List All Active Mentors, Supervisors or Trainees

For a mentor, supervisor or trainee to be active, both 'mentors.active' (or 'supervisors.active', 'trainees.active') and the associated 'employees.active' need to be 1.

	SELECT
		`m`.`id`, `e`.`first_name`, `e`.`last_name`
	FROM `mentors` AS `m`
		JOIN `employees` AS `e` ON `m`.`employee_id` = `e`.`id`
	WHERE `m`.`active` = 1
		AND `e`.`active` = 1

	SELECT
		`s`.`id`, `e`.`first_name`, `e`.`last_name`
	FROM `supervisors` AS `s`
		JOIN `employees` AS `e` ON `s`.`employee_id` = `e`.`id`
	WHERE `s`.`active` = 1
		AND `e`.`active` = 1

	SELECT
		`t`.`id`, `e`.`first_name`, `e`.`last_name`
	FROM `trainees` AS `t`
		JOIN `employees` AS `e` ON `t`.`employee_id` = `e`.`id`
	WHERE `t`.`active` = 1
		AND `e`.`active` = 1

##	List Trainee-Assigned Plans

	SELECT
		`t`.`id`, `e`.`first_name`, `e`.`last_name`,
		`p`.`code`, `p`.`description`
	FROM `trainees` AS `t`
		JOIN `employees` AS `e` ON `t`.`employee_id` = `e`.`id`
		JOIN `trainees_plans` AS `tp` ON `t`.`id` = `tp`.`trainee_id`
		JOIN `plans` AS `p` ON `tp`.`plan_id` = `p`.`id`
	ORDER BY `t`.`id`

##	List Training Reminders

It is envisaged that the user should be able to specify the number of months for which advanced warning is required, e.g., for three months.

	SELECT *
	FROM `retrain_reminders`
	WHERE DATE_SUB(`retrain_due`, INTERVAL 3 MONTH) <= CURDATE()
