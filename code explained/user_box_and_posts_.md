# 365_network



<h2>index page:</h2>
splitted the page into 3 sections for now: <br>
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
header file in been requered_once all over the site<br>
it includes the Top nav code,<br>
and transform the logged in user id (session) into user object.<br>

<h3>user class explained</h3>
user object goal extract/edit info from users "table"<br>
with out the need to write db querys all over.<br>

constructor receive user_id
extract all this user info from the "users" table (mysqli_fetch_array)<br>
and returns user object which has 2 propertis: id, user_info<br>
user info is the table row array (mysqli_fetch_array)<br>
this way i can access any of the user db info:<br>
id, name, user_name, email, photo, and more ..<br>
using this user obj i can access the logged in user all over the site<br>
and also build user object on any user using his id.<br>


<h3>user class methods</h3>
get for almost any info stored on the user table<br>
using return userinfo["column_name"]<br>
(as explained "userinfo" is row array of the mysqli_fetch_array(query))<br>
update_user_posts_count: update this user posts number in 1 (on the db)<br>
get_friends_posts: running all over "posts" table and return every post in a styled way (friends filter in progress)<br>

<h3>user profile section:</h3>
this is the little left box which contain logged in user info<br>
using the header, im creating the logged in user object (from the logged in id session)<br>
now that i have the user obj i cax get all his info and desplain it styled on the user progile section<br>
posts num, likes num, user photo, date of sign up<br>

<h2>main section: news and Post status feature</h2>
created input text in a form with post method<br>
clicking on post will call "post_handeler":<br>
which is checking post request with "post_status" name<br>
and when this variable is set we create post object<br>

<h3>post class</h3>
post constructor required at least $user_id, $body<br>
the constructor create user object which is the post sender<br>
also have current time, revicer (if there is), likes, comments , is deleted<br>

<h3>post methods</h3>
submitPost() insert the current post object info to the db<br>

<h3> efficient scrolling posts load </h3>
in loading only 8 posts on page load<br>
if the user scroll to the page bottom:<br>
first he will see loading gif <br>
then he will see 8 more posts loads<br>
this what implemented in JS<br>
im sending ajax request with the user id and the page load time to "ajax_load_post.php"<br>
and on this page im asking for get_friends_posts functions<br>
when there is no more posts user will see "No more posts"<br>




