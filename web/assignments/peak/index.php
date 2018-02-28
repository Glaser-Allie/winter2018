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
        <div class='container'>
            <div class='hero-head'>
                <section class='hero is-dark is-bold is-medium'>
                    <div class='hero-head'>
                        <nav class='navbar'>
                            <div class='container'>
                                <div class='navbar-brand'>
                                    <a class='navbar-item'>
                                        <img src='http://peakoilservices.com/assets/img/logo/logo.png' alt='Logo'>
                                    </a>
                                </div>
                                <ul class='breadcrumb has-dot-separator' aria-label='breadcrumbs'>
                                    <li><a href='#'>Home</a></li>
                                    <li><a href='#'>ActiveJobs</a></li>
                                    <li><a href='#'>Job-1</a></li>
                                    <li class='is-active'><a href='#' aria-current='page'>CurrentPage</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </section>
            </div>
    
    
        <div class='hero-body'>
            <div class='container has-text-centered'>
                <h1 class='title'>Active Jobs</h1>
                <h2 class='subtitle'>Carlsbad Yard</h2>
            </div>
        </div>      
            
            <div class='container has-text-centered'>

                <?php
                $statement = $db->prepare("SELECT customer_name, leasecompany_name, well_number, rentalticket_number, loc.county
                            FROM rental_tickets rt
                            INNER JOIN leases l
                            ON rt.lease_id = l.lease_id
                            INNER JOIN lease_companies lc
                            ON l.lease_company_id = lc.lease_company_id
                            INNER JOIN customers c
                            ON c.customer_id = rt.customer_id
                            INNER JOIN locations loc
                            ON loc.location_id = l.location_id
                            ORDER BY c.customer_name");
                $statement->execute();
    
                // Go through each result
                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='tile is-flex-tablet'>
                            <div class='tile is-3'>
                                <div class='card'>
                                    <header class='card-header'>
                                        <p class='card-header-title'>
                                            " . $row['customer_name'] . "
                                        </p>
                                    </header>
                                    <div class='card-content'>
                                        <div class='content'>
                                            " . $row['leasecompany_name'] . "  \n\n   \n\n|\n\n      " . $row['well_number'] . " 
                                            <br> Ticket:\n\n " . $row['rentalticket_number'] ."  <br> " . $row['county'] ."  County
                                            
                                            </div>
                                    </div>
                                    <footer class='card-footer'>
                                        <a href='#' class='card-footer-item'>Save</a>
                                        <a href='#' class='card-footer-item'>Edit</a>
                                        <a href='#' class='card-footer-item'>Delete</a>
                                    </footer>
                                </div>
                                <br>
                            </div>
                            ";
                }
                ?>
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
