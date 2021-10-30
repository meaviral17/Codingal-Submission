<?php include "includes/header.php"; ?>
<?php include 'includes/db.php';?>
<?php include 'includes/functions.php';?>

<?php
    if(isset($_GET['n_id'])){
        $news_id = $_GET['n_id'];
    }

?>
<div class="align-items-center">
    <br><br><br><br>
</div>


<?php

    $query = "SELECT * FROM trendingnews WHERE id = $news_id";
    $select_news = mysqli_query($connection, $query);
    confirmQuery($select_news);
    while($row = mysqli_fetch_assoc($select_news)) {
        $headline = $row['news_heading'];
        $news = $row['news'];
        $date = $row['date'];
    }

?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2 class="page-header text-primary">
                <?php echo $headline; ?>
            </h2>

            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $date; ?></p>
            <hr>
            <!--<img class="img-responsive" src="http://placehold.it/900x300" alt="">-->
         <!--   <hr>  -->
            <p><?php echo $news; ?></p>
            <hr>
            <!-- pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="news.php?n_id=<?php echo $news_id-1 ?>">&larr; Previous</a>
                </li>
                <li class="next">
                    <a href="news.php?n_id=<?php echo $news_id+1 ?>">Next &rarr;</a>
                </li>
            </ul>
        </div>
        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Blog Categories Well -->
            <div class="well">
                <h4>News Categories</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <?php
                                $query = "SELECT * FROM category";
                                $select_all_category = mysqli_query($connection, $query);
                                confirmQuery($select_all_category);
                                $category_count = 1;
                                while($category_count <=4) {
                                    $row = mysqli_fetch_assoc($select_all_category);
                                    $category_id = $row['category_id'];
                                    $category_name = $row['category_name'];
                                    echo "<li><a href='#'>$category_name</a></li>";
                                    $category_count += 1;
                                    }
                            ?>
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <?php
                            while($category_count <=8) {
                                $row = mysqli_fetch_assoc($select_all_category);
                                $category_id = $row['category_id'];
                                $category_name = $row['category_name'];
                                echo "<li><a href='#'>$category_name</a></li>";
                                $category_count += 1;
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>

            <!-- Side Widget Well 
            <div class="well">
                <h4>Side Widget Well</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div>
-->
        </div>
        </div>
</div>




<?php include "includes/footer.php";?>