# HW10 Club Part 1
Your Name:

Grading Notes:

GRADING RUBRIC (Part 1 / HW10)

3/3 - Club website has index/join pages and detailed CSS
2/2 - Join form functions correctly
2/2 - Database table correctly set up
2/2 - New members are correctly created
0/1 - Directory structure organized as specified

*** Files are not organized into directories

TOTAL: 9/10

SS =)

Link: http://cscilab.bc.edu/~guevarja/hw10/index.php
<<<<<<< HEAD
Link to Admin Page: http://cscilab.bc.edu/~guevarja/hw10/admin.php?admin=
Link to your Club page on cscilab.bc.edu
=======

please add link of your admin page for grading of hw12 
-Jenny Koh


HW12:
>>>>>>> origin/master

9/10 - the new password emails sends, but the group email doesn't work.

Link to your Club page on cscilab.bc.edu

-------
Create a front end to the club website.  Next week you
will add to the front end and create a back end to support the club.

For this assignment
	- edit dbconn.php with your login credentials for cscilab
	- add your queries to setup.sql
	- complete a club homepage called index.php that will display either
	  the home page, or a form to join your club.  
	- complete a second php file with php to perform database operations, 
	  and to display links back to the home page.  

Step 1 - Set up your club database table.  Create a new table in your
personal
database that contains fields for:
	- name
	- email  Each user must have a unique email address (i.e. no two
	  members can have the same email address)
	- password The password field type should be char(40) to store a
	  sha1 encryption of a password.
	- registration date to record the date and time of registration
	  (field type is datetime).
	- membership type (using an enum)  Every user will have a membership
	  type which will be specified by an enumerated type.  You
      determine the type names based on your club.

Create an SQL create statement to create the table even if you use the
phpmyadmin gui to create your table.  The SQL create statement serves as
documentation.  Copy the create statement into setup.sql.

Step 2 - Write sql statements indicated in the file setup.sql  Use the 
now() SQL (not php) function to store the date & time when the user 
registered.  For the password, don’t store the actual password but store 
the result of thesha1() function as described in class.  

Step 3 - Complete the main page index.php. Make up your own club. 
	Put something of interest on your front page, an interesting image, 
	links and so on. 
	
	Put a join button on the main page.  If the user clicks the join 
	button on your home page, display a form allowing them to allowing 
	them to join the club. HINT: use a form with method get to display 
	the form.  Then you can use the get variable in step 5.

Step 4 - Create a form for a user to fill in to join your club.  Your
form should collect all information to be placed in the table of members
you created above.  Use post (not get) as the form method for the join
form so that passwords are not displayed on the url and because you are
modifying the database.  Use two password fields to make sure the user
types the password correctly.
For the two password fields, use
	<input type="password" …
instead of
	<input type="text" …
You’ll still get the real field contents in $_POST.

Put the join form action in dboperation.php.   While you
are debugging your form, just make the form action dump the post
variables.  After you have the form the way you want it, you can write
the handler.

Step 5 - write the form handler.  When submitted, the dboperation.php
should:

- Verify all input data.  Make sure the passwords match.  Query the
database, and make sure that the email address is NOT already present. 
If it is already present, write an appropriate message and show a link
back to the join page.

- If the test above is OK, add the user to the database using an insert
query, and show a “thank you” message.  You should have a working insert
query in your setup.sql file to use in your code.  Of course you will
need to use php to get the member data from the $_POST[] super global
array and fill in the data in the queries for your user.   This is a lot
of string manipulation.  Take a look at the strings example from class. 
 Use the PHP sha1() function to encode the password.    Show a link back
to the the club homepage page with a success message, or a link back
that redisplays the join form on error.  HINT: you can use a $_GET[]
variable to load the page with the join form.

Create a separate style sheet for your club.  Your style sheet should
include at a minimum, customized body, fieldset, tables and inputs.  Use
fonts, foreground and background colors and images.  Both index.php and
join.php should use the same css.

Organize your directory structure with three subdirectories, include,
css, and img as follows:

- club/index.php             /* your main page */
- club/css/myclub.css        /* your style sheets */
- include/dboperation.php    /* form handling and database support
functions */
- include/setup.sql          /* the sql statement(s) you used to create
your database table. */

- img/*.jpg                  /* your images */


Use your form to add at least 10 people, including yourself, to the club
and me:

Kate Lowrie, password swordfish, and the email account: lowriek@bc.edu

All 10 emails should be valid.  (Everyone at BC has at least 2:
userid@bc.edu, firstname.lastname.1@bc.edu). Use a volunteers from our
class for the extras. (We’ll be sending email to them in a later
assignment.)  Also, don’t use the same radio button selection for each
member—choose different values so you have a variety of types of members
in your club.

To see if everything is working OK, use PHPMyAdmin to browse your table.

** Make sure you test adding someone who’s email address is already in
use, and try adding someone who typed in two different passwords, to
make sure both of those cases work properly.  Try other error cases as
well.

