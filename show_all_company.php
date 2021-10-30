<?php include 'includes/db.php' ?>
<?php include 'includes/header.php' ?>
<?php include 'includes/functions.php' ?>
<style>
    .section-bg{
        background-color: white;
    }
    .card-img-top {
        width: 100%;
        height: 25vh;
        object-fit: cover;
    }
</style>

<section id="companies" class="section-bg">
    <div class="container">
        <header class="section-header">
            <br>
            <h3>All Companies</h3>
        </header>
        <div class="row">
            <div class="span12">
                <div class="row">


                    <?php
                    $query = "SELECT * FROM company";
                    $select_all_company = mysqli_query($connection, $query);
                    confirmQuery($select_all_company);
                    while($row = mysqli_fetch_assoc($select_all_company)) {
                        $company_id = $row['company_id'];
                        $company_name = $row['company_name'];
                        $company_image = $row['company_image'];
                        ?>
                        <div class="column" style="width: 18rem;">
                            <!--   <div class="card" style="width: 18rem;">  -->
                            <div class="card" style="max-width: 250px;">
                                <a href="read_all.php?com=<?php echo $company_name; ?>"><img class="card-img-top embed-responsive" src="<?php echo $company_image; ?>" alt="Card image cap"></a>
                                <div class="card-body">
                                    <a href="#"><h4 class="text-success"><?php echo $company_name ;?></h4></a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>


    </div>
</section>

<br><br><br>

<?php include 'includes/footer.php' ?>
