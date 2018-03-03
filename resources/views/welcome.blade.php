<!--
    Welcome to jooob (dot) info
    A developer-to-developer job listing
    Send a curl request to: https://jooob.info to see all post
    Example: curl https://api.jooob.info/jobs -H 'email:demo@demo.com' -d 'stack=python,php,mongodb,ror'
-->
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="UTF-8">
<title>jooob</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A developer-to-developer job listing" />
<meta name="keywords" content="jobs,work,job listing,developers" />
<link href='https://fonts.googleapis.com/css?family=Sarpanch:400,600' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Share+Tech' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/css/jooob.css">
</head>
<body>
<div id="wrapper">
    <span terminal=1 class="terminal-line">
        root@jooob:~$ Last login: Thu Jan 18 07:33:20 on ttys000<br>
        root@jooob:~$ echo 'Welcome to jooob (dot) info' <br>
        root@jooob:~$ echo 'A developer-to-developer service' <br>
        root@jooob:~$ <br>
        root@jooob:~$ <br>
        root@jooob:~$ <br>
        root@jooob:~$ echo 'Send a curl request to: https://jooob.info/api/jobs to see all post'<br>
        root@jooob:~$ curl -H "Content-Type: application/json" https://jooob.info/api/v1/jobs' <br>
        root@jooob:~$ {"results":[{"id":2,"company_id":"1","jobtitle":"Rails developer","description":"Develop and scale web application, develop an api to future mobile app, other functions related to the company","contract":"Full-time","location":"","city":"Dublin","country":"Ireland","validFrom":"2014-12-13 00:00:00","validTo":"2015-12-31 00:00:00","stack":"ruby,rails,ec2,heroku,java","salary":"0","equity":"Bachelor","instructions":"Send resume to jobs@findby.co"} <br>
        root@jooob:~$ <br>
        root@jooob:~$ <br>
        root@jooob:~$ <br>
        root@jooob:~$ echo 'Link a search with your profile :)'<br>
        root@jooob:~$ curl -H "Content-Type: application/json" -d "stack=php,python,java,mondodb" https://jooob.info/api/v1/search' <br>
        root@jooob:~$ <br>
        root@jooob:~$ <br>
        root@jooob:~$ echo 'Send a friend a post'<br>
        root@jooob:~$ curl  -H "Content-Type: application/json" -d "share=your-friend@your-email.com" https://jooob.info/jobs/XXXXX/share<br>
        root@jooob:~$ <br>
        root@jooob:~$ <br>
        root@jooob:~$ <br>
        root@jooob:~$ <span class="blink_me">|</span><br>
    </span>
</div>
<script src="/js/jooob.js"></script>
</body>
</html>
