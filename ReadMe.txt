/* UDW website
* Author: Zuhayer Alam
*/

ROLES: student = 5, academic staff = 4, UC = 3, DC = 1
(These numbers are used in database to manage access level).

/* PASSWORD */

All passwords are currently set to !2Qwer
The passwords fields in forms do not show the title/validation text automatically,
Please hold the mouse cursor on the box to see the message about password format.
(It's not showing automatically for some reason, maybe caused by custom styling or bootstrap)

/* Testing UC and DC functions */

DC ID: 100 Name: Helene Skudra
UC ID: 100114 Name: Claudia Blaga
UC ID: 100112 Name: Ermina Zore
(I've set two UCs. You can allocate anyone as UC through DC's account. Same for lecturers and tutors.
tutor can also be set from UC's account. Please view the database to see more accounts and their information).

You can set pre-requisites for a unit. For unit description, you can only write 200 characters
as that limit is currently set in database.

You can allocate tutors and lecturers only from the Master List.
Even though the staff is available, if the DC has not
included them in the Master List-Academic Staff (stafflist in database), you cannot allocate them.
For example, you cannot allocate Elinar Prova (100116) as she is not in the Master List-Academic Staff.
And obviously, staffs who made themselves unavailable cannot be chosen either.

The unit coordinator (UC) can only manage tutorials of their unit. They cannot see or manage other tutorials.

The exported excel file from Enrolled Student Details can show error messages while opening. 
Please, select yes to view.

/*Testing Students Functions*/

If you want to test from scratch, use the ID: 500113 (Vikroria Grimminger).
If you want to view a student account with enrollment in units and tutorials, use the ID: 500111.
Pre-requisites function should work properly, pre-requisites are shown while enrolling.
(For example, if you want to enrol in KGS324, you must enrol in KGS355.)

Students cannot see tutorials if they have not enrolled in that unit.
To view tutorials, enrol in that unit first.
For capacity checking, enrol in KGS111 first and then try to allocate in the tutorial with capacity 2.
You should not be able to do it as I have already allocated two students in that tutorial.

/* Forget password */

You need to edit the forgotPasswordProcess.php file to make it work.
This function depends on gmail smtp server. A gmail address and password is needed for it to work.
Also, change the "domain.com" need to be replace with the domain.

/*Other functions and features*/

Other features required by the assignment instructions were implemented as well.
Checking if userID already exists or not, Checking if already enrolled in the unit 
- things like these are taken care of.

/*Database*/

Table dependency (foreign keys, On Delete Cascade, On Update Cascade) are not maintained by SQL. 
Rather, it is implemented by php code because update cascade or delete cascade sometimes work differently 
than what is desired (in MySql).

/*Responsiveness*/

Website is quite responsive but all the tables could not be made responsive and was assumed that
pages with editable tables will not be accessed by a phone.

/*============ End of ReadMe file =======*/