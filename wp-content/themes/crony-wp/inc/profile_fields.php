<?php
/*================== Add Extra Fields with user profile =========================*/

add_action( 'show_user_profile', 'ct_extra_user_profile_fields' );
add_action( 'edit_user_profile', 'ct_extra_user_profile_fields' );
add_action( 'personal_options_update', 'ct_save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'ct_save_extra_user_profile_fields' );

function ct_save_extra_user_profile_fields( $user_id ){
	if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }
		update_user_meta( $user_id, 'ct_fullname', $_POST['ct_fullname'] );
		update_user_meta( $user_id, 'ct_gender', $_POST['ct_gender'] );
		update_user_meta( $user_id, 'ct_coverpic', $_POST['ct_coverpic'] );
		update_user_meta( $user_id, 'ct_age', $_POST['ct_age'] );
		update_user_meta( $user_id, 'ct_aboutme', $_POST['ct_aboutme'] );
		update_user_meta( $user_id, 'ct_twitter', $_POST['ct_twitter'] );
		update_user_meta( $user_id, 'ct_location', $_POST['ct_location'] );
		update_user_meta( $user_id, 'ct_jobtitle', $_POST['ct_jobtitle'] );
		update_user_meta( $user_id, 'ct_company', $_POST['ct_company'] );
		update_user_meta( $user_id, 'ct_education', $_POST['ct_education'] );
		update_user_meta( $user_id, 'ct_moveindate', $_POST['ct_moveindate'] );
		update_user_meta( $user_id, 'ct_job_location', $_POST['ct_job_location'] );
		update_user_meta( $user_id, 'ct_budget', $_POST['ct_budget'] );
		update_user_meta( $user_id, 'ct_prefered_location', $_POST['ct_prefered_location'] );
		update_user_meta( $user_id, 'ct_moveindate', $_POST['ct_moveindate'] );
		update_user_meta( $user_id, 'ct_interest', $_POST['ct_interest'] );
}

function ct_extra_user_profile_fields( $user ){ ?>
	<h3>Extra Users Fields</h3>
	 
	<table class="form-table">
		<tr>
			<th><label for="ct_fullname">Full Name</label></th>
			<td>
			<input type="text" id="ct_fullname" name="ct_fullname" value="<?php echo esc_attr( get_the_author_meta( 'ct_fullname', $user->ID )); ?>" >
			</td>
		</tr>
		<tr>
			<th><label for="ct_coverpic">Interest</label></th>
			<td>
			<input type="text" id="ct_interest" name="ct_interest" value="<?php echo esc_attr( get_the_author_meta( 'ct_interest', $user->ID )); ?>" >
			</td>
		</tr>
		<tr>
			<th><label for="ct_gender">Gender</label></th>
			<td>
			<input type="radio" id="ct_gender" name="ct_gender" value="Male" <?php echo ( esc_attr( get_the_author_meta( 'ct_gender', $user->ID )) == "Male" ? 'checked' : '' ); ?> > 
			<span class="description">Male</span>
			<input type="radio" id="ct_gender" name="ct_gender" value="Female" <?php echo ( esc_attr( get_the_author_meta( 'ct_gender', $user->ID )) == "Female" ? 'checked' : '' ); ?>> 
			<span class="description">Female</span>
			</td>
		</tr>
		<tr>
			<th><label for="ct_age">Age</label></th>
			<td>
			<input type="text" id="ct_age" name="ct_age" size="20" value="<?php echo esc_attr( get_the_author_meta( 'ct_age', $user->ID )); ?>" >
			<span class="description">Please enter your Age, eg: 24+</span>
			</td>
		</tr>
		<tr>
			<th><label for="ct_aboutme">About Me</label></th>
			<td>
			<textarea id="ct_aboutme" name="ct_aboutme" size="250" ><?php echo esc_attr( get_the_author_meta( 'ct_aboutme', $user->ID )); ?></textarea>
			</td>
		</tr>
		<tr>
			<th><label for="ct_twitter">Twitter  User Name</label></th>
			<td>
			<input type="text" id="ct_twitter" name="ct_twitter" size="20" value="<?php echo esc_attr( get_the_author_meta( 'ct_twitter', $user->ID )); ?>">
			<span class="description">Please enter your Twitter Account User name, eg: tysonchampno1</span>
			</td>
		</tr>
		<tr>
			<th><label for="ct_location">Location</label></th>
			<td>
			<textarea id="ct_location" name="ct_location" size="150" ><?php echo esc_attr( get_the_author_meta( 'ct_location', $user->ID )); ?></textarea>
			<span class="description">Please enter your Full Address</span>
			</td>
		</tr>
		<tr>
			<th><label for="ct_jobtitle">Job Title</label></th>
			<td>
			<input type="text" id="ct_jobtitle" name="ct_jobtitle" size="20" value="<?php echo esc_attr( get_the_author_meta( 'ct_jobtitle', $user->ID )); ?>">
			</td>
		</tr>
		<tr>
			<th><label for="ct_company">Company</label></th>
			<td>
			<input type="text" id="ct_company" name="ct_company" size="20" value="<?php echo esc_attr( get_the_author_meta( 'ct_company', $user->ID )); ?>">
			</td>
		</tr>
		<tr>
			<th><label for="ct_education">Education</label></th>
			<td>
			<input type="text" id="ct_education" name="ct_education" size="20" value="<?php echo esc_attr( get_the_author_meta( 'ct_education', $user->ID )); ?>">
			<span class="description">Please enter your Education, eg: University Name or Institution Name</span>
			</td>
		</tr>
		<tr>
			<th><label for="ct_budget">Budget</label></th>
			<td>
			<input type="text" id="ct_budget" name="ct_budget" size="20" value="<?php echo esc_attr( get_the_author_meta( 'ct_budget', $user->ID )); ?>">
			<span class="description">Please enter your Budget in Doller, eg: $12,000</span>
			</td>
		</tr>
		<tr>
			<th><label for="ct_prefered_location">prefered Location</label></th>
			<td>
			<textarea id="ct_prefered_location" name="ct_prefered_location" size="150" ><?php echo esc_attr( get_the_author_meta( 'ct_prefered_location', $user->ID )); ?></textarea>
			<span class="description">Please enter your full address</span>
			</td>
		</tr>
		<tr>
			<th><label for="ct_moveindate">Move-in-date</label></th>
			<td>
			<input type="text" id="ct_moveindate" name="ct_moveindate" size="20" value="<?php echo esc_attr( get_the_author_meta( 'ct_moveindate', $user->ID )); ?>">
			<span class="description">Please enter your Move-in-date, eg: 10.02.2016</span>
			</td>
		</tr>
	</table>
<?php }?>