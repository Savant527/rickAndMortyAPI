<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $_POST['url'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
$api = json_decode($response, true);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="shortcut icon" href="../assets/img/1.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/stylepersonajesdetalle.css">
  <title>Detalle Personajes</title>

</head>

<body>

  <?php


  ?>
  
  <center>
    <h1 class="titulo">Personaje: <?php echo $api['name'] ?></h1>
  </center>

  <div class="container">
      <div class="container-imagen">
  <br>
  <br>
      <center>
      <?php echo '<img src="' . $api['image'] . '" class="img">'; ?>
      <br>
      <br>
      <br>
    </center>
      </div>
  <div class="container-texto">
 <center>
 <p class="card-text"><strong>Estatus: </strong><small class="text-muted"><?php echo $api['status'] ?></small></p>
  <p class="card-text"><strong>Especie: </strong><small class="text-muted"><?php echo $api['species'] ?></small></p>
  <p class="card-text"><strong>Género: </strong><small class="text-muted"><?php echo $api['gender'] ?></small></p>
  <p class="card-text"><strong>Origen: </strong><small class="text-muted"><?php echo $api['origin']['name'] ?></small></p>
  <p class="card-text"><strong>Ubicación: </strong><small class="text-muted"><?php echo $api['location']['name'] ?></small></p>
  <p class="card-text"><strong>Creado: </strong><small class="text-muted"><?php echo $api['created'] ?></small></p>
 </center>
  
  </div>
  <br>
  <br>
  <br>
  </div>
  
  <center>
    <h1 class="titulo">Capítulos</h1>
  </center>
  <?php
  
  foreach ($api['episode'] as $value1) {

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => $value1,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    $episode1 = json_decode($response, true);

    $imagenes = array(

      "../assets/img/1.jpg",
      "../assets/img/2.jpg",
      "../assets/img/3.jpg",
      "../assets/img/4.jpg",
      "../assets/img/5.jpg",
      "../assets/img/6.jpg",
      "../assets/img/7.jpg",
      "../assets/img/8.jpg",
      "../assets/img/9.jpg",
      "../assets/img/10.jpg",
      "../assets/img/11.jpg",
      "../assets/img/12.jpg",
      "../assets/img/13.jpg",
      "../assets/img/14.jpg",
      "../assets/img/15.jpg",
      "../assets/img/16.jpg",
      "../assets/img/17.jpg",
      "../assets/img/18.jpg",
      "../assets/img/19.jpg",
      "../assets/img/20.jpg",
    );

$posicion= $episode1['id']-1;

if ($episode1['id']>20) {
  $link = '../assets/img/1.png';
}
else {
  $link = $imagenes[$posicion];
}

  ?>


    <center>
      <br>
      <br>
      <br>
    <form class="formulario" action="../views/detalle_episodio.php" method="post">
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="<?php echo $link ?>" class="img-fluid rounded-start">
            <input type="hidden" value="<?php echo $episode1['url'] ?>" name="url">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h3 class="card-title"><?php echo $episode1['id']. '. '. $episode1['name'] ?></h3>
              
              <center><button type="submit" class="btn">Detalle</button></center>
            </div>
          </div>
        </div>
      </div>
    </form>
    </center>
   
   
  <?php
  } ?>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>