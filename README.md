# 365_network

Today I Started new private side project :
Developing Social Network from zero to hero - Just for fun :-)
Server side (php) and Client side (html/css)

<br>
Sign up:<br>
basic form,
clicking on submit sending post request to the same page
which requiring the register handler, which doing all the server side magic.
verify errors,
entering the user detail to the USERS table,
db connection defined in "config.php" which is required in the "register.php"
inserting the info into users table using mysqli sql query.
<br>

Signup Form error type:<br>
1.inputs length is 4 to 25
2.verifying emails are the same
3.verifying passwords are the same
4.verifying email format
<br>

Error handling:<br>
errors copy are constant strings in "error_msgs.php"
in case there is error im inserting the error string into error_array,
in the html form im checking in each input if the relevant error exists in the error_array
if yes: presenting the error, (which has specific css class for style)
<br>

Remembering input when page refresh:<br>
im keeping them in global session variables, 
when the html loads im checking if the specific session isset,
if yes im filling the input value with it.
<br>
Free the memory:<br>
if the user signup successfully,
im unsetting the form input sessions inorder to free the memory.
<br>

Error array is empty?<br>
That's means the form is valid,
im inserting the user inputs into the db


<br>
in the future ill create profiles, statuses, comments, likes, friends, inboxs. and more :-)