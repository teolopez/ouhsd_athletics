<?php
/**
 * The sections page template file
 *
 * @package ouhsd
 * @since 0.1.0
 */

/*
 * Template Name: Teams
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div id="main" class="wrapper has-sidebar">

			<?php get_template_part( 'template-parts/content', 'section_head' ); ?>
			<div class="margin-filler">
				<div class="content-bg"></div>
				<div class="sidebar-bg primary-bg"></div>
			</div>
			<div class="wrap">
				<div class="page-filler">
					<div class="content-bg ninecol first"></div>
					<div class="sidebar-bg primary-bg threecol last"></div>
				</div>

				<div id="primary" class="site-content ninecol first">
					<div id="content" role="main">

<?php
					/*================================
					=            Nav tabs            =
					================================*/
?>
					<!-- Nav tabs -->
					<ul class="nav nav-tabs">
					  <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
					  <li><a href="#tab-02" data-toggle="tab">Rosters</a></li>
					  <li><a href="#tab-03" data-toggle="tab">Schedules &amp; Results</a></li>
					</ul>

<?php					/*==========  Tab panes  ==========*/	?>
						<div class="tab-content">

<?php						/*=============================================
							=            Home Section Tabs            =
							=============================================*/ ?>

							<div class="tab-pane fade in active" id="home">
										<br>
										<?php

										get_template_part( 'template-parts/content', 'section_body' );

										/*===================================================================
										=            Repeater Field for Team Coaches and Players            =
										===================================================================*/

										// check if the repeater field has rows of data
										if( have_rows('coach_rosters') ):

										 	// loop through the rows of data
										    while ( have_rows('coach_rosters') ) : the_row();

										        // display a sub field value

														/*========================================
														=            Coaches Repeater            =
														========================================*/

														echo "<div class=\"row\"><div class=\"col-md-12\"><h2>Our Coaching Staff</h2><hr></div></div>";
														// check if the repeater field has rows of data
														if( have_rows('coaches') ):

														 	// loop through the rows of data
														 	?>

														 		<div class="row">

														 	<?php
														    while ( have_rows('coaches') ) : the_row();
																/* Variables */
														        $image = get_sub_field('player_photo');
														        $coach_name = get_sub_field('player_name');
														        $coach_bio = get_sub_field('coach_bio');

																?>
																	<div class="col-md-3 col-xs-12">
																		<div class="small-4 columns" style="position:relative; float:left; margin: 0px 15px 15px 0px; background: url(<?php echo "{$image['url']}"; ?>) no-repeat center center; background-size: cover; width:100%; height:100px;min-height:180px;">
																			<?php // echo "<img src=\"{$image['url']}\" alt=\"{$image['alt']}\" />"; ?>
																		</div>
																		<div class="small-8 columns">
																			<?php echo "<h3> $coach_name </h3>"; ?>
																			<?php echo "<p> $coach_bio </p>"; ?>
																		</div>
																	</div>

																<?php
														    endwhile;

														    ?>

														    	</div>

														    <?php

														else :

														    // no rows found

														endif;

										    endwhile;

										else :

										    // no rows found

										endif;

										?>
							</div>

<?php 						/*=============================================
							=            Roster Sections Tabs            =
							=============================================*/ ?>
							<div class="tab-pane fade" id="tab-02">
								<h2>Rosters</h2>

										<?php/*==========  Roster Nav Tabs based on Level  ==========*/?>
										<ul class="nav nav-pills">
											<?php

											/*==========  Players Repeater  ==========*/
											// check if the repeater field has rows of data
											if( have_rows('team_rosters') ):

											 	// loop through the rows of data
											    while ( have_rows('team_rosters') ) : the_row();

													$team_level = get_sub_field('team_level');
													// print_r($image);

													if ($team_level == 'varsity') { ?>
															<li class="active"><a href="#varsity-tab-01" data-toggle="tab">Varsity</a></li>
													<?php } elseif ($team_level == 'jv') { ?>
															<li><a href="#jv-tab-02" data-toggle="tab">Junior Varsity</a></li>
													<?php } elseif ($team_level == 'frosh_soph') { ?>
															<li><a href="#f-tab-03" data-toggle="tab">Freshmen</a></li>
													<?php }
											    endwhile;
											else :
											    // no rows found
											endif;
											/*-----  End of Repeater Field for Team Coaches and Players  ------*/
											?>
										</ul>

<?php							/*==========  Tab panes  ==========*/	?>
								<div class="tab-content">
									<?php /*==========  Varsity Roster  ==========*/ ?>
									<div class="tab-pane fade in active" id="varsity-tab-01">

										<?php
										/*==========  Players Repeater  ==========*/
										// check if the repeater field has rows of data
										if( have_rows('team_rosters') ):

										 	// loop through the rows of data
										    while ( have_rows('team_rosters') ) : the_row();

												$team_level = get_sub_field('team_level');
												// print_r($image);
												if ($team_level == 'varsity') {
										        // display a sub field value

														?> 

														<div class="tab-pane fade in active" id="varsity-tab-01">
														<h3>Varsity</h3>
															<div class="row">

														<?php
														/*========================================
														=            Players Repeater            =
														========================================*/

														// check if the repeater field has rows of data
														if( have_rows('players') ):

														 	// loop through the rows of data
														    while ( have_rows('players') ) : the_row();
																/* Variables */
														        $image = get_sub_field('player_photo');
														        $coach_name = get_sub_field('player_name');
														        // $coach_bio = get_sub_field('coach_bio');

																?>
																	<div class="col-md-3 col-xs-6">
																		<div class="small-4 columns" style="position:relative; margin: 0px 15px 15px 0px; background: url(<?php echo "{$image['url']}"; ?>) no-repeat center center; background-size: cover; width:100%; height:215px;">
																			<?php // echo "<img src=\"{$image['url']}\" alt=\"{$image['alt']}\" />"; ?>
																		</div>
																		<div class="small-8 columns">
																			<?php echo "<h4> $coach_name </h4>"; ?>
																		</div>
																	</div>

																<?php
														    endwhile;
													    ?>

													    		</div>
													    	</div>

													    <?php													    

														else :

														    // no rows found

														endif;
												}

										    endwhile;

										else :

										    // no rows found

										endif;
										/*-----  End of Repeater Field for Team Coaches and Players  ------*/
										?>
									</div>
									<?php /*==========  JV Roster  ==========*/ ?>
									<div class="tab-pane fade" id="jv-tab-02">

											<?php
											/*==========  Players Repeater  ==========*/
											// check if the repeater field has rows of data
											if( have_rows('team_rosters') ):

											 	// loop through the rows of data
											    while ( have_rows('team_rosters') ) : the_row();

													$team_level = get_sub_field('team_level');
													// print_r($image);
													if ($team_level == 'jv') {
											        // display a sub field value

															?> 

															<div class="tab-pane fade in active" id="varsity-tab-01">
																<h3>Junior Varsity</h3>
																<div class="row">

															<?php
															/*========================================
															=            Players Repeater            =
															========================================*/

															// check if the repeater field has rows of data
															if( have_rows('players') ):

															 	// loop through the rows of data
															    while ( have_rows('players') ) : the_row();
																	/* Variables */
															        $image = get_sub_field('player_photo');
															        $coach_name = get_sub_field('player_name');
															        // $coach_bio = get_sub_field('coach_bio');

																	?>
																		<div class="col-md-3 col-xs-6">
																			<div class="small-4 columns" style="position:relative; margin: 0px 15px 15px 0px; background: url(<?php echo "{$image['url']}"; ?>) no-repeat center center; background-size: cover; width:100%; height:215px;">
																				<?php // echo "<img src=\"{$image['url']}\" alt=\"{$image['alt']}\" />"; ?>
																			</div>
																			<div class="small-8 columns">
																				<?php echo "<h4> $coach_name </h4>"; ?>
																			</div>
																		</div>

																	<?php
															    endwhile;
														    ?>

														    	</div>
														    </div>

														    <?php													    

															else :

															    // no rows found

															endif;
													}

											    endwhile;

											else :

											    // no rows found

											endif;

											/*-----  End of Repeater Field for Team Coaches and Players  ------*/

											?>										
									</div>
									<?php /*==========  Fresh Roster  ==========*/ ?>
									<div class="tab-pane fade" id="f-tab-03">

											<?php
											/*==========  Players Repeater  ==========*/
											// check if the repeater field has rows of data
											if( have_rows('team_rosters') ):

											 	// loop through the rows of data
											    while ( have_rows('team_rosters') ) : the_row();

													$team_level = get_sub_field('team_level');
													// print_r($image);
													if ($team_level == 'frosh_soph') {
											        // display a sub field value

															?> 

															<div class="tab-pane fade in active" id="varsity-tab-01">
															<h3>Freshmen</h3>
																<div class="row">

															<?php
															/*========================================
															=            Players Repeater            =
															========================================*/

															// check if the repeater field has rows of data
															if( have_rows('players') ):

															 	// loop through the rows of data
															    while ( have_rows('players') ) : the_row();
																	/* Variables */
															        $image = get_sub_field('player_photo');
															        $coach_name = get_sub_field('player_name');
															        // $coach_bio = get_sub_field('coach_bio');

																	?>
																		<div class="col-md-3 col-xs-6">
																			<div class="small-4 columns" style="position:relative; margin: 0px 15px 15px 0px; background: url(<?php echo "{$image['url']}"; ?>) no-repeat center center; background-size: cover; width:100%; height:215px;">
																				<?php // echo "<img src=\"{$image['url']}\" alt=\"{$image['alt']}\" />"; ?>
																			</div>
																			<div class="small-8 columns">
																				<?php echo "<h4> $coach_name </h4>"; ?>
																			</div>
																		</div>

																	<?php
															    endwhile;
														    ?>

														    	</div>
														    </div>

														    <?php													    

															else :

															    // no rows found

															endif;
													}

											    endwhile;

											else :

											    // no rows found

											endif;


											/*-----  End of Repeater Field for Team Coaches and Players  ------*/

											?>	
									</div>								
								</div>


					<?php 	/*-----  End of Roster Sections Tabs  ------*/	?>
							</div>
							<div class="tab-pane fade" id="tab-03">
								<h2>Schedule &amp; Resutls</h2>
																		
<?php
											/*==========  Players Repeater  ==========*/
											// check if the repeater field has rows of data
											if( have_rows('team_schedule') ):

											 	// loop through the rows of data
											    while ( have_rows('team_schedule') ) : the_row();

													$team_level = get_sub_field('team_level');
													// print_r($image);
													if ($team_level == 'varsity') {
											        // display a sub field value

															?> 

															<div class="tab-pane fade in active" id="varsity-tab-01">
															<h3>Varsity</h3>

															<?php
															/*========================================
															=            Players Repeater            =
															========================================*/

															// check if the repeater field has rows of data
															if( have_rows('team_schedule_results') ):

																?>
																		<table class="table table-striped">
																		  <thead>
																		    <tr>
																		      <th>Date</th>
																		      <th>Opponent</th>
																		      <th>Location</th>
																		      <th>Time</th>
																		      <th>Results</th>
																		    </tr>
																		  </thead>
																		  <tbody>
																		    
																<?php
																// loop through the rows of data
															    while ( have_rows('team_schedule_results') ) : the_row();
																	/* Variables */
															        $date = DateTime::createFromFormat('Ymd', get_sub_field('team_schedule_date'));
															        $opponent = get_sub_field('team_schedule_opponent');
															        $location = get_sub_field('team_schedule_location');
															        $time = get_sub_field('team_schedule_time');
															        $results = get_sub_field('team_schedule_results');
															        // $coach_bio = get_sub_field('coach_bio');

																	?>
																			<tr>
																		      <td><?php echo $date->format('m-d-Y') ?></td>
																		      <td><?php echo $opponent ?></td>
																		      <td><?php echo $location ?></td>
																		      <td><?php echo $time ?></td>
																		      <td><?php echo $results ?></td>
																		    </tr>  
																	<?php
															    endwhile;
														    ?>
																		  </tbody>
																		</table>
														    	</div>

														    <?php													    

															else :

															    // no rows found

															endif;
													} elseif ($team_level == 'jv') {
											        // display a sub field value

															?> 

															<div class="tab-pane fade in active" id="varsity-tab-01">
															<h3>Junior Varsity</h3>

															<?php
															/*========================================
															=            Players Repeater            =
															========================================*/

															// check if the repeater field has rows of data
															if( have_rows('team_schedule_results') ):

																?>
																		<table class="table table-striped">
																		  <thead>
																		    <tr>
																		      <th>Date</th>
																		      <th>Opponent</th>
																		      <th>Location</th>
																		      <th>Time</th>
																		      <th>Results</th>
																		    </tr>
																		  </thead>
																		  <tbody>
																		    
																<?php
																// loop through the rows of data
															    while ( have_rows('team_schedule_results') ) : the_row();
																	/* Variables */
															        $date = DateTime::createFromFormat('Ymd', get_sub_field('team_schedule_date'));
															        $opponent = get_sub_field('team_schedule_opponent');
															        $location = get_sub_field('team_schedule_location');
															        $time = get_sub_field('team_schedule_time');
															        $results = get_sub_field('team_schedule_results');
															        // $coach_bio = get_sub_field('coach_bio');

																	?>
																			<tr>
																		      <td><?php echo $date->format('m-d-Y') ?></td>
																		      <td><?php echo $opponent ?></td>
																		      <td><?php echo $location ?></td>
																		      <td><?php echo $time ?></td>
																		      <td><?php echo $results ?></td>
																		    </tr>  
																	<?php
															    endwhile;
														    ?>
																		  </tbody>
																		</table>
														    </div>

														    <?php													    

															else :

															    // no rows found

															endif;
													} elseif ($team_level == 'frosh_soph') {
											        // display a sub field value

															?> 

															<div class="tab-pane fade in active" id="varsity-tab-01">
															<h3>Freshmen</h3>

															<?php
															/*========================================
															=            Players Repeater            =
															========================================*/

															// check if the repeater field has rows of data
															if( have_rows('team_schedule_results') ):

																?>
																		<table class="table table-striped">
																		  <thead>
																		    <tr>
																		      <th>Date</th>
																		      <th>Opponent</th>
																		      <th>Location</th>
																		      <th>Time</th>
																		      <th>Results</th>
																		    </tr>
																		  </thead>
																		  <tbody>
																		    
																<?php
																// loop through the rows of data
															    while ( have_rows('team_schedule_results') ) : the_row();
																	/* Variables */
															        $date = DateTime::createFromFormat('Ymd', get_sub_field('team_schedule_date'));
															        $opponent = get_sub_field('team_schedule_opponent');
															        $location = get_sub_field('team_schedule_location');
															        $time = get_sub_field('team_schedule_time');
															        $results = get_sub_field('team_schedule_results');
															        // $coach_bio = get_sub_field('coach_bio');

																	?>
																			<tr>
																		      <td><?php echo $date->format('m-d-Y') ?></td>
																		      <td><?php echo $opponent ?></td>
																		      <td><?php echo $location ?></td>
																		      <td><?php echo $time ?></td>
																		      <td><?php echo $results ?></td>
																		    </tr>  
																	<?php
															    endwhile;
														    ?>
																		  </tbody>
																		</table>
														    </div>

														    <?php													    

															else :

															    // no rows found

															endif;
													}

											    endwhile;

											else :

											    // no rows found

											endif;


											/*-----  End of Repeater Field for Team Coaches and Players  ------*/

											?>	

							</div>

							</div><!-- #tab-content -->
					</div><!-- #content -->
				</div><!-- #primary -->

				<?php get_sidebar( 'section' ); ?>

			</div>

		</div>
	</article>

<?php endwhile; ?>

<?php get_footer(); ?>