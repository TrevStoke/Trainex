#	Trainex Preliminary Specification

Note that everything in this document is currently provisional, open to discussion, and subject to change.

##	Introduction

Trainex will be a software tool for recording, managing and presenting information related to T&C employees' training histories.

During a period of training undertaken by a 'trainee' employee, a 'mentor' will provide regular assessments of the trainee's level of proficiency in areas related to that training, and the details of such assessments will be recorded (either by, or with the authorisation of, a 'supervisor') using Trainex.

A Trainex user will be able to browse and search the assessment histories of trainees via a web-based interface. Trainex will also provide a means to establish which trainees are due (or overdue) for retraining.

##	The Structure of Training

During an employee's period of service at T&C, they may be exposed to a number of 'training plans'. An employee who is, has been, or will be subject to training--a 'trainee'--may be assigned to multiple training plans simultaneously. Typically, each training plan will take place over an indefinite period, during which the trainee will practise and develop a number of 'skills' under the guidance of one or more 'mentors'. Training plans are designed both to allow a trainee to gain experience in the assigned skills, and to allow the mentor(s) to regularly assess the trainee's progress during the period.

Each skills is specific to a single plan, but to assist with associating generic skills to a plan, a selection of 'common skills' (such as 'observing all health and safety procedures' or 'attitude to work') will be available when setting up a plan.

Normally, a trainee will only complete a training plan when they have either achieved the desired standard of proficiency in all of the associated skills, or when it has been established that they will be unable to achieve the required standard in one or more of those skills.

During a training plan, a trainee's mentors will submit regular assessments (one assigned mentor per assessment) to a 'supervisor' (assuming that the mentor and the supervisor aren't the same person, which they may be). The supervisor will arrange for the entry of assessments into the Trainex system. Additionally, if appropriate, the supervisor will authorise the trainee's completion of their current training plan, and potentially arrange for their progression onto another training plan.

##	Assessments

Each training plan will have its own assessment, containing details of the skills to be graded for that plan. The assessment will be submitted one or more times for each trainee, typically at regular intervals, while they are undertaking the associated plan.

Assessment grades are presented as a grid of check-boxes with the following values (the meaning for each grade is also included below):

-	A: The trainee needs no further training on the associated skill at this time, and is suitably proficient to perform the skill unsupervised at a customer site.
-	B: The trainee is demonstrating an increasing ability in this skill, and with further training should become proficient in due course.
-	C: The trainee is experiencing considerable difficulty in grasping this skill, and further consideration should be given to their suitability to proceed at all.
-	Z: The trainee's proficiency in this skill was not assessed.

In addition to the grades, each assessment also permits the entry of a 'general note' (free text) for optionally providing additional thoughts on the trainee and their progress through the associated training plan. This would be intended for entering comments provided by either the mentor and/or the supervisor.

Normally, an assessment where all grades are recorded as 'A' (or perhaps 'Z' where applicable?) will mark the successful completion of the corresponding training plan by the trainee. However, for maximum flexibility, each assessment submission will require a 'completion status' selection so that a supervisor must explicitly choose between 'incomplete,' 'complete, passed' and 'complete, failed' for the trainee. This allows plans to be marked as complete (or not yet complete) under special circumstances where non-completion (or completion) would be the typical case. It also allows for the (hopefully exceptional) case where a trainee has specifically failed (as opposed to not yet passed).

#	Trainex Technical Notes

##	Application Data

###	General Notes

Because of the historical nature of the assessment record, some of the database entities can never have their instances deleted. Such entities include an 'active' column in their data tables. This column is a flag to indicate, where appropriate, whether a specific instance of an entity is to appear as a current selection in the UI. The 'active' column allows inactive instances of entities to be kept in the database without having to remain as active choices.

###	Entities and Columns

-	Plans, consisting of:
	-	'code': A unique plan code (e.g., 'LOOSE-DEPOT-01').
	-	'description': A plan description (e.g., 'Mount/demount tyres to loose wheel rims of various types at a T&C depot').
	-	'retrain_interval' (NULL possible): An amount of time (number of months) after plan completion when a plan should be repeated or when a different plan should be pursued.
	-	'retrain\_plan_id' (NULL possible): The id of the plan for retraining.
	-	'active': A flag indicating whether the plan is currently available for assigning to trainees.
-	Common skills (to be used as appropriate from which to create new skills), consisting of:
	-	'code': A unique common skill code (to become the skill code when used).
	-	'description': A description of the common skill (to become the skill description when used).
-	Skills, consisting of:
	-	'plan_id': A plan id. Skills are associated with exactly one plan. If necessary, multiple instances of what would otherwise be the same skill must be created, one for each plan to which the skill applies.
	-	'code': A skill code (e.g., 'LOOSE-DEPOT-RIM-X').
	-	'description': A skill description (e.g., 'Mount/demount tyres to loose wheel rims of type X').
-	Employees, consisting of:
	-	'name': The employee's name.
	-	'active': A flag indicating whether the employee is currently available for adding as a trainee, mentor or supervisor.
-	Trainees, consisting of:
	-	'employee_id': The trainee's employee id.
	-	'active': A flag indicating whether the trainee is currently available for assigning to plans etc.
-	Trainees-plans, consisting of:
	-	'trainee_id': A trainee id.
	-	'plan_id': A plan id.
	-	In combination, 'trainee\_id' and 'plan_id' must be unique.
-	Latest plan completions (**considering replacement by 'retrain reminders'**), consisting of:
	-	'trainee_id': A trainee id.
	-	'plan_id': A plan id.
	-	'completion': A completion date.
	-	In combination, 'trainee\_id' and 'plan_id' must be unique.
-	Retrain reminders (**potentially to replace 'latest plan completions'**), consisting of:
	-	'trainee_id': A trainee id.
	-	'completed_plan_id': A plan id.
	-	'completion_occurred': The date when completion occurred.
	-	'retrain_plan_id': A plan id.
	-	'retrain_due': The date on which retraining is due.
	-	'retrain_plan_assigned': A flag indicating whether the retrain plan is currently assigned to the trainee.
-	Mentors, consisting of:
	-	'employee_id': The mentor's employee id.
	-	'active': A flag indicating whether the mentor is currently available for associating with assessments etc. 
-	Supervisors, consisting of:
	-	'employee_id': The supervisor's employee id.
	-	'active': A flag indicating whether the supervisor is currently available for associating with assessments etc.
-	Assessments (an historical record of assessment submissions), consisting of:
	-	'plan_id': A plan id.
	-	'trainee_id': A trainee id.
	-	'mentor_id': A mentor id.
	-	'supervisor_id': A supervisor id.
	-	'occurred': The date of the assessment.
	-	'completion_status': The completion status resulting from this assessment (at present: 'incomplete,' 'passed' or 'failed').
-	Skill grades, consisting of:
	-	'grade': Grade representation (at present: grade letter).
	-	'description': Meaning of grade.
-	Skill-assessments, consisting of:
	-	'skill_id': A skill id.
	-	'assessment_id': An assessment id.
	-	'skill_grade_id': A skill grade id.

Note: it may be useful to adopt the practice of appending two- or three-digit numbers onto the end of plan- and skill codes, so that replacement versions of a given entity can be given new codes that are similar enough to be recognisable while still being different.

#	Main UI Operations

##	Common Skills

###	List All Common Skills

Produce a list of all common skills.

###	Create a New Common Skill

Create a new common skill, specifying the skill code and description that will be copied when using it to create a new skill.

###	Edit a Common Skill

Because skills are not directly represented in the assessment history, they can be freely edited. (This feature seems likely to be available from the list of common skills.)

###	Delete a Common Skill

Because skills are not directly represented in the assessment history, they can be freely deleted. (This feature seems likely to be available from the list of common skills.)

##	Plans

###	List All Active Plans

Produce a list of all currently active plans.

###	List All Inactive Plans

Produce a list of all currently inactive plans.

###	View More Plan Details

View more plan details, including a list of associated skills.

###	Create a New Plan

Create a new training plan, specifying all details.

**To be decided:** This operation could include the creation of associated skills, or skill creation and assignment to a plan could be a separate step.

###	Activate a Plan

Activate a currently inactive plan. (This feature seems likely to be available from the 'Inactive Plans' list.)

###	Deactivate a Plan

Deactivate a currently active plan. (This feature seems likely to be available from the 'Active Plans' list.)

###	Edit a Plan

Modify the code, description, retrain interval or retrain plan of an existing training plan. (This operation seems likely to be the same irrespective of whether the plan is active or inactive, and the feature will most likely be available from either of the 'Inactive Plans' and 'Active Plans' lists.)

This feature is intended only to make relatively superficial alterations such as correcting mistakes. Because plans are referred to by historical assessment submissions, fundamentally changing the nature of a plan (or its associated skills) may cause the historical assessment record not to reflect the training history that occurred.

If the changes to a plan are to be substantial, it is envisaged that a better course would be to deactivate the existing plan, then create a new one (and associated skills) to replace it.

###	Delete a Plan

To maintain the integrity of the assessment history, plans cannot be deleted, only deactivated.

##	Skills

###	List a Plan's Skills

List the skills associated with a plan. (It may be that this feature will be a part of the 'View More Plan Details' feature.)

###	Create a New Skill

Create a new skill, specifying all details (or selecting a common skill) including the plan id (from the a list of currently active plans) to associate the skill with.

**To be decided:** This operation could be incorporated into creating a new plan, perhaps making it unavailable as a separate operation.

###	Edit a Skill

Modify the plan id, code or description of an existing skill. (This feature seems likely to be available from the 'Plan's Skills' list.)

As already noted for plans, this feature should only be used for making modest alternations to a skill such as correcting errors. If a skill is to change substantially (to the point where deactivation would be most appropriate to avoid the retrospective alteration of the assessment history), then this should be considered as representing a fundamental change to the plan to which the skill belongs, and the plan itself should be deactivated and replaced with a new version with an appropriately modified set of skills.

###	Delete a Skill

To maintain the integrity of the assessment history, skills cannot be deleted. For them to be effectively removed, their associated plan needs to be deactivated.

##	Employees

###	List All Active Employees

Produce a list of all active employees.

###	List All Inactive Employees

Produce a list of all inactive employees.

###	Create a New Employee

Create a new employee, specifying all details.

###	Activate an Employee

Activate a currently inactive employee. (This feature seems likely to be available from the 'Inactive Employees' list.)

###	Deactivate an Employee

Deactivate a currently active employee. (This feature seems likely to be available from the 'Active Employees' list.)

###	Edit an Employee

Correct superficial employee details. (This feature seems likely to be available from both of the 'Active Employees' and 'Inactive Employees' lists.)

###	Delete an Employee

Employees cannot be deleted, only deactivated.

##	Mentors, Supervisors and Trainees

In each case, the following sub-sections represent three separate operations: one each for mentors, supervisors and trainees, that are listed together due to their similarity to each other (exceptions to this similarity are noted within each section).

###	List All Active Mentors, Supervisors or Trainees

Produce a list of active mentors, supervisors or trainees. To be considered active, a mentor, supervisor or trainee must be flagged as active, *and* the associated employee must also be flagged as active.

When listing trainees, it will probably be useful to include an indication of whether they're currently assigned to any training plans.

###	List All Inactive Mentors, Supervisors or Trainees

Produce a list of inactive mentors, supervisors or trainees. To be considered inactive, a mentor, supervisor or trainee must either be flagged as inactive or their associated employee must be flagged as inactive (or both).

When listing trainees, it'll probably be useful to include an indication of whether they're currently assigned to any training plans. (The implication here is that inactive trainees can remain assigned to training plans; it may not turn out to be especially meaningful, but it seems unlikely that it will do any harm.)

###	Create a Mentor, Supervisor or Trainee

Create a new mentor, supervisor or trainee, providing an employee id (from a list of currently active employees).

###	Activate a Mentor, Supervisor or Trainee

Activate a currently inactive mentor, supervisor or trainee. This will involve activating the mentor, supervisor or trainee (if necessary), and activating the associated employee (if necessary). (This feature seems likely to be available from the 'Inactive' list of the appropriate entity.)

###	Deactivate a Mentor, Supervisor or Trainee

Deactivate a currently active mentor, supervisor or trainee. This will deactivate the mentor, supervisor or trainee without changing the status of the associated employee. (This feature seems likely to be available from the 'Inactive' list of the appropriate entity.)

### Delete a Mentor, Supervisor or Trainee

Because of their importance to the historical assessment record, mentors, supervisors and trainees cannot be deleted. Instead, they should be deactivated as necessary.

##	Trainees

###	View More Trainee Details

View full trainee details, including the list of plans to which a trainee is currently assigned, and a full set of retrain reminders.

###	Assign a Trainee to a Plan

Assign a trainee to a currently active training plan.

###	Deassign a Trainee from a Plan

Deassign a trainee from a training plan. Normally, this operation would only be used to deassign trainees from plans to which they've been mistakenly assigned: the deassignment would typically be handled automatically by Trainex as a result of a trainee being marked as having completed the plan via an assessment submission.

###	Generate a Blank Assessment for a Trainee

Generate an appropriate blank assessment form for a trainee based upon a selected training plan to which they're currently assigned.

###	Submit an Assessment for a Trainee

Submit a trainee assessment for a plan that they are currently assigned to, providing grades for all appropriate skills, along with mentor and supervisor information. If the submission indicates that the trainee has completed their current plan, they will be deassigned from their plan.

###	Browse Assessment History for a Trainee.

Lists assessments in most-recent-first date order (and perhaps between certain dates), showing their associated plans, mentors, supervisors and grade summaries.

###	View an Individual Assessment

Provides more detailed information about a single assessment including full skill details and associated grades.

###	View Plan-Completion Assessments for a Trainee

Lists those assessments that represent training plan completion, showing their associated plans, mentors, supervisors and grade summaries.

##	Reports

###	Produce a Retraining Report

The report lists all trainees who are now due (or overdue?) to be assigned to a training plan.

#	Algorithm Notes

##	Assigning a Trainee to a Plan

When a trainee is assigned to a plan:

-	If the trainee has a retrain reminder for the newly-assigned plan (retrain plan id), flag that reminder as 'retrain plan assigned'.

##	Deassign a Trainee from a Plan

Reminder: Normally, a trainee will become disassociated with a plan by completing it (as a result of an appropriate assessment). Deassigning a trainee from a plan should only occur when that trainee has been mistakenly assigned to a plan.

When a trainee is deassigned from a plan:

-	If the trainee has a retrain reminder for the newly-assigned plan (retrain plan id), flag that reminder as not 'retrain plan assigned'.

##	Plan Completion

When a plan is completed:

-	Deassign the trainee from the plan by removing the appropriate 'trainees_plans' row.
-	If the trainee has a retrain reminder for the just-completed plan (retrain plan id), remove it.
-	If the trainee has a retrain reminder due to a previous completion of the just-completed plan (completed plan id), remove it.
-	If the just-completed plan has non-NULL retrain interval and retrain plan id:
	-	Create a retrain reminder for the trainee based upon the just-completed plan.

#	Glossary of Terms

-	Assessment: A documentary submission (made by a 'mentor') detailing a trainee's standard of proficiency in all of the 'skills' that form part of their current training 'plan'.

-	Assessment grade: see 'Grade'.

-	Employee: An employee at T&C.

-	Grade: A rating associated with one of the assessed 'skills' on a corresponding training 'plan'.

-	Mentor: An experienced T&C 'employee' who provides ongoing training, guidance and 'assessment' to a 'trainee' during a training 'plan'.

-	Plan: A period of training consisting of one or more 'skills', typically conducted until all associated skills are completed to a sufficient standard.

-	Supervisor: A senior T&C 'employee' who receives the submission of training 'assessments', and manages a trainee's progression through one or more training 'plans'.

-	Skill: An activity, often practical, in which an employee should become experienced and suitably proficient. A number of skills are normally grouped together into a training 'plan', and a skill is associated with a single plan.

-	Trainee: Someone who undertakes one or more training 'plans' and is subject to 'assessments'.

-	Training plan: see 'Plan'.

-	Training skill: see 'Skill'.
