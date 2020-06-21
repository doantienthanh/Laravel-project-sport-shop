<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/home.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>Title</title>
</head>

<body>
@include('partials/header')
@yield('content')
@include('partials/footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
     <script>
        var btn = document.getElementsByClassName("btn btn-outline-secondary");
        console.log(btn);
       
        for(var i=0;i<8;i++){
            if(btn[i].clicked){
                console.log("ok");  
                check(btn[i]);}
        }

        function check(btn){
            btn.className="btn btn-outline-secondary category-active"
        }
     </script>
    <script src="/js/app.js"></script>
     
</body>

</html>
