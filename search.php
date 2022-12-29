<?php
    include 'header.php';
?>
<form action="search.php" method="POST">
    <input type="text" name="search" placeholder="Search for Crimes">
    <button type="submit" name="submit-search">Search</button>
</form>

<h1>Crime search</h1>
<h2>The results of your search:</h2>

<div class="article-container">
    <?php
        if (isset($_POST['submit-search'])){
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            $sql="SELECT * FROM crime WHERE crime_title LIKE '%$search%' OR crime_report LIKE '%$search%' OR crime_spot LIKE '%$search%' OR crime_type LIKE '%$search%' OR crime_datetime LIKE '%$search%' ";
            $result = mysqli_query($conn, $sql);
            $queryResults = mysqli_num_rows($result);


            if($queryResults > 0){
                echo "There are ".$queryResults." results matching your search";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='article-box'>
                        <h3>".$row['crime_title']."</h3>
                        <p>".$row['crime_type']."</p>
                        <p>".$row['crime_spot']."</p>
                        <p>".$row['crime_datetime']."</p>
                        <p>".$row['crime_report']."</p>
                        <br>
                    </div>";
                }
            }else{
                echo "There is no crime matching your search!";
            }
        }
    ?>
</div>