<?php

include("baglanti.php");

$username_err=$parola_err="";

if(isset($_POST["giris"]))
{

if(empty($_POST["kullaniciadi"]))
{
  $username_err="Kullanıcı adı boş geçilemez.";
}

  else{
    $username=$_POST["kullaniciadi"];
  }


  if(empty($_POST["parola"]))
  {
    $parola_err="Parola boş geçilemez.";
  }
  else
  {
    $parola=$_POST["parola"];
  }


  if(isset($username) && isset($parola))
  {
    $secim = "SELECT * FROM kullanicilar WHERE kullanici_adi ='$username'";
    $calistir=mysqli_query($baglanti,$secim);
    $kayitsayisi = mysqli_num_rows($calistir);

    if($kayitsayisi>0)
    {
      $ilgilikayit = mysqli_fetch_assoc($calistir);
      $hashlisifre=$ilgilikayit["parola"];
      
      if(password_verify($parola,$hashlisifre))
      {
        session_start();
        $_SESSION["kullanici_adi"]=$ilgilikayit["kullanici_adi"];
        $_SESSION["email"]=$ilgilikayit["email"];
        header("location:profile.php");
      
    }
    else{ 
      echo '<div class="alert alert-danger" role="alert">
      Kullanıcı Adı Yanlış
    </div>';
    }
  }
  
  
  
    mysqli_close($baglanti);
        }
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">

    <title>Üye Giriş İşlemi</title>
  </head>
  <body>
  
  <div class="container p-5">
    <div class="card p-5">

                    <form action="login.php" method="POST">
                    
                    <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Kullanıcı Adı</label>
                    <input type="text" class="form-control
                    
                   <?php
                    if(!empty($username_err))
                    {
                      echo "is-invalid";
                    }
                   ?>


                    " id="exampleInputEmail1" name="kullaniciadi">
                    <div id="validationServer03Feedback" class="invalid-feedback">
      <?php
echo $username_err;
       ?>
    </div>
                </div>
        
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Parola</label>
                    <input type="password" class="form-control
                    <?php
                    if(!empty($parola_err))
                    {
                      echo "is-invalid";
                    }
                   ?> " id="exampleInputPassword1" name="parola">
                    <div id="validationServer03Feedback" class="invalid-feedback">
      <?php
      echo $parola_err;
      ?>
    </div>
                </div>

              
                
                <button type="submit" name="giris" class="btn btn-primary">GİRİŞ YAP</button>
                </form>
    </div>
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    -->
  </body>
</html>