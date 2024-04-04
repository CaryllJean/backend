<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
<style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
        }

        .container {
            margin: 0 auto;
            background: linear-gradient(-100deg, #c850c0, #4158d0);
            color: #fff; /* Match the text color of the login page */
            padding: 20px;
            max-width: 1200px;
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10%;
            margin-top: 5%;
        }

        ul {
            display: flex;
        }

        ul li {
            list-style: none;
            margin-left: 10px;
        }

        li a {
            text-decoration: none;
            color: #fff;
            font-size: 20px;
            margin-right: 50px;
        }

        .pic {
            display: flex;
            width: 100%;
        }

        .leftpic {
            display: flex;
            width: 50%;
            justify-content: flex-end;
            margin-right: 10px;
        }

        .rightpic {
            height: 50vh;
            width: 25%;
            background-color: #fff; /* Match the background color of the login page */
            border-radius: 10%;
        }

        .tt {
            text-align: center;
        }

        .txt {
            font-size: 1em;
            font-family: 'Courier New', Courier, monospace;
            margin-bottom: 30px;
        }
    </style>

    <?php
    include_once "nav/header.php";
    ?>
   
   
        <div class="pic">
             <div class="leftpic">
                <img src="image/clinic.jpg" alt="">
             </div>
             <div class="rightpic">
               <div class="tt">
               <h1>noteNest</h1><br/>
               </div>
               <div class="txt">
               <p>
                    You have the freedom to let your thoughts be heard.
                    You have it for yourself. Don't hesitate and write it.
                    NoteNest is happy to welcome your thoughts.
                </p>
               </div>
               <div class="txt">
               <a href="index.php"><button>Dashboard</button></a>
               </div>
              
               
        </div>
    </div>
</body>
</html>