<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://rickandmortyapi.com/api/character',
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
// echo $response;
$api =json_decode($response, true);

// echo "<pre>";
// print_r($api['results']);
// echo"<pre>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" href="../assets/img/1.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/stylepersonajes.css">
    <title>Personajes</title>
    
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="../assets/img/1.svg" alt="" width="200" height="80"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <center>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active letra" aria-current="page" href="http://localhost:8080/rickandmorty_navas/index.php">Episodios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active letra" aria-current="page" href="http://localhost:8080/rickandmorty_navas/views/characters.php">Personajes</a>
        </li>
       
      </ul>
      </center>
    </div>
  </div>
</nav>
<br>
<br>

<center>
  <h1 class="titulo">Personajes</h1>
  <img src="../assets/img/1.svg" alt="" width="500" class="imagen"></center>
<br>
<br>

<div class="container">

<?php



foreach ($api ['results'] as $value)
{

    $id = $value ['id'];
    $nombre = $value ['name'];
    $status = $value ['status'];
    $species = $value ['species'];
    $gender = $value ['gender'];
    $origin = $value ['origin']['name'];
    $location = $value ['location']['name'];
    $image = $value ['image'];
    $episode = $value ['episode'];
    $url = $value ['url']
  
    
   ?>


<form class="formulario" action="./detalle_personajes.php" method="post">
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
    <?php echo '<img src="' . $image . '" class="img-fluid rounded-start">';?>
    <input type="hidden" value="<?php echo $url?>" name="url">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h3 class="card-title"><?php echo $id.'. '.$nombre?></h3>
        <p class="card-text"><strong>Estatus: </strong><small class="text-muted"><?php echo $status?></small></p>
        <p class="card-text"><strong>Especie: </strong><small class="text-muted"><?php echo $species?></small></p>
        <p class="card-text"><strong>Género: </strong><small class="text-muted"><?php echo $gender?></small></p>
        <p class="card-text"><strong>Origen: </strong><small class="text-muted"><?php echo $origin?></small></p>
        <p class="card-text"><strong>Ubicación: </strong><small class="text-muted"><?php echo $location?></small></p>
        <center><button type="submit" class="btn">Detalle</button></center>
      </div>
    </div>
  </div>
</div>
</form>
<?php 

?>



<?php } ?>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>


