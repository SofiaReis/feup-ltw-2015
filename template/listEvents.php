<script src="upload.js"></script>

<section class="" >
  <div>
    <h2> Ver eventos! </h2>
    <?php
    $events = getAllEvents();
    for($i = 0; i < sizeof($events); $i++) {
      ?>
      <h3><?php echo getCreator($events[$i]['idUser']); ?></h3>
    }

    

  </div>
</section><!-- services End -->
