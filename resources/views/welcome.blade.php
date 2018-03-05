<!--
    Welcome to jooob (dot) info
    A developer-to-developer job listing
    Send a curl request to: https://jooob.info to see all post
    Example: curl https://api.jooob.info/jobs -H 'email:demo@demo.com' -d 'stack=python,php,mongodb,ror'
-->
@php
    $subdomain="https://jooob.info/api";
    $lastlogin=date('D M d H:m:s');
    $users = ['daniel','john','jane','tiago','superstar','god','jesus','caro','diego','hacker','root','mark','ben','joe','lucy','marie'];
    $machine = ['machine','laptop','office','jooob'];
    $logged= "root@jooob:~$"; //$users[rand(0,count($users)-1)]."@".$machine[rand(0,count($machine)-1)].":~$";
    $updated=date('Y-m-d H:i:s');
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="UTF-8">
<title>jooob</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A developer-to-developer job listing" />
<meta name="keywords" content="jobs,work,job listing,developers" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href='https://fonts.googleapis.com/css?family=Sarpanch:400,600' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Share+Tech' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/css/jooob.css">
</head>
<body>
    <div id="wrapper">
        <div class="row">
            <div class="col-1 text-left">{{$logged}}</div>
            <div class="col-10 text-left">Last login: {{ $lastlogin }} on ttys000</div>
        </div>
        <div class="row">
            <div class="col-1 text-left">{{$logged}}</div>
            <div class="col-10 text-left">echo 'Welcome to jooob (dot) info'</div>
        </div>
        <div class="row">
            <div class="col-1 text-left">{{$logged}}</div>
            <div class="col-10 text-left"></div>
        </div>
        <div class="row">
            <div class="col-1 text-left">{{$logged}}</div>
            <div class="col-10 text-left">echo 'Send a curl request to: {{$subdomain}}/jobs to see all post'</div>
        </div>
        <div class="row">
            <div class="col-1 text-left">{{$logged}}</div>
            <div class="col-10 text-left">curl <span class="yellow">-H "Content-Type: application/json"</span> {{$subdomain}}/jobs'</div>
        </div>
        <div class="row">
            <div class="col-1 text-left">{{$logged}}</div>
            <div class="col-10 text-left">{"results":[{"total":1051,"stack":"php,python,java,mondodb,ruby,rails,ec2,heroku,java","updated":"{{$updated}}"}]}</div>
        </div>
        <div class="row">
            <div class="col-1 text-left">{{$logged}}</div>
            <div class="col-10 text-left"></div>
        </div>
        <div class="row">
            <div class="col-1 text-left">{{$logged}}</div>
            <div class="col-10 text-left">echo 'Search what you really wants!'</div>
        </div>
        <div class="row">
            <div class="col-1 text-left">{{$logged}}</div>
            <div class="col-10 text-left">curl -H "Content-Type: application/json" <span class="yellow">-d "stack=php,python,java,mondodb"</span> {{$subdomain}}/v1/search'</div>
        </div>
        <div class="row">
            <div class="col-1 text-left">{{$logged}}</div>
            <div class="col-10 text-left">{"results":[{"id":503,"company_id":"1","jobtitle":"Rails developer","description":"...","contract":"Full-time","location":"","city":"Dublin","country":"Ireland","stack":"ruby,rails,ec2,heroku,java","salary":"0"}]}</div>
        </div>
        <div class="row">
            <div class="col-1 text-left">{{$logged}}</div>
            <div class="col-10 text-left"></div>
        </div>
        <div class="row">
            <div class="col-1 text-left">{{$logged}}</div>
            <div class="col-10 text-left">echo 'And you can link a search to your profile :)'</div>
        </div>
        <div class="row">
            <div class="col-1 text-left">{{$logged}}</div>
            <div class="col-10 text-left">curl -H "Content-Type: application/json" <span class="yellow">-H "email:demo@demo.com"</span> -d "stack=php,python,java,mondodb" {{$subdomain}}/v1/search'</div>
        </div>
        <div class="row">
            <div class="col-1 text-left">{{$logged}}</div>
            <div class="col-10 text-left">{"results":[{"id":2018,"company_id":"1","jobtitle":"Full Stack developer","description":"...","contract":"Full-time","location":"","city":"Buenos Aires","country":"Argentina","stack":"python,django,aws,heroku,mongodb"}]}</div>
        </div>
        <div class="row">
            <div class="col-1 text-left">{{$logged}}</div>
            <div class="col-10 text-left"></div>
        </div>
        <div class="row">
            <div class="col-1 text-left">{{$logged}}</div>
            <div class="col-10 text-left"></div>
        </div>
        <div class="row">
            <div class="col-1 text-left">{{$logged}}</div>
            <div class="col-10 text-left"></div>
        </div>
        <div class="row">
            <div class="col-1 text-left">{{$logged}}</div>
            <div class="col-10 text-left">echo 'Send a friend a post'</div>
        </div>
        <div class="row">
            <div class="col-1 text-left">{{$logged}}</div>
            <div class="col-10 text-left">curl  -H "Content-Type: application/json" <span class="yellow">-d "share=your-friend@your-email.com"</span> {{$subdomain}}/XXXXX/share</div>
        </div>
        <div class="row">
            <div class="col-1 text-left">{{$logged}}</div>
            <div class="col-10 text-left"></div>
        </div>
        <div class="row">
            <div class="col-1 text-left">{{$logged}}</div>
            <div class="col-10 text-left">echo 'There is other options to be discover ;)'</div>
        </div>
        <div class="row">
            <div class="col-1 text-left">{{$logged}}</div>
            <div class="col-10 text-left"><span class="blink_me">|</span></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="/js/jooob.js"></script>
</body>
</html>
