<!--==========================
     Trending Section
   ============================-->
<?php include 'includes/db.php';?>
<?php include 'includes/functions.php';?>


<section id="services" class="section-bg">
    <div class="container">

        <header class="section-header">
            <h3>Trending News</h3>
        </header>

        <div class="row">

            <?php
            $query = "SELECT * FROM trendingnews ";
            $select_all = mysqli_query($connection, $query);
            confirmQuery($select_all);
            $trending_number = 1;
            while($trending_number <=6 ) {
                $row = mysqli_fetch_assoc($select_all);
                $trending_news_id = $row['id'];
                $trending_news_headline = $row['news_heading'];
                $trending_news_content = $row['news'];
                $trending_news_date = $row['date'];
            ?>

            <div class="col-md-4 col-lg-6 offset-lg-0 wow bounceInUp" data-wow-duration="1.4s">
                <div class="box">
                    <h5 class="text-primary"><a href="news.php?n_id=<?php echo $trending_news_id ?>"><?php echo $trending_news_headline; ?></a></h5>
                    <p class="description"><?php echo substr($trending_news_content,0,90) ?></p><br>
                    <p class="description"><?php echo $trending_news_date; ?></p>
                </div>
            </div>

            <?php
                $trending_number += 1;
                }
            ?>
            
            <button class="btn btn-primary" value="Read More">Read More</button>


        </div>

    </div>
</section><!-- #Trending -->