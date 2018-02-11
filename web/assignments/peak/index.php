<?php
session_start();
    require_once 'database.php';
    $db = get_db();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Peak</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  </head>

  <body>
  <section class="hero is-small">
  <div class="hero-head">
    <nav class="navbar">
      <div class="container">
        <div class="navbar-brand">
          <a class="navbar-item">
            <img src="http://peakoilservices.com/assets/img/logo/logo.png" alt="Logo">
          </a>
        </div>
      </div>
    </nav>
  </div>

  <!-- Hero content: will be in the middle -->
  <div class="hero-body">
    <div class="container has-text-centered">        
        <h1 class="title">
        Active Jobs
      </h1>
      <h2 class="subtitle">
        Carlsbad Yard
      </h2>
    </div>
      
      
      <br>
      
      <br>
      
      <table class= "table is-striped">
    <thead>
      <tr>
        <th>Customer</th>
        <th>Rig</th>
        <th>Lease</th>
        <th>Map</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <a href=""><td>Three</td>
        <td>Affirm</td>
        <td>Six</td></a> 
        <td><a href=""><i class="fas fa-map-marker-alt"></i></a></td>
      </tr>
        <tr>
        <a href=""><td>Three</td>
        <td>BHP - Mancamp</td>
        <td>Six</td></a> 
        <td><a href=""><i class="fas fa-map-marker-alt"></i></a></td>
      </tr>
        <tr>
        <a href=""><td>Three</td>
        <td>BHP - Frac</td>
        <td>Six</td></a> 
        <td><a href=""><i class="fas fa-map-marker-alt"></i></a></td>
      </tr>
        <tr>
        <a href=""><td>Three</td>
        <td>Marshall & Winston - GeneratorOnly</td>
        <td>Six</td></a> 
        <td><a href=""><i class="fas fa-map-marker-alt"></i></a></td>
      </tr>
        <tr>
        <a href=""><td>Three</td>
        <td>Marshall & Winston - Rig</td>
        <td>Six</td></a> 
        <td><a href=""><i class="fas fa-map-marker-alt"></i></a></td>
      </tr>
        <tr>
        <a href=""><td>Three</td>
        <td>Rosehill - Completion 1</td>
        <td>Six</td></a> 
        <td><a href=""><i class="fas fa-map-marker-alt"></i></a></td>
      </tr>
        <tr>
        <a href=""><td>Three</td>
        <td>Rosehill - Completion 2</td>
        <td>Six</td></a> 
        <td><a href=""><i class="fas fa-map-marker-alt"></i></a></td>
      </tr>
        <tr>
        <a href=""><td>Three</td>
        <td>Shell</td>
        <td>Six</td></a> 
        <td><a href=""><i class="fas fa-map-marker-alt"></i></a></td>
      </tr>
        <tr>
        <a href=""><td>Three</td>
        <td>Shell - Completion 1</td>
        <td>Six</td></a> 
        <td><a href=""><i class="fas fa-map-marker-alt"></i></a></td>
      </tr>
        <tr>
        <a href=""><td>Three</td>
        <td>Shell - Completion 2</td>
        <td>Six</td></a> 
        <td><a href=""><i class="fas fa-map-marker-alt"></i></a></td>
      </tr>
        <tr>
        <a href=""><td>Three</td>
        <td>RSP 201</td>
        <td>Six</td></a> 
        <td><a href=""><i class="fas fa-map-marker-alt"></i></a></td>
      </tr>
        <tr>
        <a href=""><td>Three</td>
        <td>RSP 202</td>
        <td>Six</td></a> 
        <td><a href=""><i class="fas fa-map-marker-alt"></i></a></td>
      </tr>
        <tr>
        <a href=""><td>Three</td>
        <td>RSP 204</td>
        <td>Six</td></a> 
        <td><a href=""><i class="fas fa-map-marker-alt"></i></a></td>
      </tr>
    </tbody>
  </table>
  </div>
      
    <?php
        $statement = $db->query('SELECT book, chapter, verse, content FROM scriptures.scriptures');
        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
        {
          echo '<p><b>' . $row['book'] . ' ' . $row['chapter'] .':' . $row['verse'] . ' </b>- ' . $row['content'] . '</p>';
        }
    ?>
      
    

  <!-- Hero footer: will stick at the bottom -->
  <div class="hero-foot">
    <nav class="tabs">
      <div class="container">
        
      </div>
    </nav>
  </div>
</section>
  </body>
</html>