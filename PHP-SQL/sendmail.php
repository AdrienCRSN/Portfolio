

<?php

    include 'databaseconnect.php';
    //On the form : metho="GET"
    if(isset($_GET['submit'])){

        //On your form, these are the name of each input
        $name = $_GET['name'];
        $email = $_GET['email']; 
        $sujet = $_GET['subject']; 
        $msg = $_GET['message'];

        //SEND MAIL
        $mailTo = "adrien.crosnier@hotmail.com";//received mail on this refered email
        $header = "From :".$email;
        $content = "Subject :".$sujet."\n".$msg;
        

        //ADD IN DATABASE
        $check_duplicate = "SELECT * FROM email WHERE email = '$email' AND message = '$msg'"; // X is the name of your TABLE
        $result_check = mysqli_num_rows(mysqli_query($conn,$check_duplicate));

        if($result_check > 0){
            //
            echo '<script>alert("Record already existed")</script>';
        }else{
            mail($mailTo,$sujet,$content,$header);
            $insert_sql =  "INSERT INTO email (nom, email, subject, message)  VALUES ('$name', '$email', '$sujet', '$$msg')";
        
            if (mysqli_query($conn,$insert_sql)){
                echo '<script>alert("New record created successfully")</script>';
            }else{
                echo "Error: " . $insert_sql . "<br>" . mysqli_error($insert_sql);
            }
        }
        
        
    }

?>