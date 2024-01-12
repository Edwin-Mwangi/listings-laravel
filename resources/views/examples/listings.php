<!-- assume in web.php a route sends $listings data to this view -->
<!-- blade cleaner coz of {{}}  -->
<h1><?php echo $listings ?></h1>

<?php foreach ($listings as $listing): ?>
    <h2><?php echo $listing['title'] ?></h2>
    <p><?php echo $listing['description'] ?></p>
<?php endforeach ?>
