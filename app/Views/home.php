	<div class="content">
		<div class="container">
			<div class="content-grids">
				<div class="col-md-8 content-main">
					<div class="content-grid">
						<?php foreach($uploads as $upload): ?>
							<div class="content-grid-info">
								<img src="images/<?= mt_rand(1,4) ?>.jpeg" alt="" />
								<div class="post-info">
									<?php
										$time = $Time::parse($upload->added_on, 'Africa/Lagos');

									?>
									<h4><a href="#"><?= $upload->category ?></a> <?= $time->humanize() ?></h4>
									<p><?= nl2br($upload->description) ?></p>
									<p>
									<audio controls>
									<source src="<?= base_url('uploads/audio/upload_'.$upload->id.'_.mp3') ?>" type="audio/mpeg">
									Your browser does not support the audio element.
									</audio>
									</p>
									<!-- <a href="single.html"><span></span>READ MORE</a> -->
								</div>
							</div>
						<?php endforeach; ?>
						

					</div>
				</div>
				<div class="col-md-4 content-right">
					<div class="recent">
						<h3>POPULAR POSTS</h3>
						<ul>
							<li><a href="#">Aliquam tincidunt mauris</a></li>
							<li><a href="#">Vestibulum auctor dapibus lipsum</a></li>
							<li><a href="#">Nunc dignissim risus consecu</a></li>
							<li><a href="#">Cras ornare tristiqu</a></li>
						</ul>
					</div>
					<div class="comments">
						<h3>CAREGROIES</h3>
						<ul>
							<li><a href="#">Farin Jakada </a></li>
							<li><a href="#">Riyadus Salihin </a></li>
						</ul>
					</div>
					<div class="clearfix"></div>
					<div class="archives">
						<h3>POST BY VOLUME</h3>
						<ul>
							<li><a href="#">Volume 1</a></li>
							<li><a href="#">Volume 2</a></li>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>