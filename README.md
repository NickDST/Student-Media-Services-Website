# Student Media Services Website Database

<h3>Example: sms.concordiashanghai.org</h3>

This is the second iteration of the project management system for SMS to log SMS Projects, project requests, service hours, Student Interest Groups, equipment catalog, student information and more. 

<br>

This is the main hub page: 
![alt text](https://github.com/NickDST/smsdb2/blob/master/website_all_files/readme_images/image_1.png)
<br>

<h3>Using this website, project organization is a lot easier. All the requests are submitted via the website and then entered into a request list, waiting to be activated. </h3>

![alt text](https://github.com/NickDST/smsdb2/blob/master/website_all_files/readme_images/image_request_info.png) 


<h3>Once the project is activated, the information is then moved into a project list, where the details can be viewed. </h3>


![alt text](https://github.com/NickDST/smsdb2/blob/master/website_all_files/readme_images/image_project_info.png) 
<br>

<h3>All the projects can be viewed in a list format. </h3>

![alt text](https://github.com/NickDST/smsdb2/blob/master/website_all_files/readme_images/image_project_details.png) 

<br>
<h3>Student Interest Group leaders can organize their students and do equipment certification here too. </h3>

![alt text](https://github.com/NickDST/smsdb2/blob/master/website_all_files/readme_images/image_sig_details.png) 

<br>

<h3>From my account, I can view the equipment I am certified to use.</h3>

![alt text](https://github.com/NickDST/smsdb2/blob/master/website_all_files/readme_images/image_certified_to_use.png)  

<br>
<h3>From here I can keep track of all my service hours and projects. </h3>


HOW THE SYSTEM WORKS

The SMS login associates everything based on a student's ID number such as 2019108 (mine). This is because all student IDs are easy to remember for each student and are unique, no student ID number is the same.

This, the names, info, EVERYTHING queried for each person is from the studentid SESSION that stores the value of the student ID. Every page makes sure this session is active (activated by logged in) otherwise the user is redirected to the login page.

An example of loading student information would look like the SQL command "SELECT * FROM students WHERE studentid= '$studentid';

This would load up all the personal information for that student.

Students do not create their own student ID when registering. Their information has to already exist in the "students" table in order for them to be able to create their account to log into.

SECURITY NUTSHELL:

This website as for right now uses procedural PHP. As much as I wish I used node.js or Object orientated PHP, right now my skills are only sufficient in procedural PHP and for this relatively small application procedural works fine. If someone SQL injects and hacks oh no......service hours are gone not really.

I use mysqli_real_escape_strings for every field input which takes out special characters such as : ; ( ) $ & / -. This prevents very simple DROP TABLE injections from 7th graders getting through. There is a way to bypass this using very complex and high level SQL injections, but :/

MY CODING STRUCTURE + SQL

As mentioned before, I use procedural php for majority of this website (the calendar is javascript from an open source called Fullcalendar).

Most of the stuff should be read from top down like conventional Procedural. But I set my variables and generally the PHP in order for how the page is run.

Otherwise the PHP is all in the beginning or at the end for forms sometimes.

For login pages, almost all of them reference "hubheader.php" or "requesthubheader.php" or "adminhubheader.php" for all the sidebar, database connection, and making sure the user is logged in otherwise redirect them.

I do a lot of SQL queries using mysqli. Almost all the functionality and adding and removing and querying looks something similar to this:

The typical syntax is:

$sql = "SELECT * FROM TABLE WHERE COLUMN = 'some conduction or variable'"

result = mysqli_query($connection, $sql)

While( $row = mysqli_fetch_assoc($result){

Echo row["column"];

}

If you're familiar with this then great! That's the main gist of how the website functionality works.

If you aren't familiar, here is an attempted basic rundown. It's really not complicated.

The first line just stores the command in a string in the variable $sql. The SELECT is selecting/choosing out of * which means all for specified table.

Second line takes your command and executed it. The $connection was specified somewhere earlier but it's basically the connection to the database in a different file.

I believe that the data is stored in a matrix in $result because there might have been multiple rows that came out.

Just...imagine $result stores an excel table with the command we searched. The command could've been WHERE age >10 where we'd get a table stored in $result for those conditions.

We need to do something to this first before we can use it. How do we just get one value out?

To actually get the values we want out, we have to do this third line, which is a while loop for fetching the data from request.
Just imagine that it unstacks the table in $result and runs through only each row.

It loops through each row of the table.

Now if we specified a column, it would loop to shoot out all the values for that column because it's looping through each row.

You pull out what u want by referencing the column. Echo just means print.
So it might be like:

Echo $row["name"]

And come out with:

Nicholas Ho

If you want to add or delete or update with SQL just look up the syntax online and swap the command with that.




<h3>Credits to used Sources</h3>
<hr>
The nice login: Mikael Ainalem (https://codepen.io/ainalem/pen/EQXjOR)
<br>
Index Page: HTML5 UP (https://html5up.net/spectral)
<br>
HTML + CSS Dashboard : (https://github.com/puikinsh/sufee-admin-dashboard)




