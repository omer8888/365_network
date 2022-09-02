# 365_network



<h2>index page:</h2>
split the page into 3 sections for now: <br>
1) top nav: which has logo on the left, and some menu buttons on the right (bootstrap.js)<br>
2) main section: that will contain friends news and post status feature <br>
3) user profile section: that contains logged in user info: name, photo, posts num, likes num, signup date.<br>


<h3>Top nav and logout</h3>
wrapped in "top_bar" class which is styled in the css file<br>
position: fixed; in order to stay on top when scrolling down<br>
buttons from bootstrap.js <br>
which includes home, user profile, messages, notifications, friends, settings, logout <br>
most on these are still in progress <br>
log out function implemented on "logout.php" <br>
which is destroying the session and redirect to register page <br>


<h3>header.php </h3>
header file is been required_once all over the site<br>
it includes the Top nav code,<br>
and transform the logged-in user id (session) into user object.<br>

<h3>"User" class explained</h3>
user class helps access/edit info from users "table"<br>
without the need to write db queries every time.<br>

"user" constructor receive user_id
extract all this user info from the "users" table (mysqli_fetch_array)<br>
and returns user object which has 2 properties: id, user_info<br>
user info is the table row array (mysqli_fetch_array)<br>
this way i can access any of the user db info:<br>
id, name, user_name, email, photo, and more ..<br>
using this user obj i can access the logged in user all over the site<br>
and also build user object on any user only with his id.<br>


<h3>"User" class methods</h3>
using "get" for almost any info stored on the user table<br> 
example: return userinfo["column_name"]<br>
(as explained "userinfo" is row array of the mysqli_fetch_array(query))<br>
update_user_posts_count: update this user posts number in 1 (on the db)<br>
get_friends_posts: running all over "posts" table and return every post in a styled way (friends filter in progress)<br>

<h3>Logged-in user profile section:</h3>
The left box which contain logged in user basic info<br>
using the header, im creating the logged in user object (from the logged in id session)<br>
now that i have the user obj i can get all his info and display it styled on the user profile section<br>
posts num, likes num, user photo, date of sign up<br>

<h2>Main section: news and Post status feature</h2>
created input text in a form with post method<br>
clicking on post will call "post_handler":<br>
which is checking post request with "post_status" name<br>
and when this variable is set we create post object<br>

<h3>Post class</h3>
post constructor required at least $user_id, $body<br>
the constructor create user object which is the post sender<br>
Also have current time, receiver (if there is), likes, comments , is deleted<br>

<h3>Post methods</h3>
submitPost() insert the current post object info to the db<br>

<h3>Efficient scrolling posts load </h3>
im loading only 8 posts on page load<br>
if the user scroll to the page bottom:<br>
first he will see loading gif <br>
then he will see 8 more posts loads<br>
(implemented in JS)<br>
im sending ajax request with the user id and the "page load" time (every 8 posts) to "ajax_load_post.php"<br>
and on this page im asking for current user -> get_friends_posts functions<br>
when there is no more posts user will see "No more posts"<br>
posts HTML stayed format is added as string to php variable that im echoing at the end of the current load<br>




