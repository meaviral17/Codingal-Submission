<?php include "includes/header.php"; ?>
<?php include 'includes/db.php';?>
<?php include 'includes/functions.php';?>

<?php
    if (isset($_GET['com'])){
        $company_name = $_GET['com'];
        $company_name = strtolower($company_name);
    }
?>

<section id="services" class="section-bg">
    <div class="container">
<!--
        <header class="section-header">
            <h1>Infosys</h1>
        </header>

        <div class="align-items-center">
            <h1 class="rounded-circle"><?php echo $company_name ?></h1>
        </div>-->
        <div class="row">

            <?php
            $query = "SELECT * FROM $company_name ";
            $select_all = mysqli_query($connection, $query);
            confirmQuery($select_all);
            while($row = mysqli_fetch_assoc($select_all)) {
                $news_id = $row['id'];
                $news_headline = $row['news_heading'];
                $news_content = $row['news'];
                $news_date = $row['date'];
                ?>

                <div class="col-md-4 col-lg-6 offset-lg-0 wow bounceInUp" data-wow-duration="1.4s">
                    <div class="box">
                        <h5 class="text-primary"><a href="news.php?n_id=<?php echo $news_id ?>"><?php echo $news_headline; ?></a></h5>
                        <p class="description"><?php echo substr($news_content,0,90) ?></p><br>
                        <p class="description"><?php echo $news_date; ?></p>
                    </div>
                </div>

                <?php } ?>




        </div>

    </div>
</section>

<?php include "includes/footer.php"; ?>