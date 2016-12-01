# All queries that you use should be recorded here as documentation.

# Write and SQL statement to create your club membership table.

CREATE TABLE Login(
FirstName varchar(20),
LastName varchar(20),
Email varchar(40),
Date datetime(10),
Password char(40),
Password1 char(40),
Membership enum("gold", "silver")
UNIQUE (Email),
);

# Write sql statements to insert club members . 
INSERT INTO  `Login` (  `FirstName` ,  `LastName` ,  `Email` , `Date` ,  `Password` ,  `Password1` ,  `Membership` ) 
VALUES (
'Lorenzo',  'Guevara',  'guevarja@bc.edu',  now(), thesha1('qwer123'),  thesha1('qwer123'),  'gold'
)
# Write SQL statement to select all  members with a particular email address.  
 
SELECT * 
FROM  `Login` 
WHERE email =  "guevarja@bc.edu"
LIMIT 0 , 30
# Write sql to update club  member data for a specific member.  

UPDATE `Login` SET `FirstName`= 'JLorenzo' WHERE `FirstName` = 'Lorenzo';

#  Finally write an SQL statement to delete a member. 

DELETE FROM `Login` WHERE FirstName = 'JLorenzo';
