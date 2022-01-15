# 365_network

Today I Started new private side project : <br>
Developing Social Network from zero to hero - Just for fun :-) <br>
Server side (php) and Client side (html/css) <br>
in the future ill create profiles, statuses, comments, likes, friends, inboxs. and more :-)

<br>
<h3>Sign up:</h3>
basic form, <br>
clicking on submit sending post request to the same page <br>
which requiring the "register_handler.php", which doing all the server side magic: <br>
verify errors, <br>
entering the user detail to the USERS table, <br>
db connection defined in "config.php" which is required in the "register.php" <br>
inserting the info into users table using mysqli sql query. <br>
<br>

<h3>Signup Form error type:</h3>
1.inputs length is 4 to 25 <br>
2.verifying emails are the same <br>
3.verifying passwords are the same <br>
4.verifying email format <br>
<br>

<h3>Error handling:</h3>
errors copy are constant strings in "error_msgs.php" <br>
in case there is error im inserting the error string into error_array, <br>
in the html form im checking in each input if the relevant error exists in the error_array <br>
if yes: presenting the error, (which has specific css class for style) <br>
<br>

<h3>Remembering input when page refresh:</h3>
im keeping them in global session variables,  <br>
when the html loads im checking if the specific session isset, <br>
if yes im filling the input value with it. <br>
<br>

<h3>Free the memory:</h3>
if the user signup successfully, <br>
im unsetting the form input sessions inorder to free the memory.  <br>
<br>

<h3>Error array is empty?</h3>
That's means the form is valid, <br>
im inserting the user inputs into the db <br>

<h3>abit about the register css</h3>
fonts, background photo are on the resources folder.