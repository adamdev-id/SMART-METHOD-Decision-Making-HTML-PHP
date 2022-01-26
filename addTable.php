<?php
  include 'config/connection.php';

  if (isset($_POST['submit']))
  {
    $selection = $_GET['selection'];
    switch ($selection)
    {
      case "table_add":
      {
        // code...
        $criteriaMerk         = $_POST["criteriaMerk"];
        $criteriaHarga        = $_POST["criteriaHarga"];
        $criteriaMechanical   = $_POST["criteriaMechanical"];
        $criteriaCable        = $_POST["criteriaCable"];
        $criteriaLighting     = $_POST["criteriaLighting"];
        $criteriaWeight       = $_POST["criteriaWeight"];
        $criteriaConnectivity = $_POST["criteriaConnectivity"];
        $criteriaKeycaps      = $_POST["criteriaKeycaps"];
        $criteriaBuildQuality = $_POST["criteriaBuildQuality"];
        $criteriaWarranty     = $_POST["criteriaWarranty"];
        $criteriaPopularity   = $_POST["criteriaPopularity"];
        
        echo $criteriaMerk . $criteriaHarga . $criteriaMechanical . $criteriaCable . $criteriaLighting . $criteriaWeight . $criteriaConnectivity . $criteriaKeycaps . $criteriaBuildQuality . $criteriaWarranty . $criteriaPopularity;

        //$total = $_POST["total"];  


        $sql = "INSERT INTO dataStorage (Merk, Harga, Cable, Mechanical, Lighting, Weight, Connectivity, Keycaps, BuildQuality, Warranty, Popularity) 
                       VALUES ('$criteriaMerk', $criteriaHarga, $criteriaMechanical, $criteriaCable, $criteriaLighting, $criteriaWeight, $criteriaConnectivity, $criteriaKeycaps, $criteriaBuildQuality, $criteriaWarranty, $criteriaPopularity)";

        $queryResult = mysqli_query($conn, $sql);

        $result = [
          'criteriaMerk'         => $criteriaMerk,
          'criteriaHarga'        => $criteriaHarga,
          'criteriaMechanical'   => $criteriaMechanical,
          'criteriaCable'        => $criteriaCable,
          'criteriaLighting'     => $criteriaLighting,
          'criteriaWeight'       => $criteriaWeight,
          'criteriaConnectivity' => $criteriaConnectivity,
          'criteriaKeycaps'      => $criteriaKeycaps,
          'criteriaBuildQuality' => $criteriaBuildQuality,
          'criteriaWarranty'     => $criteriaWarranty,
          'criteriaPopularity'   => $criteriaPopularity,
        ];

        if ($queryResult)
        {
          header("location: index.php");
        }
        else
        {
          echo "Error! " . mysqli_error($conn);
        }
      }
      break;
      case "table_update":
      {
        $id_product           = $_POST["update_idproduct"];
        $criteriaMerk         = $_POST["update_criteriaMerk"];
        $criteriaHarga        = $_POST["update_criteriaHarga"];
        $criteriaMechanical   = $_POST["update_criteriaMechanical"];
        $criteriaCable        = $_POST["update_criteriaCable"];
        $criteriaLighting     = $_POST["update_criteriaLighting"];
        $criteriaWeight       = $_POST["update_criteriaWeight"];
        $criteriaConnectivity = $_POST["update_criteriaConnectivity"];
        $criteriaKeycaps      = $_POST["update_criteriaKeycaps"];
        $criteriaBuildQuality = $_POST["update_criteriaBuildQuality"];
        $criteriaWarranty     = $_POST["update_criteriaWarranty"];
        $criteriaPopularity   = $_POST["update_criteriaPopularity"];
        
        //echo $criteriaMerk . $criteriaHarga . $criteriaMechanical . $criteriaCable . $criteriaLighting . $criteriaWeight . $criteriaConnectivity . $criteriaKeycaps . $criteriaBuildQuality . $criteriaWarranty . $criteriaPopularity;

        //$total = $_POST["total"];  


        $sql = "UPDATE dataStorage SET 
                Merk          = '$criteriaMerk', 
                Harga         = $criteriaHarga, 
                Cable         = $criteriaCable, 
                Mechanical    = $criteriaMechanical, 
                Lighting      = $criteriaLighting, 
                Weight        = $criteriaWeight, 
                Connectivity  = $criteriaConnectivity, 
                Keycaps       = $criteriaKeycaps, 
                BuildQuality  = $criteriaBuildQuality, 
                Warranty      = $criteriaWarranty, 
                Popularity    = $criteriaPopularity
                WHERE id_product = $id_product";


        $queryResult = mysqli_query($conn, $sql);

        if ($queryResult)
        {
          header("location: index.php?message=success&updateditem=" . str_replace(" ", "_", $criteriaMerk));
        }
        else
        {
          echo "Error! " . mysqli_error($conn);
        }
      }
      break;
      case "table_update_kriteria":
      {
        $id_crit    = $_POST["update_idcrit"];
        $c1         = $_POST["update_c1"];
        $c2         = $_POST["update_c2"];
        $c3         = $_POST["update_c3"];
        $c4         = $_POST["update_c4"];
        $c5         = $_POST["update_c5"];
        $c6         = $_POST["update_c6"];
        $c7         = $_POST["update_c7"];
        $c8         = $_POST["update_c8"];
        $c9         = $_POST["update_c9"];
        $c10        = $_POST["update_c10"];
        
        //echo $criteriaMerk . $criteriaHarga . $criteriaMechanical . $criteriaCable . $criteriaLighting . $criteriaWeight . $criteriaConnectivity . $criteriaKeycaps . $criteriaBuildQuality . $criteriaWarranty . $criteriaPopularity;

        //$total = $_POST["total"];  

        $sql = "UPDATE data_criteria SET 
                c1  = $c1,
                c2  = $c2,
                c3  = $c3,
                c4  = $c4,
                c5  = $c5,
                c6  = $c6,
                c7  = $c7,
                c8  = $c8,
                c9  = $c9,
                c10 = $c10
                WHERE id_crit = $id_crit";


        $queryResult = mysqli_query($conn, $sql);

        if ($queryResult)
        {
          header("location: index.php?message=success_criteria");
        }
        else
        {
          echo "Error! " . mysqli_error($conn);
        }
      }
      break;
    }
  }

?>