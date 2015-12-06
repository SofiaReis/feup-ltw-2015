	<?php include_once 'php/fetchEvents.php'; ?>
	<?php include_once 'php/loadEvent.php'; ?>

	<section class="wrapper">
		<div >
			<ul class="photo-grid">
				<?php for($i=0; $i < count($events); ++$i) {?>

				<li>
					<?php echo $image['path'];?>
					<a href='<? echo "./?pagina=showEvent&id=".$events[$i]['idEvent']; ?>'>

						<figure>
							<?
							$idI = $events[$i]['idImage'];
							$image=getImage($events[$i]['idEvent']);
							$str = $image['path'];
							$str2 = substr($str, 3);?>
							<div class="title">
								<div class="date">
									<h1>
										<? $date = $events[$i]['date'];
										list($y, $m, $d) = explode("-", $date);
										?>
										<div id="day"><? echo $d; ?></div>
										<div id="month"><? echo date('M', strtotime($date)); ?></div></h1>
									</div>
									<div id="t">
									<h1><? echo $events[$i]['name']; ?></h1>
									<p><span>created by </span><?
									$idU = $events[$i]['idUser'];
									$creator=getCreator($idU);
									echo $creator['username'];?></p>
									</div>
								</div>
								<div class="info">
									<? echo $events[$i]['description']; ?><hr><? echo $events[$i]['local']; ?><br><?
									$idT = $events[$i]['idType'];
									$type=getEventType($idT);
									echo $type['name'];
									?></div>
									<img src='<?php echo $image['path'];?>' height="180" width="320">
									<figcaption><p>+</p></figcaption>
								</figure>
							</a>
						</li>
						<? } ?>

					</ul>


				</div>
			</section>