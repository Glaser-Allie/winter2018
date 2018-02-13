<?php

require "database.php";
$db = get_db();
?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Carlsbad Field Ops</title>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css'>
        <script defer src='https://use.fontawesome.com/releases/v5.0.6/js/all.js'></script>
    </head>
    
    <body>
        <section class='hero is-small'>
            <div class='hero-head'>
                <nav class='navbar'>
                    <div class='container'>
                        <div class='navbar-brand'>
                            <a class='navbar-item'>
                                <img src='http://peakoilservices.com/assets/img/logo/logo.png' alt='Logo'>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
    
                <div class='hero-body'>
                    <div class='container has-text-centered'>
                        <h1 class='title'>Active Jobs</h1>
                        <h2 class='subtitle'>Carlsbad Yard</h2>
                    </div>
                </div>
       
        <div class='columns'>
            <div class='column'></div>
            <div class='column is-three-quarters'>
                <table class= 'table is-striped is-fullwidth'>
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
                    <td>Affirm</td>
                    <td>ToBeAdded</td>
                    <td>ToBeAdded</td>
                    <td><a href=''><i class='fas fa-map-marker-alt'></i></a></td>
                </tr>
                <tr>
                    <td>BHP-Mancamp</td>
                    <td>ToBeAdded</td>
                    <td>ToBeAdded</td>
                    <td><a href=''><i class='fas fa-map-marker-alt'></i></a></td>
                </tr>
                <tr>
                    <td>BHP-Frac</td>
                    <td>ToBeAdded</td>
                    <td>ToBeAdded</td>
                    <td><a href=''><i class='fas fa-map-marker-alt'></i></a></td>
                </tr>
                <tr>
                    <td>Marshall & Winston</td>
                    <td>ToBeAdded</td>
                    <td>ToBeAdded</td>
                    <td><a href=''><i class='fas fa-map-marker-alt'></i></a></td>
                </tr>
                <tr>
                    <td>Marshall & Winston - GeneratorOnly</td>
                    <td>ToBeAdded</td>
                    <td>ToBeAdded</td>
                    <td><a href=''><i class='fas fa-map-marker-alt'></i></a></td>
                </tr>
            </tbody>
        </table>
                </div>
                <div class='column'></div>
                    </div>
  

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