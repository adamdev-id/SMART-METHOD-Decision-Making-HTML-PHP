<?php 
include 'config/connection.php';
require_once 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <!-- Dashboard CSS -->
    <link rel="stylesheet" href="assets/vendor/dashboard/dashboard.css">
    <!-- Styles CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
	<!-- Bootstrap Javascripts -->
	<!-- <script src="assets/js/script.js"> </script> -->
	<script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-3.6.0.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- <script src="assets/vendor/dashboard/dashboard.js"></script> -->

    <title>Metode SMART</title>

    <script language="javascript" type="text/javascript">
        $(document).ready(function(){
            // $("button").click(function()
            // {
                setInterval(function()
                {
                    loadlink() // this will run after every 5 seconds
                }, $max0);

			/*
                $.get("date-time.php", function(data)
                {
                    // Display the returned data in browser
                    $("#time").html(data);
                });
			*/
            // });
        });
    </script>
</head>
<body>
    <?php
        if(!empty($_GET['message']) || !empty($_GET['updateditem']))
        {
            switch($_GET['message'])
            {
                case "success":
                {
                    $updateditem_str = str_replace("_", " ", $_GET['updateditem']);
                    echo "<script type='text/javascript'>";
                    echo 'swal("Data Berhasil Diperbarui!", "Produk: \n' . $updateditem_str . '","success");';
                    echo "</script>";
                }
                break;
                case "success_criteria":
                {
                    echo "<script type='text/javascript'>";
                    echo 'swal("Data Berhasil Diperbarui!", "","success");';
                    echo "</script>";
                }
                break;
            }
        }

        $min = 0;
        $max = 0;
        $queryMAXMIN = mysqli_query($conn, "SELECT 
        min(least(Harga, Mechanical, Cable, Lighting, Weight, Connectivity, Keycaps, BuildQuality, Warranty, Popularity)) as GETMIN, 
        max(greatest(Harga, Mechanical, Cable, Lighting, Weight, Connectivity, Keycaps, BuildQuality, Warranty, Popularity)) as GETMAX
        FROM datastorage;");

        while ($row = mysqli_fetch_assoc($queryMAXMIN)) 
        {
            $max  = $row['GETMAX'];
            $min  = $row['GETMIN'];
        }
    ?>
    <div class="container">
        <!-- -->
        <br>
        <!-- -->

        <div class="mainbg">
	        <br>
        	<div class="jumbotron">
	            <center>
                	<b>
	                    <h4>Ranking System (SMART Method)</h4>
                    	<h5></h5>
                    	<p>-</p>
                        <hr>
                        <h4>Masukkan Bobot Angka <?php echo $min?> Sampai dengan <?php echo $max?></h4>
                        <hr>
                	</b>
            	</center>
        	</div>

	    	<div class="col-md-12 offset-md">
	    		<form action="addTable.php?selection=table_add" class="form" method="POST">
	    		<!--<form action="printResult.php" class="centered-wrapper form" method="post">-->
                <input type="text" id="criteriaMerk" name="criteriaMerk" class="form-control" placeholder="Merk (Steel Series)" required style="text-align:center">
	    		<div class="row">
                    <div class="input-group" id="inputField">
	    			    <hr>
	    			    <!--<label for="criteriaHarga" class="form-label">Harga</label>-->
	    			    <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="criteriaHarga" name="criteriaHarga" class="form-control input-sm" placeholder="Harga" required style="text-align:center">
                        <span class="input-group-btn" style="width:10px;"></span>
	    			    <br>

	    			    <!--<label for="criteriaMechanical" class="form-label">Mechanical</label>-->
	    			    <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="criteriaMechanical" name="criteriaMechanical" class="form-control input-sm" placeholder="Mechanical" required style="text-align:center">
                        <span class="input-group-btn" style="width:10px;"></span>
	    			    <br>

	    			    <!--<label for="criteriaCable" class="form-label">Cable</label>-->
	    			    <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="criteriaCable" name="criteriaCable" class="form-control input-sm" placeholder="Cable" required style="text-align:center">
                        <span class="input-group-btn" style="width:10px;"></span>
                        <br>

	    			    <!--<label for="criteriaLighting" class="form-label">RGB Lighting</label>-->
	    			    <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="criteriaLighting" name="criteriaLighting" class="form-control input-sm" placeholder="RGB Lighting" required style="text-align:center">
                        <span class="input-group-btn" style="width:10px;"></span>
	    			    <br>

                        <!--<label for="criteriaWeight" class="form-label">Weight</label>-->
                        <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="criteriaWeight" name="criteriaWeight" class="form-control input-sm" placeholder="Weight" required style="text-align:center">
                        <span class="input-group-btn" style="width:10px;"></span>
                        <br>

                        <!--<label for="criteriaConnectivity" class="form-label">Connectivity</label>-->
                        <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="criteriaConnectivity" name="criteriaConnectivity" class="form-control input-sm" placeholder="Connectivity" required style="text-align:center">
                        <span class="input-group-btn" style="width:10px;"></span>
                        <br>

                        <!--<label for="criteriaKeycaps" class="form-label">Keycaps</label>-->
                        <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="criteriaKeycaps" name="criteriaKeycaps" class="form-control input-sm" placeholder="Keycaps" required style="text-align:center">
                        <span class="input-group-btn" style="width:10px;"></span>
                        <br>

                        <!--<label for="criteriaBuildQuality" class="form-label">BuildQuality</label>-->
                        <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="criteriaBuildQuality" name="criteriaBuildQuality" class="form-control input-sm" placeholder="BuildQuality" required style="text-align:center">
                        <span class="input-group-btn" style="width:10px;"></span>
                        <br>

                        <!--<label for="criteriaWarranty" class="form-label">Weight</label>-->
                        <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="criteriaWarranty" name="criteriaWarranty" class="form-control input-sm" placeholder="Warranty" required style="text-align:center">
                        <span class="input-group-btn" style="width:10px;"></span>
                        <br>

                        <!--<label for="criteriaPopularity" class="form-label">Weight</label>-->
                        <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="criteriaPopularity" name="criteriaPopularity" class="form-control input-sm" placeholder="Popularity" required style="text-align:center">
                        <span class="input-group-btn" style="width:10px;"></span>
                        <br>
                        
	    			    <input class="but btn btn-success" type="submit" name="submit" value="Add to Table" style="color: green">
	    			    <hr>
                    </div>
                </form>

                <hr>

                <center> <h3> Criteria </h3> </center>
                <table id="main-table-kriteria" class="table" style="background-color: #FFFFFF;">
                        <thead>
                            <tr>
                            <th scope="col" style="width: 0%">ID Kriteria</th>
                            <th scope="col" style="width: 0%">C1</th>
                            <th scope="col" style="width: 0%">C2</th>
                            <th scope="col" style="width: 0%">C3</th>
                            <th scope="col" style="width: 0%">C4</th>
                            <th scope="col" style="width: 0%">C5</th>
                            <th scope="col" style="width: 0%">C6</th>
                            <th scope="col" style="width: 0%">C7</th>
                            <th scope="col" style="width: 0%">C8</th>
                            <th scope="col" style="width: 0%">C9</th>
                            <th scope="col" style="width: 0%">C10</th>
                            <th scope="col" style="width: 0%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = mysqli_query($conn, "SELECT * FROM data_criteria");
                                while ($row = mysqli_fetch_assoc($query)) 
                                {
                                    $criteria                = $row['id_crit'];
                                    $normalized_harga        = number_format($row['c1'] / $max, 2, '.', '');
                                    $normalized_mechanical   = number_format($row['c2'] / $max, 2, '.', '');
                                    $normalized_cable        = number_format($row['c3'] / $max, 2, '.', '');
                                    $normalized_lighting     = number_format($row['c4'] / $max, 2, '.', '');
                                    $normalized_weight       = number_format($row['c5'] / $max, 2, '.', '');
                                    $normalized_connectivity = number_format($row['c6'] / $max, 2, '.', '');
                                    $normalized_keycaps      = number_format($row['c7'] / $max, 2, '.', '');
                                    $normalized_buildquality = number_format($row['c8'] / $max, 2, '.', '');
                                    $normalized_warranty     = number_format($row['c9'] / $max, 2, '.', '');
                                    $normalized_popularity   = number_format($row['c10'] / $max, 2, '.', '');
                            ?>

                            <tr>
                                <td><?php echo $criteria                ?></td>
                                <td><?php echo $normalized_harga        * 100 ?></td>
                                <td><?php echo $normalized_mechanical   * 100 ?></td>
                                <td><?php echo $normalized_cable        * 100 ?></td>
                                <td><?php echo $normalized_lighting     * 100 ?></td>
                                <td><?php echo $normalized_weight       * 100 ?></td>
                                <td><?php echo $normalized_connectivity * 100 ?></td>
                                <td><?php echo $normalized_keycaps      * 100 ?></td>
                                <td><?php echo $normalized_buildquality * 100 ?></td>
                                <td><?php echo $normalized_warranty     * 100 ?></td>
                                <td><?php echo $normalized_popularity   * 100 ?></td>
                                <td><button type="button" id="button_update_kriteria" class="btn" style="background-color: #eeeded; color: #686d76;"><i class="ml-1"></i>✏️ Edit</button></td>
                            </tr>
                            <?php 
                                }
                            ?>
                            </tr>
                        </tbody>
                    </table>

                    <hr>

                    <center> <h3> Penilaian </h3> </center>
                    <table id="main-table" class="table" style="background-color: #FFFFFF;">
                        <thead>
                            <tr>
                            <th scope="col" style="width: 0%" hidden>ID Product</th>
                            <th scope="col" style="width: 0%">Merk</th>
                            <th scope="col" style="width: 0%">Harga</th>
                            <th scope="col" style="width: 0%">Mechanical</th>
                            <th scope="col" style="width: 0%">Cable</th>
                            <th scope="col" style="width: 0%">RGB</th>
                            <th scope="col" style="width: 0%">Weight</th>
                            <th scope="col" style="width: 0%">Connectivity</th>
                            <th scope="col" style="width: 0%">Keycaps</th>
                            <th scope="col" style="width: 0%">Build Quality</th>
                            <th scope="col" style="width: 0%">Warranty</th>
                            <th scope="col" style="width: 0%">Popularity</th>
                            <th scope="col" style="width: 0%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $query = mysqli_query($conn, "SELECT * FROM dataStorage");
                                while ($row = mysqli_fetch_assoc($query)) 
                                {
                            ?>

                            <tr>
                                <td hidden><?php echo $row['id_product']?></td>
                                <td><?php echo $row['Merk']?></td>
                                <td><?php echo $row['Harga']?></td>
                                <td><?php echo $row['Mechanical']?></td>
                                <td><?php echo $row['Cable']?></td>
                                <td><?php echo $row['Lighting']?></td>
                                <td><?php echo $row['Weight']?></td>
                                <td><?php echo $row['Connectivity']?></td>
                                <td><?php echo $row['Keycaps']?></td>
                                <td><?php echo $row['BuildQuality']?></td>
                                <td><?php echo $row['Warranty']?></td>
                                <td><?php echo $row['Popularity']?></td>
                                <td><button type="button" id="button_update" class="btn" style="background-color: #eeeded; color: #686d76;"><i class="ml-1"></i>✏️ Edit</button></td>
                            </tr>
                            <?php 
                                }
                            ?>
                            </tr>
                        </tbody>
                    </table>
                    <p> Smallest Value : <?php echo $min ?> </p>
                    <p> Biggest Value : <?php echo $max ?> </p>
                    <hr>

                    <center> <h4>Table of Contents</h4> </center>
                    <table id="main-table" class="table" style="background-color: #FFFFFF;">
                        <thead>
                            <tr>
                            <th scope="col" style="width: 0%">Merk</th>
                            <th scope="col" style="width: 0%">Harga</th>
                            <th scope="col" style="width: 0%">Mechanical</th>
                            <th scope="col" style="width: 0%">Cable</th>
                            <th scope="col" style="width: 0%">RGB</th>
                            <th scope="col" style="width: 0%">Weight</th>
                            <th scope="col" style="width: 0%">Connectivity</th>
                            <th scope="col" style="width: 0%">Keycaps</th>
                            <th scope="col" style="width: 0%">Build Quality</th>
                            <th scope="col" style="width: 0%">Warranty</th>
                            <th scope="col" style="width: 0%">Popularity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = mysqli_query($conn, "SELECT * FROM dataStorage");
                                while ($row = mysqli_fetch_assoc($query)) 
                                {
                            ?>

                            <tr>
                                <td><?php echo $row['Merk']?></td>
                                <td><?php echo $row['Harga']?></td>
                                <td><?php echo $row['Mechanical']?></td>
                                <td><?php echo $row['Cable']?></td>
                                <td><?php echo $row['Lighting']?></td>
                                <td><?php echo $row['Weight']?></td>
                                <td><?php echo $row['Connectivity']?></td>
                                <td><?php echo $row['Keycaps']?></td>
                                <td><?php echo $row['BuildQuality']?></td>
                                <td><?php echo $row['Warranty']?></td>
                                <td><?php echo $row['Popularity']?></td>
                            </tr>
                            <tr>
                                <?php
                                    //Perhitungan U(Ai)
                                    $harga          = number_format(($normalized_harga        * ($max - $row['Harga'])          / ($max - $min)), 2, '.', '');
                                    $mechanical     = number_format(($normalized_mechanical   * ($max - $row['Mechanical'])     / ($max - $min)), 2, '.', '');
                                    $cable          = number_format(($normalized_cable        * ($max - $row['Cable'])          / ($max - $min)), 2, '.', '');
                                    $lighting       = number_format(($normalized_lighting     * ($max - $row['Lighting'])       / ($max - $min)), 2, '.', '');
                                    $weight         = number_format(($normalized_weight       * ($max - $row['Weight'])         / ($max - $min)), 2, '.', '');
                                    $connectivity   = number_format(($normalized_connectivity * ($max - $row['Connectivity'])   / ($max - $min)), 2, '.', '');
                                    $keycaps        = number_format(($normalized_keycaps      * ($max - $row['Keycaps'])        / ($max - $min)), 2, '.', '');
                                    $buildquality   = number_format(($normalized_buildquality * ($max - $row['BuildQuality'])   / ($max - $min)), 2, '.', '');
                                    $warranty       = number_format(($normalized_warranty     * ($max - $row['Warranty'])       / ($max - $min)), 2, '.', '');
                                    $popularity     = number_format(($normalized_popularity   * ($max - $row['Popularity'])     / ($max - $min)), 2, '.', '');
                                ?>
                                <td>Ui(Ai)</td>
                                <td>
                                    <?php
                                        echo number_format((($max - $row['Harga']) / ($max - $min)), 2, '.', '');  // Outputs -> 00.xx
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo number_format((($max - $row['Mechanical']) / ($max - $min)), 2, '.', '');  // Outputs -> 00.xx
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        echo number_format((($max - $row['Cable']) / ($max - $min)), 2, '.', '');  // Outputs -> 00.xx
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo number_format((($max - $row['Lighting']) / ($max - $min)), 2, '.', '');  // Outputs -> 00.xx
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo number_format((($max - $row['Weight']) / ($max - $min)), 2, '.', '');  // Outputs -> 00.xx
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo number_format((($max - $row['Connectivity']) / ($max - $min)), 2, '.', '');  // Outputs -> 00.xx
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo number_format((($max - $row['Keycaps']) / ($max - $min)), 2, '.', '');  // Outputs -> 00.xx
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo number_format((($max - $row['BuildQuality']) / ($max - $min)), 2, '.', '');  // Outputs -> 00.xx
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo number_format((($max - $row['Warranty']) / ($max - $min)), 2, '.', '');  // Outputs -> 00.xx
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo number_format((($max - $row['Popularity']) / ($max - $min)), 2, '.', '');  // Outputs -> 00.xx
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>U(Ai)</td>
                                <td>
                                    <?php
                                        echo ($harga);  // Outputs -> 00.xx
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo ($mechanical);  // Outputs -> 00.xx
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        echo ($cable);  // Outputs -> 00.xx
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo ($lighting);  // Outputs -> 00.xx
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo ($weight);  // Outputs -> 00.xx
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo ($connectivity);  // Outputs -> 00.xx
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo ($keycaps);  // Outputs -> 00.xx
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo ($buildquality);  // Outputs -> 00.xx
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo ($warranty);  // Outputs -> 00.xx
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo ($popularity);  // Outputs -> 00.xx
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Total Nilai Keseluruhan Utility</td>
                                <td>
                                    <h3>
                                    <?php 
                                        echo ($harga + $mechanical + $cable + $lighting + $weight + $connectivity + $keycaps + $buildquality + $warranty + $popularity);  // Outputs -> 00.xx
                                    ?>
                                    </h3>
                                </td>
                            </tr>
                                <tr>
                                    <td>
                                    <br>
                                    </td>
                                </tr>
                            <?php 
                                }
                            ?>
                        </tbody>
                    </table>

                    <hr>

                    <h4>Product Ranking</h4>
                    <table id="main-table" class="table" style="background-color: #FFFFFF;">
                        <thead>
                            <tr>
                            <th scope="col" style="width: 0%">Ranking</th>
                            <th scope="col" style="width: 0%">Merk</th>
                            <th scope="col" style="width: 0%">Nilai U(ai)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                // $normalized_harga      = 0.5;
                                // $normalized_mechanical = 0.2;
                                // $normalized_cable      = 0.1;
                                // $normalized_lighting   = 0.1;
                                // $normalized_weight     = 0.1;
                                $ranking = 1;
                                $query = mysqli_query($conn, "SELECT Merk, 
                                -- Perhitungan Ui(Ai)
                                ($normalized_harga          * ($max - Harga)        / ($max - $min)) as Harga, 
                                ($normalized_mechanical     * ($max - Mechanical)   / ($max - $min)) as Mechanical, 
                                ($normalized_cable          * ($max - Cable)        / ($max - $min)) as Cable, 
                                ($normalized_lighting       * ($max - Lighting)     / ($max - $min)) as Lighting, 
                                ($normalized_weight         * ($max - Weight)       / ($max - $min)) as Weight, 
                                ($normalized_connectivity   * ($max - Connectivity) / ($max - $min)) as Connectivity, 
                                ($normalized_keycaps        * ($max - Keycaps)      / ($max - $min)) as Keycaps, 
                                ($normalized_buildquality   * ($max - BuildQuality) / ($max - $min)) as BuildQuality, 
                                ($normalized_warranty       * ($max - Warranty)     / ($max - $min)) as Warranty, 
                                ($normalized_popularity     * ($max - Popularity)   / ($max - $min)) as Popularity, 
                                -- Perhitungan U(ai)
                                ($normalized_harga          * ($max - Harga)        / ($max - $min)) +
                                ($normalized_mechanical     * ($max - Mechanical)   / ($max - $min)) +
                                ($normalized_cable          * ($max - Cable)        / ($max - $min)) +
                                ($normalized_lighting       * ($max - Lighting)     / ($max - $min)) +
                                ($normalized_weight         * ($max - Weight)       / ($max - $min)) +
                                ($normalized_connectivity   * ($max - Connectivity) / ($max - $min)) +
                                ($normalized_keycaps        * ($max - Keycaps)      / ($max - $min)) +
                                ($normalized_buildquality   * ($max - BuildQuality) / ($max - $min)) +
                                ($normalized_warranty       * ($max - Warranty)     / ($max - $min)) +
                                ($normalized_popularity     * ($max - Popularity)   / ($max - $min))
                                as countUAI 
                                FROM dataStorage ORDER by countUAI asc
                                -- Mengambil Seluruh Kriteria yang sudah dikali dengan Normalisasi Bobot, dan diambil sebagai CountUAI sebagai Alias SQL.
                                ");
                                while ($row = mysqli_fetch_assoc($query)) 
                                {
                            ?>
                            <tr>
                                <?php
                                    $harga        = number_format($row['Harga'], 2, '.', '');
                                    $mechanical   = number_format($row['Mechanical'], 2, '.', '');
                                    $cable        = number_format($row['Cable'], 2, '.', '');
                                    $lighting     = number_format($row['Lighting'], 2, '.', '');
                                    $weight       = number_format($row['Weight'], 2, '.', '');
                                    $connectivity = number_format($row['Connectivity'], 2, '.', '');
                                    $keycaps      = number_format($row['Keycaps'], 2, '.', '');
                                    $buildquality = number_format($row['BuildQuality'], 2, '.', '');
                                    $warranty     = number_format($row['Warranty'], 2, '.', '');
                                    $popularity   = number_format($row['Popularity'], 2, '.', '');
                                ?>
                            </tr>
                            <tr>
                                <td>
                                    <?php 
                                        echo $ranking++;  // Outputs -> 00.xx
                                    ?>
                                </td>
                                <td><?php echo $row['Merk']?></td>
                                
                                <td>
                                    <?php //echo number_format($row['countUAI'], 2, '.', '') ?>
                                    <?php echo ($harga + $mechanical + $cable + $lighting + $weight + $connectivity + $keycaps + $buildquality + $warranty + $popularity);  // Outputs -> 00.xx ?>
                                </td>
                            </tr>
                            <?php 
                                }
                            ?>
                        </tbody>
                    </table>
	    			    <hr>
                    </div>

	    		</div>
	    	</div>
	    </div>

        <br>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="add_customer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
			<br>
			<br>
            <form action="customerHandler.php?act=tambah" class="form" method="post">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="customerUsername" class="form-label">Customer Username</label>
                    <input type="text" class="form-control" id="customerUsername" name="customerUsername" required placeholder="Example: 19410$max001">
                </div> 
                <div class="mb-3">
                    <label for="customerName" class="form-label">Customer Password</label>
                    <input type="text" class="form-control" id="customerName" name="customerName" required placeholder="Example: Andi">
                </div>  
				<div class="mb-3">
                    <label for="customerName" class="form-label">Customer Email</label>
                    <input type="text" class="form-control" id="customerName" name="customerName" required placeholder="Example: Andi">
                </div>  
                <div class="mb-3">
                    <label for="customerBirthdate" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="customerBirthdate" name="customerBirthdate" required>
                </div>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="color: white;">Batal</button>
                <button type="submit" class="btn btn-success" style="color: white;">Simpan</button>
            </div>
            </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="update_alternatif" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
			<br>
			<br>
                <form action="addTable.php?selection=table_update_kriteria" class="form" method="POST">
                    <center> <label for="update_idcrit" class="form-label">ID Kriteria</label> </center>
                    <input type="number" id="update_idcrit" name="update_idcrit" class="form-control input-sm" placeholder="ID Product" required style="text-align:center" readonly>
                    <span class="input-group-btn" style="width:10px;"></span>
	    			<br>                    
                    
	    		    <div class="row">
                        <div class="input-group" id="inputField">
	    			        <hr>
	    			        <!--<label for="criteriaHarga" class="form-label">Harga</label>-->
	    			        <input type="number" class="form-control input-sm" placeholder="Criteria 1" required style="text-align:center" readonly>
                            <span class="input-group-btn" style="width:10px;"></span>
	    			        <br>

	    			        <!--<label for="criteriaMechanical" class="form-label">Mechanical</label>-->
	    			        <input type="number" class="form-control input-sm" placeholder="Criteria 2" required style="text-align:center" readonly>
                            <span class="input-group-btn" style="width:10px;"></span>
	    			        <br>

	    			        <!--<label for="criteriaCable" class="form-label">Cable</label>-->
	    			        <input type="number" class="form-control input-sm" placeholder="Criteria 3" required style="text-align:center" readonly>
                            <span class="input-group-btn" style="width:10px;"></span>
                            <br>

	    			        <!--<label for="criteriaLighting" class="form-label">RGB Lighting</label>-->
	    			        <input type="number" class="form-control input-sm" placeholder="Criteria 4" required style="text-align:center" readonly>
                            <span class="input-group-btn" style="width:10px;"></span>
	    			        <br>

                            <!--<label for="criteriaWeight" class="form-label">Weight</label>-->
                            <input type="number"class="form-control input-sm" placeholder="Criteria 5" required style="text-align:center" readonly>
                            <span class="input-group-btn" style="width:10px;"></span>
                            <br>

                            <!--<label for="criteriaConnectivity" class="form-label">Connectivity</label>-->
                            <input type="number" class="form-control input-sm" placeholder="Criteria 6" required style="text-align:center" readonly>
                            <span class="input-group-btn" style="width:10px;"></span>
                            <br>

                            <!--<label for="criteriaKeycaps" class="form-label">Keycaps</label>-->
                            <input type="number"class="form-control input-sm" placeholder="Criteria 7" required style="text-align:center" readonly>
                            <span class="input-group-btn" style="width:10px;"></span>
                            <br>

                            <!--<label for="criteriaBuildQuality" class="form-label">BuildQuality</label>-->
                            <input type="number" class="form-control input-sm" placeholder="Criteria 8" required style="text-align:center" readonly>
                            <span class="input-group-btn" style="width:10px;"></span>
                            <br>

                            <!--<label for="criteriaWarranty" class="form-label">Warranty</label>-->
                            <input type="number" class="form-control input-sm" placeholder="Criteria 9" required style="text-align:center" readonly>
                            <span class="input-group-btn" style="width:10px;"></span>
                            <br>

                            <!--<label for="criteriaPopularity" class="form-label">Popularity</label>-->
                            <input type="number" class="form-control input-sm" placeholder="Criteria 10" required style="text-align:center" readonly>
                            <span class="input-group-btn" style="width:10px;"></span>
                            <br>

	    			        <hr>
                        </div>
                        <div class="input-group" id="inputField">
	    			        <hr>
	    			        <!--<label for="criteriaHarga" class="form-label">Harga</label>-->
	    			        <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="update_c1" name="update_c1" class="form-control input-sm" placeholder="Harga" required style="text-align:center">
                            <span class="input-group-btn" style="width:10px;"></span>
	    			        <br>

	    			        <!--<label for="criteriaMechanical" class="form-label">Mechanical</label>-->
	    			        <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="update_c2" name="update_c2" class="form-control input-sm" placeholder="Mechanical" required style="text-align:center">
                            <span class="input-group-btn" style="width:10px;"></span>
	    			        <br>

	    			        <!--<label for="criteriaCable" class="form-label">Cable</label>-->
	    			        <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="update_c3" name="update_c3" class="form-control input-sm" placeholder="Cable" required style="text-align:center">
                            <span class="input-group-btn" style="width:10px;"></span>
                            <br>

	    			        <!--<label for="criteriaLighting" class="form-label">RGB Lighting</label>-->
	    			        <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="update_c4" name="update_c4" class="form-control input-sm" placeholder="RGB Lighting" required style="text-align:center">
                            <span class="input-group-btn" style="width:10px;"></span>
	    			        <br>

                            <!--<label for="criteriaWeight" class="form-label">Weight</label>-->
                            <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="update_c5" name="update_c5" class="form-control input-sm" placeholder="Weight" required style="text-align:center">
                            <span class="input-group-btn" style="width:10px;"></span>
                            <br>

                            <!--<label for="criteriaConnectivity" class="form-label">Connectivity</label>-->
                            <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="update_c6" name="update_c6" class="form-control input-sm" placeholder="Connectivity" required style="text-align:center">
                            <span class="input-group-btn" style="width:10px;"></span>
                            <br>

                            <!--<label for="criteriaKeycaps" class="form-label">Keycaps</label>-->
                            <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="update_c7" name="update_c7" class="form-control input-sm" placeholder="Keycaps" required style="text-align:center">
                            <span class="input-group-btn" style="width:10px;"></span>
                            <br>

                            <!--<label for="criteriaBuildQuality" class="form-label">BuildQuality</label>-->
                            <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="update_c8" name="update_c8" class="form-control input-sm" placeholder="BuildQuality" required style="text-align:center">
                            <span class="input-group-btn" style="width:10px;"></span>
                            <br>

                            <!--<label for="criteriaWarranty" class="form-label">Warranty</label>-->
                            <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="update_c9" name="update_c9" class="form-control input-sm" placeholder="Warranty" required style="text-align:center">
                            <span class="input-group-btn" style="width:10px;"></span>
                            <br>

                            <!--<label for="criteriaPopularity" class="form-label">Popularity</label>-->
                            <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="update_c10" name="update_c10" class="form-control input-sm" placeholder="Popularity" required style="text-align:center">
                            <span class="input-group-btn" style="width:10px;"></span>
                            <br>
                                
	    			        <input class="but btn btn-success" type="submit" name="submit" value="Update Data" style="color: green">
	    			        <hr>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

	<!-- Update Alternatif -->
	<div class="modal fade" id="update_alternatif" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
			<br>
			<br>
                <form action="addTable.php?selection=table_update_kriteria" class="form" method="POST">
                    <center> <label for="update_idproduct" class="form-label">ID Produk</label> </center>
                    <input type="number" id="update_idproduct" name="update_idproduct" class="form-control input-sm" placeholder="ID Product" required style="text-align:center" readonly>
                    <span class="input-group-btn" style="width:10px;"></span>
	    			<br>                    
                    <input type="text" id="update_criteriaMerk" name="update_criteriaMerk" class="form-control" placeholder="Merk (Steel Series)" required style="text-align:center">
	    		    <div class="row">
                        <div class="input-group" id="inputField">
	    			        <hr>
	    			        <!--<label for="criteriaHarga" class="form-label">Harga</label>-->
	    			        <input type="number" class="form-control input-sm" placeholder="Harga" required style="text-align:center" readonly>
                            <span class="input-group-btn" style="width:10px;"></span>
	    			        <br>

	    			        <!--<label for="criteriaMechanical" class="form-label">Mechanical</label>-->
	    			        <input type="number" class="form-control input-sm" placeholder="Mechanical" required style="text-align:center" readonly>
                            <span class="input-group-btn" style="width:10px;"></span>
	    			        <br>

	    			        <!--<label for="criteriaCable" class="form-label">Cable</label>-->
	    			        <input type="number" class="form-control input-sm" placeholder="Cable" required style="text-align:center" readonly>
                            <span class="input-group-btn" style="width:10px;"></span>
                            <br>

	    			        <!--<label for="criteriaLighting" class="form-label">RGB Lighting</label>-->
	    			        <input type="number" class="form-control input-sm" placeholder="RGB Lighting" required style="text-align:center" readonly>
                            <span class="input-group-btn" style="width:10px;"></span>
	    			        <br>

                            <!--<label for="criteriaWeight" class="form-label">Weight</label>-->
                            <input type="number"class="form-control input-sm" placeholder="Weight" required style="text-align:center" readonly>
                            <span class="input-group-btn" style="width:10px;"></span>
                            <br>

                            <!--<label for="criteriaConnectivity" class="form-label">Connectivity</label>-->
                            <input type="number" class="form-control input-sm" placeholder="Connectivity" required style="text-align:center" readonly>
                            <span class="input-group-btn" style="width:10px;"></span>
                            <br>

                            <!--<label for="criteriaKeycaps" class="form-label">Keycaps</label>-->
                            <input type="number"class="form-control input-sm" placeholder="Keycaps" required style="text-align:center" readonly>
                            <span class="input-group-btn" style="width:10px;"></span>
                            <br>

                            <!--<label for="criteriaBuildQuality" class="form-label">BuildQuality</label>-->
                            <input type="number" class="form-control input-sm" placeholder="BuildQuality" required style="text-align:center" readonly>
                            <span class="input-group-btn" style="width:10px;"></span>
                            <br>

                            <!--<label for="criteriaWarranty" class="form-label">Warranty</label>-->
                            <input type="number" class="form-control input-sm" placeholder="Warranty" required style="text-align:center" readonly>
                            <span class="input-group-btn" style="width:10px;"></span>
                            <br>

                            <!--<label for="criteriaPopularity" class="form-label">Popularity</label>-->
                            <input type="number" class="form-control input-sm" placeholder="Popularity" required style="text-align:center" readonly>
                            <span class="input-group-btn" style="width:10px;"></span>
                            <br>

	    			        <hr>
                        </div>
                        <div class="input-group" id="inputField">
	    			        <hr>
	    			        <!--<label for="criteriaHarga" class="form-label">Harga</label>-->
	    			        <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="update_criteriaHarga" name="update_criteriaHarga" class="form-control input-sm" placeholder="Harga" required style="text-align:center">
                            <span class="input-group-btn" style="width:10px;"></span>
	    			        <br>

	    			        <!--<label for="criteriaMechanical" class="form-label">Mechanical</label>-->
	    			        <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="update_criteriaMechanical" name="update_criteriaMechanical" class="form-control input-sm" placeholder="Mechanical" required style="text-align:center">
                            <span class="input-group-btn" style="width:10px;"></span>
	    			        <br>

	    			        <!--<label for="criteriaCable" class="form-label">Cable</label>-->
	    			        <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="update_criteriaCable" name="update_criteriaCable" class="form-control input-sm" placeholder="Cable" required style="text-align:center">
                            <span class="input-group-btn" style="width:10px;"></span>
                            <br>

	    			        <!--<label for="criteriaLighting" class="form-label">RGB Lighting</label>-->
	    			        <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="update_criteriaLighting" name="update_criteriaLighting" class="form-control input-sm" placeholder="RGB Lighting" required style="text-align:center">
                            <span class="input-group-btn" style="width:10px;"></span>
	    			        <br>

                            <!--<label for="criteriaWeight" class="form-label">Weight</label>-->
                            <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="update_criteriaWeight" name="update_criteriaWeight" class="form-control input-sm" placeholder="Weight" required style="text-align:center">
                            <span class="input-group-btn" style="width:10px;"></span>
                            <br>

                            <!--<label for="criteriaConnectivity" class="form-label">Connectivity</label>-->
                            <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="update_criteriaConnectivity" name="update_criteriaConnectivity" class="form-control input-sm" placeholder="Connectivity" required style="text-align:center">
                            <span class="input-group-btn" style="width:10px;"></span>
                            <br>

                            <!--<label for="criteriaKeycaps" class="form-label">Keycaps</label>-->
                            <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="update_criteriaKeycaps" name="update_criteriaKeycaps" class="form-control input-sm" placeholder="Keycaps" required style="text-align:center">
                            <span class="input-group-btn" style="width:10px;"></span>
                            <br>

                            <!--<label for="criteriaBuildQuality" class="form-label">BuildQuality</label>-->
                            <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="update_criteriaBuildQuality" name="update_criteriaBuildQuality" class="form-control input-sm" placeholder="BuildQuality" required style="text-align:center">
                            <span class="input-group-btn" style="width:10px;"></span>
                            <br>

                            <!--<label for="criteriaWarranty" class="form-label">Warranty</label>-->
                            <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="update_criteriaWarranty" name="update_criteriaWarranty" class="form-control input-sm" placeholder="Warranty" required style="text-align:center">
                            <span class="input-group-btn" style="width:10px;"></span>
                            <br>

                            <!--<label for="criteriaPopularity" class="form-label">Popularity</label>-->
                            <input type="number" onpaste="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" oninput="javascript: if (this.value.length >= this.maxLength) this.value = 100;" maxlength = "3" id="update_criteriaPopularity" name="update_criteriaPopularity" class="form-control input-sm" placeholder="Popularity" required style="text-align:center">
                            <span class="input-group-btn" style="width:10px;"></span>
                            <br>
                                
	    			        <input class="but btn btn-success" type="submit" name="submit" value="Update Data" style="color: green">
	    			        <hr>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete -->
	<div class="modal fade" id="delete_customer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Customer Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
			<br>
			<br>
            <form action="customerHandler.php?act=delete" class="form" method="post">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="delete_customerUsername" class="form-label">Customer Username</label>
                    <input type="text" class="form-control" id="delete_customerUsername" name="delete_customerUsername" required placeholder="Example: 1" readonly>
                    <br>
                    <input type="text" class="form-control" oninput="deleteConfirmation()" id="delete_konfirmasi" name="delete_konfirmasi" required placeholder="Ketik 'KONFIRMASI' untuk membuka Tombol Hapus">
                </div> 
                <div class="row">
                    <div class="modal-footer col-6">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="color: white;">Batal</button>
                    </div>
    				<br>

                    <div class="modal-footer col-6">
                        <button id="button_delete_confirm" type="submit" class="btn btn-success" style="color: white;" disabled>Delete & Save</button>
                    </div>
            </div>
            </form>
            </div>
        </div>
    </div>

    <script>
	$('document').onload(function()
	{
		var upgradeID = $('#upgradePackageID option:selected').val();
		$.get('getValues.php?selection=getMin' + upgradeID + '', function(data)
		{
			//'Rp. ' + 
			$('#criteriaMin').val(data);
		});

        $.get('getValues.php?selection=getMax' + upgradeID + '', function(data)
		{
			//'Rp. ' + 
			$('#criteriaMin').val(data);
		});
	});

    function deleteConfirmation()
    {
        let inputVal = document.getElementById("delete_konfirmasi").value;
        if (inputVal == "KONFIRMASI")
        {
            $('#button_delete_confirm').prop('disabled', false);
        }
        else 
            $('#button_delete_confirm').prop('disabled', true);
    }
    </script>

    <script>
    var i = $("#panel input"); 

    function checkNumber(evt) 
    {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) 
        {
            return false;
        }
        return true;
    }

    // $(i).on('input', function(){
    //     input.length > 3
    // });

    $(document).ready(function()
    {
        $('#main-table-kriteria tr #button_update_kriteria').on('click', function()
        {
            var currentRow = $(this).closest("tr");
            var column0 = currentRow.find("td:eq(0)").text();
            var column1 = currentRow.find("td:eq(1)").text();
            var column2 = currentRow.find("td:eq(2)").text();
            var column3 = currentRow.find("td:eq(3)").text();
            var column4 = currentRow.find("td:eq(4)").text();
            var column5 = currentRow.find("td:eq(5)").text();
            var column6 = currentRow.find("td:eq(6)").text();
            var column7 = currentRow.find("td:eq(7)").text();
            var column8 = currentRow.find("td:eq(8)").text();
            var column9 = currentRow.find("td:eq(9)").text();
            var column10 = currentRow.find("td:eq(10)").text();
            var column11 = currentRow.find("td:eq(11)").text();
            $('#update_idcrit').val(column0);
            $('#update_c1').val(column1);
            $('#update_c2').val(column2);
            $('#update_c3').val(column3);
            $('#update_c4').val(column4);
            $('#update_c5').val(column5);
            $('#update_c6').val(column6);
            $('#update_c7').val(column7);
            $('#update_c8').val(column8);
            $('#update_c9').val(column9);
            $('#update_c10').val(column10);

            $('#update_alternatif').modal('show');
        });

        $('#main-table tr #button_update').on('click', function()
        {
            var currentRow = $(this).closest("tr");
            var column0 = currentRow.find("td:eq(0)").text();
            var column1 = currentRow.find("td:eq(1)").text();
            var column2 = currentRow.find("td:eq(2)").text();
            var column3 = currentRow.find("td:eq(3)").text();
            var column4 = currentRow.find("td:eq(4)").text();
            var column5 = currentRow.find("td:eq(5)").text();
            var column6 = currentRow.find("td:eq(6)").text();
            var column7 = currentRow.find("td:eq(7)").text();
            var column8 = currentRow.find("td:eq(8)").text();
            var column9 = currentRow.find("td:eq(9)").text();
            var column10 = currentRow.find("td:eq(10)").text();
            var column11 = currentRow.find("td:eq(11)").text();
            var columnv = "ID Produk : " + column0;
            $('#update_idproduct').val(column0);
            $('#update_criteriaMerk').val(column1);
            $('#update_criteriaHarga').val(column2);
            $('#update_criteriaMechanical').val(column3);
            $('#update_criteriaCable').val(column4);
            $('#update_criteriaLighting').val(column5);
            $('#update_criteriaWeight').val(column6);
            $('#update_criteriaConnectivity').val(column7);
            $('#update_criteriaKeycaps').val(column8);
            $('#update_criteriaBuildQuality').val(column9);
            $('#update_criteriaWarranty').val(column10);
            $('#update_criteriaPopularity').val(column11);
            $('#update_alternatif').modal('show');
        });
        
        $('#main-table tr #button_delete').on('click', function()
        {
            var currentRow = $(this).closest("tr");
            var column1 = currentRow.find("td:eq(1)").text();
            $('#delete_customerUsername').val(column1);
            $('#delete_customer').modal('show');
        });
    });
    </script>
</body>
</html>