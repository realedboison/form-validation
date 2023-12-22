<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
</head>
<style>
    *{
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }
    body {
        font-family: 'Verdana', sans-serif;
    }
    .form-wrapper {
        width: 600px;
        margin-block: 40px;
        height: auto;
        margin-inline: auto;
        border: 1px solid grey;
        border-radius: 12px;
        
    }
    h2 {
        text-align: center;
        margin-block: 40px;
    }
    form > div {
        /* margin: auto 0; */
        /* background: #000; */
        display: flex;
        flex-direction: column;
        margin: 30px;
    }

    form > div input {
        padding: 10px;
        border-radius: 8px;
        border: 1px solid grey;
        font-size: 18px;
    }

    form > div label {
        padding-bottom: 10px;
        padding-top: 10px;
        font-weight: 700;
    }
    form > div span {
        color: red;
        /* border: 1px solid red; */
        font-size: 14px;
        margin-top: 5px;
    }
    input[type='radio'] {
        margin-right: 10px;
    }

    textarea {
        padding: 10px;
        border-radius: 8px;
        border: 1px solid grey;
        font-size: 18px;
    }
    .submit > input {
        font-size: 18px;
        border-radius: 0;
        text-transform: uppercase;
        padding: 15px;
        cursor: pointer;
        margin-top: 10px;

    }
    .warning {
        text-align: center;
        color: red;
    }

    .output-container {
    font-weight: bold;
    margin-inline: auto;
    padding: 40px;
    width: 300px;
}
</style>
<body>
  





<?php 
 
$nameError = $emailError = $genderError = "";
$name = $email = $gender = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"]))
        {$nameError = "Name is Required";}
    else 
        {$name = text_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name))
            {$nameError = "Only letters and whitespace allowed";}
    }

    if (empty($_POST["email"]))
        {$emailError = "Email is required";}
    else 
        {$name = text_input($_POST["email"]);
        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
            {$emailError = "Invalid Email";}
    }
}



// if(isset($POST["submit"])) {}


function text_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
};
?>

<div class="form-wrapper" method="POST">
    <h2>FORM VALIDATION</h2>
    <p class="warning"><span>* Required field</span></p>

   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <div>
        <label for="">Name <span class="warning">*</span></label>
       <input type="text" name="name" value="<?php echo $name;?>">
       <span><?php echo $nameError;?></span>
   </div>
    <div>
        <label for="name">Email <span class="warning">*</span></label>
        <input type="text" name="email" value="<?php echo $email;?>">
        <span><?php echo $emailError;?></span>
    </div>
    <div>
        <div>
            <input type="radio" name="gender" value="Male">
            <label for="name">Male</label> 
        </div>

        <div>
            <input type="radio" name="gender" value="Female" >
            <label for="name">Female</label>
        </div>

        <span>Select your gender.</>
    </div>
    
    <div>
        <label for="message">Message</label>
        <textarea name="" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="submit">
    <input type="submit" name="submit" value="submit">
    </div>
    </form>
</div>

<?php

// echo "<h2>Your Input:</h2>";
// echo $name;
// echo "<br>";
// echo $email;
// echo "<br>";
// echo $gender;
// echo "<br>";
// echo $message;

echo "<div class='output-container'>";
echo "<h2>Your Input:</h2>";
echo "<p class='output-item'>Name: $name</p>";
echo "<p class='output-item'>Email: $email</p>";
echo "<p class='output-item'>Gender: $gender</p>";
echo "<p class='output-item'>Message: $message</p>";
echo "</div>"

?>

</body>
</html>