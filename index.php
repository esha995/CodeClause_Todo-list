<?php
     
    if(array_key_exists('submit',$_GET)){
        if($_GET['city']) {
            $error = "Your input field is empty";
        }
     
    if($_GET['city']) {
         
     
        $weatherArray = json_decode($urlContents, true);
         
        if ($weatherArray['cod'] == 200) {
         
            $weather = "The weather in ".$_GET['city']." is currently '".$weatherArray['weather'][0]['description']."'. ";
 
            $tempInCelcius = intval($weatherArray['main']['temp'] - 273);
 
            $weather .= " The temperature is ".$tempInCelcius."&deg;C and the wind speed is ".$weatherArray['wind']['speed']."m/s.";
             
        } else {
             
            $error = "Could not find city - please try again.";
             
        }
         
    }
}
 
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
 
  <title>Weather App</title>
    
    <style>
        body{
            margin: 0px;
            padding: 0px;
            box-sizing:border-box;
            background-image:url(weather-img.jpg)
            color : white;
            background-size: cover;
            background-attachment: fixed;

        }
        .container{
            text-align: center;
            justify-content: center;
            align-items: center;
            width: 440px;

        }
        h1{
            font-weight:700;
            margin:150px;
        }
        .input{
            width:350px;
            padding: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
       
          <h1>What's The Weather?</h1>
           
           
           
          <form action="" method="GET">
  <fieldset class="form-group">
   <p> <label for="city">Enter the name of a city.</label></p>
   <p> <input type="text" class="form-control" name="city" id="city" placeholder="Eg. London, Tokyo" value = "<?php echo $_GET['city']; ?>"></p>
  </fieldset>
   
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    <div class="output">
        <?php echo $error;
        if ($weather) {
                   
            echo '<div class="alert alert-success" role="alert">
'.$weather.'
</div>';
             
        } else if ($error) {
             
            echo '<div class="alert alert-danger" role="alert">
'.$error.'
</div>';
             
        }
        ?>
    </div>
</body>
</html>