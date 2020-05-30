<html>
    <head>
        <title>TAKE LOAN</title>
        <link rel="stylesheet" href="style.css">
</head>
<style>
    #main{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;   
        height: 80%;
    }
    .link{
        padding: 10px;
        margin-bottom: 10px;
        width: 100px;
        height: auto;
        text-align: center;
        justify-content: center;
        color: blanchedalmond ;
        background-color: darkcyan;
        text-decoration: none;
    }
    .link:hover{
        color: darkcyan;
        border: 1px solid darkcyan;
        background-color: blanchedalmond;
    }
    a{
        text-decoration: none;  
    }
    a:visited{
        color: inherit;
    }
    a:active{
        color: inherit;
    }
</style>
<body>
    <div id="main">
        <h1>Welcome to TAKE LOAN</h1>
        <h3>Who are you ?</h3>
        <a href="/LOAN/user/login.php"><div class="link">User</div></a>
        <a href="/LOAN/admin/admin.php"><div class="link">Admin</div></a>
    </div>
</body>
</html>