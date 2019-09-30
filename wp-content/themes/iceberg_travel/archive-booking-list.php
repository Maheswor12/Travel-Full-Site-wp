<?php
/**
 * Booking-List
 */
if(isset($_GET['post_id'])) {
    get_header();

    

    $postid = $_GET['post_id'];
    $spacerow=$_GET['spacerow'];
    $start_date = $_GET['start_date'];
    $end_date = $_GET['end_date'];
    $post_type = get_post_type($postid);
    $post_title = get_the_title($postid);
    $field = get_field_object('location', $postid);
    $value = $field['value'];
    $location_slug = $value->slug;
    $location = $value->name;
    $mpeople=$_GET['maxpeople'];
    if(!empty($mpeople)){
        $max_people=$mpeople;
    }else {
        $max_people = get_field('max_people', $postid);
    }
    $discount_rate = get_field('discount_rate', $postid);
    $duration = get_field('duration', $postid);
    $min_price = get_field('price_per_person', $postid);
    $activity_term = '';
    $taxonomy = '';
    if ($post_type == 'tour') {
        $taxonomy = 'activity_tour';
    } elseif ($post_type = 'trekking') {
        $taxonomy = 'activity_trekking';
    }
    if (!empty($taxonomy)) {
        $activity_term = wp_get_post_terms($postid, $taxonomy);
    }


    if(isset( $_POST['c_book'] )){
        $post_information = array(
            'post_title' => wp_strip_all_tags( $post_title ),
            'post_type' => 'booking-list',
            'post_status' => 'publish'
        );
        $booking_status=0;
        $message=$_POST['message'];
        $email=$_POST['email'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $name=$fname.' '.$lname;
        $contactno=$_POST['number'];
//        $landline=$_POST['landline'];
        $dob=$_POST['dob'];
        $occupation=$_POST['occupation'];
        $people=$_POST['people'];
        $countryfrom=$_POST['country'];
        $address=$_POST['address'];
        $destination=$_POST['destination'];
        $activity=$_POST['activity'];
        $price=$min_price;
        $posttype=$post_type;
        $discount=$discount_rate;
		 $tripbook_type=$_POST['tripbook_type'];
        if(!empty($_POST['sdate']) && !empty($_POST['edate'])) {
            $start_date = $_POST['sdate'];
            $end_date = $_POST['edate'];
           
        }else{
            $result = $_POST['fxdate'];
            $result_explode = explode('|', $result);

            $start_date = date('mm/dd/YYYY',$result_explode[0]);
            $end_date = date('mm/dd/YYYY',$result_explode[1]);
			$spacerows1=$result_explode[2];
            $tripbook_type='fixed';
        }
		if($tripbook_type == 'variable'){
			$spacerow = '';
		}else{
        if(empty($spacerow)){
            $spacerow = $spacerows1;
        }
		}
        $post_id = wp_insert_post( $post_information );
    if($post_id ){

        add_post_meta( $post_id, 'pos_id' , $postid, true );
        add_post_meta( $post_id, 'name' , $name, true );
        add_post_meta( $post_id, 'booking_status' , $booking_status, true );
        add_post_meta( $post_id, 'email' , $email, true );
        add_post_meta( $post_id, 'mobileno' , $contactno, true );
//        add_post_meta( $post_id, 'landline' , $landline, true );
        add_post_meta( $post_id, 'dob' , $dob, true );
        add_post_meta( $post_id, 'occupation' , $occupation, true );
        add_post_meta( $post_id, 'peopleno' , $people, true );
        add_post_meta( $post_id, 'countryfrom' , $countryfrom, true );
        add_post_meta( $post_id, 'address' , $address, true );
        add_post_meta( $post_id, 'post_type' , $posttype, true );
        add_post_meta( $post_id, 'destination' , $destination, true );
        add_post_meta( $post_id, 'activity' , $activity, true );
        add_post_meta( $post_id, 'price' , $price, true );
        add_post_meta($post_id,'discount',$discount,true);
        add_post_meta($post_id,'startdate',$start_date,true);
        add_post_meta($post_id,'enddate',$end_date,true);
        add_post_meta($post_id,'spacerow',$spacerow,true);
        add_post_meta($post_id,'tripbook_type',$tripbook_type,true);

        echo 'Form Successfully Submitted!';
    } else {
            // Success! The post's categories were set.
           echo 'Form Not Submited';
        }




    }



    ?>

    <form action="#!" id="booking_frm" class="contactForm" method="post" accept-charset="utf-8">
    
        <table class="SbookingForm">
    		<tr>
    			<td colspan="2"><h2>Personal Details</h2><hr /></td>
    		</tr>
    		<tr>
    			<td>
    				First Name<br />
    				<input type="text" required="" name="fname" class="form-control">
    			</td>
    			<td>
    				Last Name<br />
                    <input type="text" required="" name="lname" class="form-control">
    			</td>
    		</tr>
    		<tr>
    			<td>
    				Email<br />
    				<input type="email" required="" name="email" class="form-control">
    			</td>
    			<td>
    				Contact Number<br />
    				<input type="text" name="number" required="" class="form-control">
    			</td>
    		</tr>
    		<tr>
    			<td>
    				Gender<br />
    				<input type="radio" name="gender" value="male">Male&nbsp;&nbsp;
    				<input type="radio" name="gender" value="female">Female
    			</td>
    			<td>
    				Date of Birth<br />
    				<input type="date" name="dob" required="" class="form-control">
    			</td>
    		</tr>
    		<tr>
    			<td>
    				Occupation<br />
    				<input type="text" name="occupation" required="" class="form-control">
    			</td>
    			<td>
    				No. of Persons<br />
    				<select name="people">
    				  <?php
                        if (!empty($max_people)) {
                            for ($i = 1; $i <= $max_people; $i++) {
                                ?>
                                <option value=<?php echo $i; ?>><?php echo $i; ?></option>
                            <?php }
                        } else {
                            for ($i = 1; $i <= 25; $i++) {
                                ?>
                                <option value=<?php echo $i; ?>><?php echo $i; ?></option>
                            <?php }
                        }
                        ?>
    				</select>
    			</td>
    		</tr>
    		<tr>
    			<td>
    				Address<br />
    				<input type="text" name="address" class="occupation">
    			</td>
    			<td>
    				Country<br />
    				<select name="country">
                    <option value="">Select Country</option>
                    <option value="Afghanistan">Afghanistan</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="American Samoa">American Samoa</option>
                    <option value="Andorra">Andorra</option>
                    <option value="Angola">Angola</option>
                    <option value="Anguilla">Anguilla</option>
                    <option value="Antarctica">Antarctica</option>
                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Armenia">Armenia</option>
                    <option value="Aruba">Aruba</option>
                    <option value="Australia">Australia</option>
                    <option value="Austria">Austria</option>
                    <option value="Azerbaijan">Azerbaijan</option>
                    <option value="Bahamas">Bahamas</option>
                    <option value="Bahrain">Bahrain</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Barbados">Barbados</option>
                    <option value="Belarus">Belarus</option>
                    <option value="Belgium">Belgium</option>
                    <option value="Belize">Belize</option>
                    <option value="Benin">Benin</option>
                    <option value="Bermuda">Bermuda</option>
                    <option value="Bhutan">Bhutan</option>
                    <option value="Bolivia">Bolivia</option>
                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                    <option value="Botswana">Botswana</option>
                    <option value="Bouvet Island">Bouvet Island</option>
                    <option value="Brazil">Brazil</option>
                    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                    <option value="Bulgaria">Bulgaria</option>
                    <option value="Burkina Faso">Burkina Faso</option>
                    <option value="Burundi">Burundi</option>
                    <option value="Cambodia">Cambodia</option>
                    <option value="Cameroon">Cameroon</option>
                    <option value="Canada">Canada</option>
                    <option value="Cape Verde">Cape Verde</option>
                    <option value="Cayman Islands">Cayman Islands</option>
                    <option value="Central African Republic">Central African Republic</option>
                    <option value="Chad">Chad</option>
                    <option value="Chile">Chile</option>
                    <option value="China">China</option>
                    <option value="Christmas Island">Christmas Island</option>
                    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Comoros">Comoros</option>
                    <option value="Congo">Congo</option>
                    <option value="Cook Islands">Cook Islands</option>
                    <option value="Costa Rica">Costa Rica</option>
                    <option value="Croatia (Hrvatska)">Croatia (Hrvatska)</option>
                    <option value="Cuba">Cuba</option>
                    <option value="Cyprus">Cyprus</option>
                    <option value="Czech Republic">Czech Republic</option>
                    <option value="Denmark">Denmark</option>
                    <option value="Djibouti">Djibouti</option>
                    <option value="Dominica">Dominica</option>
                    <option value="Dominican Republic">Dominican Republic</option>
                    <option value="East Timor">East Timor</option>
                    <option value="Ecuador">Ecuador</option>
                    <option value="Egypt">Egypt</option>
                    <option value="El Salvador">El Salvador</option>
                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                    <option value="Eritrea">Eritrea</option>
                    <option value="Estonia">Estonia</option>
                    <option value="Ethiopia">Ethiopia</option>
                    <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                    <option value="Faroe Islands">Faroe Islands</option>
                    <option value="Fiji">Fiji</option>
                    <option value="Finland">Finland</option>
                    <option value="France">France</option>
                    <option value="France, Metropolitan">France, Metropolitan</option>
                    <option value="French Guiana">French Guiana</option>
                    <option value="French Polynesia">French Polynesia</option>
                    <option value="French Southern Territories">French Southern Territories</option>
                    <option value="Gabon">Gabon</option>
                    <option value="Gambia">Gambia</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Germany">Germany</option>
                    <option value="Ghana">Ghana</option>
                    <option value="Gibraltar">Gibraltar</option>
                    <option value="Guernsey">Guernsey</option>
                    <option value="Greece">Greece</option>
                    <option value="Greenland">Greenland</option>
                    <option value="Grenada">Grenada</option>
                    <option value="Guadeloupe">Guadeloupe</option>
                    <option value="Guam">Guam</option>
                    <option value="Guatemala">Guatemala</option>
                    <option value="Guinea">Guinea</option>
                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                    <option value="Guyana">Guyana</option>
                    <option value="Haiti">Haiti</option>
                    <option value="Heard and Mc Donald Islands">Heard and Mc Donald Islands</option>
                    <option value="Honduras">Honduras</option>
                    <option value="Hong Kong">Hong Kong</option>
                    <option value="Hungary">Hungary</option>
                    <option value="Iceland">Iceland</option>
                    <option value="India">India</option>
                    <option value="Isle of Man">Isle of Man</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="Iran (Islamic Republic of)">Iran (Islamic Republic of)</option>
                    <option value="Iraq">Iraq</option>
                    <option value="Ireland">Ireland</option>
                    <option value="Israel">Israel</option>
                    <option value="Italy">Italy</option>
                    <option value="Ivory Coast">Ivory Coast</option>
                    <option value="Jersey">Jersey</option>
                    <option value="Jamaica">Jamaica</option>
                    <option value="Japan">Japan</option>
                    <option value="Jordan">Jordan</option>
                    <option value="Kazakhstan">Kazakhstan</option>
                    <option value="Kenya">Kenya</option>
                    <option value="Kiribati">Kiribati</option>
                    <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of
                    </option>
                    <option value="Korea, Republic of">Korea, Republic of</option>
                    <option value="Kosovo">Kosovo</option>
                    <option value="Kuwait">Kuwait</option>
                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                    <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                    <option value="Latvia">Latvia</option>
                    <option value="Lebanon">Lebanon</option>
                    <option value="Lesotho">Lesotho</option>
                    <option value="Liberia">Liberia</option>
                    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                    <option value="Liechtenstein">Liechtenstein</option>
                    <option value="Lithuania">Lithuania</option>
                    <option value="Luxembourg">Luxembourg</option>
                    <option value="Macau">Macau</option>
                    <option value="Macedonia">Macedonia</option>
                    <option value="Madagascar">Madagascar</option>
                    <option value="Malawi">Malawi</option>
                    <option value="Malaysia">Malaysia</option>
                    <option value="Maldives">Maldives</option>
                    <option value="Mali">Mali</option>
                    <option value="Malta">Malta</option>
                    <option value="Marshall Islands">Marshall Islands</option>
                    <option value="Martinique">Martinique</option>
                    <option value="Mauritania">Mauritania</option>
                    <option value="Mauritius">Mauritius</option>
                    <option value="Mayotte">Mayotte</option>
                    <option value="Mexico">Mexico</option>
                    <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                    <option value="Moldova, Republic of">Moldova, Republic of</option>
                    <option value="Monaco">Monaco</option>
                    <option value="Mongolia">Mongolia</option>
                    <option value="Montenegro">Montenegro</option>
                    <option value="Montserrat">Montserrat</option>
                    <option value="Morocco">Morocco</option>
                    <option value="Mozambique">Mozambique</option>
                    <option value="Myanmar">Myanmar</option>
                    <option value="Namibia">Namibia</option>
                    <option value="Nauru">Nauru</option>
                    <option value="Nepal">Nepal</option>
                    <option value="Netherlands">Netherlands</option>
                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                    <option value="New Caledonia">New Caledonia</option>
                    <option value="New Zealand">New Zealand</option>
                    <option value="Nicaragua">Nicaragua</option>
                    <option value="Niger">Niger</option>
                    <option value="Nigeria">Nigeria</option>
                    <option value="Niue">Niue</option>
                    <option value="Norfolk Island">Norfolk Island</option>
                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                    <option value="Norway">Norway</option>
                    <option value="Oman">Oman</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Palau">Palau</option>
                    <option value="Palestine">Palestine</option>
                    <option value="Panama">Panama</option>
                    <option value="Papua New Guinea">Papua New Guinea</option>
                    <option value="Paraguay">Paraguay</option>
                    <option value="Peru">Peru</option>
                    <option value="Philippines">Philippines</option>
                    <option value="Pitcairn">Pitcairn</option>
                    <option value="Poland">Poland</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Puerto Rico">Puerto Rico</option>
                    <option value="Qatar">Qatar</option>
                    <option value="Reunion">Reunion</option>
                    <option value="Romania">Romania</option>
                    <option value="Russian Federation">Russian Federation</option>
                    <option value="Rwanda">Rwanda</option>
                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                    <option value="Saint Lucia">Saint Lucia</option>
                    <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                    <option value="Samoa">Samoa</option>
                    <option value="San Marino">San Marino</option>
                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                    <option value="Saudi Arabia">Saudi Arabia</option>
                    <option value="Senegal">Senegal</option>
                    <option value="Serbia">Serbia</option>
                    <option value="Seychelles">Seychelles</option>
                    <option value="Sierra Leone">Sierra Leone</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Slovakia">Slovakia</option>
                    <option value="Slovenia">Slovenia</option>
                    <option value="Solomon Islands">Solomon Islands</option>
                    <option value="Somalia">Somalia</option>
                    <option value="South Africa">South Africa</option>
                    <option value="South Georgia South Sandwich Islands">South Georgia South Sandwich Islands
                    </option>
                    <option value="Spain">Spain</option>
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="St. Helena">St. Helena</option>
                    <option value="St. Pierre and Miquelon">St. Pierre and Miquelon</option>
                    <option value="Sudan">Sudan</option>
                    <option value="Suriname">Suriname</option>
                    <option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option>
                    <option value="Swaziland">Swaziland</option>
                    <option value="Sweden">Sweden</option>
                    <option value="Switzerland">Switzerland</option>
                    <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                    <option value="Taiwan">Taiwan</option>
                    <option value="Tajikistan">Tajikistan</option>
                    <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                    <option value="Thailand">Thailand</option>
                    <option value="Togo">Togo</option>
                    <option value="Tokelau">Tokelau</option>
                    <option value="Tonga">Tonga</option>
                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                    <option value="Tunisia">Tunisia</option>
                    <option value="Turkey">Turkey</option>
                    <option value="Turkmenistan">Turkmenistan</option>
                    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                    <option value="Tuvalu">Tuvalu</option>
                    <option value="Uganda">Uganda</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="United Arab Emirates">United Arab Emirates</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="United States">United States</option>
                    <option value="United States minor outlying islands">United States minor outlying islands
                    </option>
                    <option value="Uruguay">Uruguay</option>
                    <option value="Uzbekistan">Uzbekistan</option>
                    <option value="Vanuatu">Vanuatu</option>
                    <option value="Vatican City State">Vatican City State</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Vietnam">Vietnam</option>
                    <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                    <option value="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option>
                    <option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
                    <option value="Western Sahara">Western Sahara</option>
                    <option value="Yemen">Yemen</option>
                    <option value="Zaire">Zaire</option>
                    <option value="Zambia">Zambia</option>
                    <option value="Zimbabwe">Zimbabwe</option>
                </select>
    			</td>
    		</tr>
    
    		<tr>
    			<td colspan="2"><br /><h2>Preferences</h2><hr /></td>
    		</tr>
    		<tr>
    			<td>
    				Destination<br />
    				<select name="destination">
    				  <?php
                        if (!empty($location)) {
                            ?>
                            <option value="<?php echo $location_slug; ?>">
                                <?php echo $location; ?> </option>
                            <?php
                        } else {
        
                            $terms = get_terms(array(
                                'taxonomy' => 'location',
                                'hide_empty' => true,
                            ));
                            foreach ($terms as $categories): ?>
                                <option value="<?php echo $categories->slug; ?>"><?php echo $categories->name; ?></option>
                            <?php endforeach;
                        }
                        ?>
    				</select>
    			</td>
    			<td>
    				Activities<br />
    				<select name="activity">
    				  <?php
                        if (!empty($activity_term)) {
        
                            foreach ($activity_term as $activity_fields) {
                                ?>
                                <option value="<?php echo $activity_fields->slug; ?>">
                                    <?php echo $activity_fields->name; ?> </option>
                                <?php
                            }
                        } else {
                            ?>
                            <option value="uncategorized">
                                Uncategorized
                            </option>
                            <?php
                        }
                        ?>
    				</select>
    			</td>
    		</tr>
    		<tr>
    			<td colspan="2">
    				Additional Message<br />
    				<textarea name="message"></textarea>
    			</td>
    		</tr>
    		<tr>
    			<td colspan="2"><br /><h2>Cost Preferences</h2><hr /></td>
    		</tr>
    		<tr>
    		    <td>
    		        <ul>
    		        <?php
                        if(!empty($start_date)|| !empty($end_date)){
                            ?>
                        <li> <label>Start Date: <span class="startDate"><?php echo date('F j, Y', strtotime($start_date)); ?></span></label>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <label>End Date: <span class="endDate"><?php echo date('F j, Y', strtotime($end_date)); ?></span></label>
                            <input type="hidden" required="" name="sdate" value="<?php echo $start_date;?>">
                            <input type="hidden" required="" name="edate" value="<?php echo $end_date;?>">
                            <input type="hidden" name="tripbook_type" value="fixed">
                        </li>
                            <?php
                        }else{
							if(count(get_field('fixed_departure'))>0){
                            if(have_rows('fixed_departure',$postid)) {
                                $i = 1;
                                ?>
                           <li> <select name="fxdate" id="fxdate">
                            <!--<option value="">Select Start and End date</option>-->
                                <?php
                                while (have_rows('fixed_departure',$postid)):
                                    the_row();
                                $spacerow1=$i;
								?>
							   
							   <?php
                                    $startdate=get_sub_field('start_date');
                                    $enddate=get_sub_field('end_date');
                                    $stdate= date($startdate);
                                    $cdate= date('Ymd');
                                    if($stdate > $cdate) {
                                        ?>
                                        <option value="<?php echo $startdate.'|'.$enddate.'|'.$spacerow1; ?>"><?php echo date('F j, Y', strtotime($startdate)).' - '. date('F j, Y', strtotime($enddate)); ?></option>
                    
                                        <?php
                                    }
                                $i++;
                                endwhile;
                                ?>
                               </select></li>
                                <?php
							}
                                }else {
                                ?>
                               <li> <label>Start Date :</label> <input type="date" required="" name="sdate">
                                   <label>End Date :</label><input type="date" required="" name="edate">
                                   <input type="hidden" name="tripbook_type" value="variable">
                               </li>
                    
                                <?php
                            }
                        }
                        if (!empty($min_price)) {
                        ?>
                        <li>Cost per Person: <span class="costPer"><?php echo '$'.$min_price ?></span></li>
                        <?php
                                }
                                if(!empty($discount_rate)){
                                            ?>
                                            <li>Discount: <span class="discount"><?php echo $discount_rate.'%';?></span></li>
                                    <?php } ?>
                                    </ul>
    		    </td>    
    		</tr>
    		
    		<tr>	
    			<td colspan="2">
    				How did you hear about us?<br />
    				<select name="howhear" class="form-control howHear">
                        <option value="Facebook">Facebook</option>
                        <option value="Friend Recommendation">Friend Recommendation</option>
                        <option value="I Am A Former Client">I Am A Former Client</option>
                        <option value="Internet Search">Internet Search</option>
                        <option value="Leader / Staff Recommendation">Leader / Staff Recommendation</option>
                        <option value="Others">Others</option>
                        <option value="Travel Blogs">Travel Blogs</option>
                        <option value="Travel Forums">Travel Forums</option>
                        <option value="Twitter">Twitter</option>
                        <option value="TripAdvisor">TripAdvisor</option>
                    </select>
    			</td>
    		</tr>
    		<tr>
    			<td>
    				<input type="checkbox" name="terms" required="" value="1"> I hereby confirm that i have read and
                        understood the <a href="http://travelbird.com.np/page/terms"> terms and conditions</a>.
                    </td>
    		</tr>
    		<tr>
    			<td>
    				<input type="submit" name="c_book" value="Book Now">
    			</td>
    		</tr>
    	</table>
    
    </form>
        <?php
}else{
    $url=home_url();

    wp_redirect($url);
    exit;
}

get_footer();
