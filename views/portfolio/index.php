<!-- Header -->

<?php view('partials/header.php'); ?>

<h2>Portfolios - <?php echo env('APP_NAME') ?></h2>


<?php foreach ($portfolios as $portfolio) : ?>
   <li><?php echo $portfolio['title']; ?></li>
<?php endforeach; ?>

<?php view('partials/footer.php'); ?>
<!-- Footer -->