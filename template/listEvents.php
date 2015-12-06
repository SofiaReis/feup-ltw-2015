	<?php include_once 'php/fetchEvents.php'; ?>
	<?php include_once 'php/loadEvent.php'; ?>

	<section class="wrapper">
		<div >
			<ul class="photo-grid">
				<?php for($i=0; $i < count($events); ++$i) {?>

				<li>
					<a href='<? echo "./?pagina=showEvent&id=".$events[$i]['idEvent']; ?>'>

						<figure>
							<?
							$idI = $events[$i]['idImage'];
							$image=getImg($idI);
							$str = $image['path'];
							$str2 = substr($str, 3);?>
							<div class="title">
								<div class="date">
									<h1>
										<? $date = $events[$i]['date'];
										list($y, $m, $d) = explode("-", $date);
										echo $d."/".$m?></h1>
									</div>
									<h1><? echo $events[$i]['name']; ?></h1>
									<p><span>created by </span><?
									$idU = $events[$i]['idUser'];
									$creator=getCreator($idU);
									echo $creator['username'];?></p>
								</div>
								<div class="info">
									<? echo $events[$i]['description']; ?><br><? echo $events[$i]['local']; ?><br><?
									$idT = $events[$i]['idType'];
									$type=getEventType($idT);
									echo $type['name'];
									?></div>
									<img src=' <? echo $str2 ?>' height="180" width="320">
									<figcaption><p>+</p></figcaption>
								</figure>
							</a>
						</li>
						<? } ?>

					</ul>


				</div>
			</section>


