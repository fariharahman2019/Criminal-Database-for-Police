<?php
    include 'header.php';
?>
<form action="search.php" method="POST">
    <input type="text" name="search" placeholder="Search">
    <button type="submit" name="submit-search">Search</button>
</form>

<h1>Crime search</h1>
<h2>Yesterday's Crime:</h2>

<div class="article-container">
    <?php
            $yesterday_date = date("Y-m-d",strtotime("yesterday"));
            $sql="SELECT * FROM crime WHERE crime_datetime LIKE '%$yesterday_date%' ";
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

    ?>
</div>