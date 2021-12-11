<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JitasFoundation</title>
    
    <link rel="stylesheet" href="style.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
   
</head>

<body>
    <style>
        *{
            padding:0;
            margin:0;
            font-family: 'Merriweather', serif;
        }
        a{
            text-decoration:none;
            color:white;
        }
        
        h1,p{
            text-align:center;
        }
        p{
            font-size:20px;
        }
        
        input,textarea{
            
            border: 2px solid black;
            border-radius: 6px;
            outline: none;
            width: 80%;
            margin: 11px;
            padding: 7px;
            font-size: 24px;
        }
        form{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .btn{
            color: white;
            background: grey;
            padding: 8px 12px;
            font-size: 20px;
            border: 2px solid white;
            
            cursor: pointer;
            transition: 0.3s ease-in;
        }
        .btn:hover{
            background: white;
            color: black;
            border:2px black ;

        }
        .bg{
            width: 100%;
            height: 100vh;
            position: absolute;
            z-index: -1;
            opacity: 0.6;
            
        }
        .submitMsg{
            color: green;
            font-size: 30px;

        }

    </style>
    <?php
     $insert=false; 
    if(isset($_POST['name'])){
    include 'config.php';
   
    $name=$_POST['name'];
    $email=$_POST['email'];
    $feedback=$_POST['feedback'];
    $sql=" INSERT INTO `feedback` ( `name`, `email`, `feedback`, `dt`) VALUES ( '$name', '$email', '$feedback', current_timestamp()); ";
    /* echo $sql; */
    if($conn->query($sql)==true){
        /* echo "<script>alert('Your feedback has been successfully submitted!'); </script>"; */
        $insert=true;

    }
    else{
        echo "ERROR:$sql<br>$conn->error";
    }
    $conn->close();

}
    ?>
    <img class="bg" src="background.jpg" alt="">
   
               <div class="navbar">
               <div class="logo"><h3>Jitas<span>Foundation</span>
               </h3></div>
               <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
              
               </ul>
               </div>

          
                
                    <h1>Add your feedbacks here</h1>
                    <p>Enter your feedbacks here to help us serve you better!</p>
                    <?php
                    if($insert==true){
                        echo "<p class='submitMsg'> Thanks for taking time in filling this form!</p>";
                    }
                    ?>
                    <form action="contact.php" method="post">
                    
                    <input type="text" name="name" id="name" placeholder="Enter name here">
                    <input type="email" name="email" id="email" placeholder="Enter email">
                    <textarea name="feedback" id="feedback" cols="30" rows="8" placeholder="Enter your feedback"></textarea>
                    <button class="btn" type="submit" name="submit">Submit</button>
                    
                    </form>
                  
                
                    
                
        </div>
    </div>

</body>

</html>