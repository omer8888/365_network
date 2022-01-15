# 365_network

Today I Started new private side project :
Developing Social Network from zero to hero - Just for fun :-)
Server side (php) and Client side (html/css)

<br>
<h2>Sign up:</h2><br>
basic form,
clicking on submit sending post request to the same page
which requiring the register handler, which doing all the server side magic.
verify errors,
entering the user detail to the USERS table,
db connection defined in "config.php" which is required in the "register.php"
inserting the info into users table using mysqli sql query.
<br>

<h2>Signup Form error type:</h2><br>
1.inputs length is 4 to 25
2.verifying emails are the same
3.verifying passwords are the same
4.verifying email format
<br>

<h2>Error handling:</h2><br>
errors copy are constant strings in "error_msgs.php"
in case there is error im inserting the error string into error_array,
in the html form im checking in each input if the relevant error exists in the error_array
if yes: presenting the error, (which has specific css class for style)
<br>

<h2>Remembering input when page refresh:</h2><br>
im keeping them in global session variables, 
when the html loads im checking if the specific session isset,
if yes im filling the input value with it.
<br>

<h2>Free the memory:</h2><br>
if the user signup successfully,
im unsetting the form input sessions inorder to free the memory.
<br>

<h2>Error array is empty?</h2><br>
That's means the form is valid,
im inserting the user inputs into the db


<br>
in the future ill create profiles, statuses, comments, likes, friends, inboxs. and more :-)