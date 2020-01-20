<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Sign Up</title>

	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- favicon -->
	<link rel="icon" type="image/png" href="assets/favicon.ico"/>

	<!-- signup.css -->
	<link rel="stylesheet" type="text/css" href="css/signup.css">

	<!-- animsition.css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/css/animsition.css">
	<!-- animsition.js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/js/animsition.min.js"></script>

	<!-- loading font -->
	<?php require 'components/fonts.php'; ?>

	<!-- font css -->
	<link rel="stylesheet" href="css/fonts.css"/>

	<!-- nav.css -->
	<link rel="stylesheet" href="css/nav.css"/>

	<!-- for autocomplete -->
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="http://resources/demos/style.css">
	<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body class='animsition'>

	<div class="collapse" id="navbarToggleExternalContent">
		<ul class="navbar-nav font-Comfortaa" style="font-size: 22px;">
			
		</ul>
	</div>
	<nav class="navbar navbar-expand-lg navbar-light bg-light " >
		<div class="collapse navbar-collapse w-100 order-1 order-lg-0" id="navbarNav">
			<ul class="navbar-nav font-Comfortaa" style="font-size: 22px;">
				
			</ul>
		</div>
		<div class="d-flex w-100 order-0">
			<div class="w-100">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
			<a class="navbar-brand text-center w-100 font-Monoton animsition-link " href="index.php" style="font-size: 40px; letter-spacing: 3px;">JoinMe&nbsp;&nbsp;&nbsp; <img src="assets/JoinMe.png" class="navbar-brand text-center"  class="d-inline-block align-top" alt="" width="45" height="45"></a>
			<span class="w-100"></span>
		</div>
		<span class="w-100"></span>
	</nav>

	<div class="container-fluid nav_holder"></div>
	<div class="container-fluid h_90">
		<div class="row h-100 first_section">
			<div class="col-6 h-100 initial_yellow">
				<div class="row w-100 h-25 m-0">
					<h1>Employee</h1>
				</div>			
				<div class="employee">
					<img src="assets/employee.png">	
				</div>
				
			</div>
			<div class="col-6 h-100 initial_purple">
				<div class="row w-100 h-25 m-0">
					<h1>Recruiter</h1>
				</div>		
				<div class="employer">
					<img src="assets/employer.png">
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid nav_holder hidden" id="holder_1"></div>
	<div class="container-fluid h_90 employee_form four_width hidden changed_ul">
		<div class="w-25 h-100 percent_25">
			<div class="progress" style="height: 2%;">
				<div class="progress-bar progress-bar-striped w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" >25%</div>
			</div>
			<div class="h-100 color_1 ">
				<h1>What is your First name?</h1>
				<input class="form-control" type="text"  required id="employee_firstName">
				<h1>What is your Last name?</h1>
				<input class="form-control" type="text"   required id="employee_lastName">
				<h1>What is your Gender?</h1>
				<!-- <input class="form-control" type="text" id="employee_gender" required> -->
				<select class="form-control" type="text" id="employee_gender" style="height: 5%;width: 50%;margin-left:auto;margin-right: auto;" required>
					<option selected>Male</option>
					<option>Female</option>
				</select>
				<button class="scroll_0 btn btn-primary">Next</button>
			</div>
		</div>
		<div class="w-25 h-100 hidden percent_50 ">
			<div class="progress" style="height: 2%;">
				<div class="progress-bar progress-bar-striped w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
			</div>
			<div class="h-100 color_2">
				<h1>What is your Location?</h1>
				<div class="input-group input-group-lg">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Country</span>
					</div>
					<input class="form-control country_tags" type="text"  aria-describedby="basic-addon1" style="height: 100%; margin-right: 20px;" required id="employee_country">
					<div class="input-group-prepend">
						<span class="input-group-text city_tags" id="basic-addon2">City</span>
					</div>
					<input class="form-control" type="text"  aria-describedby="basic-addon2" style="height: 100%;" id="city_tags"  required>
				</div>
				
				<h1>What is your Preferred Working City?</h1>
				<input class="form-control city_tags" type="text" id="employee_preferredWorkingCity">
				<h1>What is your Country of Citizenship?</h1>
				<input class="form-control country_tags" type="text"  id="country_tags_2">
				<button class="scroll_1 btn btn-primary">Next</button>
			</div>
		</div>
		<div class="w-25 h-100 hidden percent_75 ">
			<div class="progress" style="height: 2%;">
				<div class="progress-bar progress-bar-striped w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
			</div>
			<div class="h-100 color_3 ">
				<h1>What is your Targeted Career?</h1>
				<input class="form-control" type="text"  id="employee_targeted_career">
				<h1>What is your Expected Salary?</h1>
				<div class="input-group input-group-lg">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon3">From $</span>
					</div>
					<input class="form-control" type="text"  aria-describedby="basic-addon3" style="height: 100%;margin-right: 20px;" id="employee_from_dollar">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon4">To $</span>
					</div>
					<input class="form-control" type="text"  aria-describedby="basic-addon4" id="employee_to_dollar" style="height: 100%;" >
				</div>
				<h1>Please Upload your Photo.</h1>
				<input type="url" class="form-control"  id="inputGroupFile" name="image_url" required>
				<button class="to_submit btn btn-success" onclick="submit_employee();">Submit</button>

			</div>
		</div>
		

	</div>

	<div class="container-fluid h_90 employer_form four_width hidden changed_ul">
		<div class="w-25 h-100 percent_25 percent_25_2">
			<div class="progress" style="height: 2%;">
				<div class="progress-bar progress-bar-striped w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" >25%</div>
			</div>
			<div class="h-100 color_1 " style="background: rgb(242,132,130);
			background: radial-gradient(circle, rgba(242,132,130,1) 0%, rgba(240,138,75,1) 88%);">
			<h1>What is your Company Name?</h1>
			<input class="form-control" type="text"  id="employer_company_name" required>
			<h1>Where is your Company Located?</h1>
			<div class="input-group input-group-lg">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon4">Country</span>
				</div>
				<input class="form-control country_tags" type="text"  aria-describedby="basic-addon4" style="height: 100%;margin-right: 20px;" id="employer_country_tags"  required>
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon5">City</span>
				</div>
				<input class="form-control city_tags" type="text"  aria-describedby="basic-addon5" style="height: 100%;" id="employer_city" required>
			</div>

			<button class="scroll_2 btn btn-primary">Next</button>
		</div>
	</div>
	<div class="w-25 h-100 hidden percent_50 percent_50_2">
		<div class="progress" style="height: 2%;">
			<div class="progress-bar progress-bar-striped w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
		</div>
		<div class="h-100 color_2" style="background: rgb(240,138,75);
		background: radial-gradient(circle, rgba(240,138,75,1) 0%, rgba(242,165,65,1) 88%);">
		<h1>What is your Company Type?</h1>
		<input class="form-control" type="text"  id="employer_company_type">
		<h1>How Big is your Company?</h1>
		<div class="input-group input-group-lg">
			<input class="form-control country_tags" type="text"  aria-describedby="basic-addon5" style="height: 100%;" id="employer_company_size">
			<div class="input-group-append">
				<span class="input-group-text" id="basic-addon5">People</span>
			</div>
		</div>
		<button class="scroll_3 btn btn-primary">Next</button>
	</div>
</div>
<div class="w-25 h-100 hidden percent_75 percent_75_2">
	<div class="progress" style="height: 2%;">
		<div class="progress-bar progress-bar-striped w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
	</div>
	<div class="h-100 color_3 " style="background: rgb(242,165,65);
	background: radial-gradient(circle, rgba(242,165,65,1) 0%, rgba(243,202,64,1) 88%);">
	<h1>What is your Company's Slogan?</h1>
	<input class="form-control" type="text" id="employer_company_slogan">
	<h1>What is your Company's Website?</h1>
	<input class="form-control" type="text" id="employer_company_website" value="www.google.com" required>
	<h1>Please Enter the URL of your company logo.</h1>
	<input type="url" class="form-control" id="inputGroupFile2" name="image_url" required>

	<button class="to_submit btn btn-success" onclick="submit_employer();">Submit</button>
</div>
</div>



</div>





</div>

<!-- js for bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<!-- js for bootstrap -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript">
	'use strict';
	$(document).ready(function() {
		$(".animsition").animsition({
			inClass: 'rotate-in-sm',
			outClass: 'rotate-out-sm',
			inDuration: 1500,
			outDuration: 800,
			linkElement: '.animsition-link',
				// e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
				loading: true,
				loadingParentElement: 'body', //animsition wrapper element
				loadingClass: 'animsition-loading',
				loadingInner: '', // e.g '<img src="loading.svg" />'
				timeout: false,
				timeoutCountdown: 5000,
				onLoadEvent: true,
				browser: [ 'animation-duration', '-webkit-animation-duration'],
				// "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
				// The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
				overlay : false,
				overlayClass : 'animsition-overlay-slide',
				overlayParentElement : 'body',
				transition: function(url){ window.location.href = url; }
			});
	});

	$( function() {
		var availableTags = [
		"Afghanistan",
		"Albania",
		"Algeria",
		"American Samoa",
		"Andorra",
		"Angola",
		"Anguilla",
		"Antarctica",
		"Antigua and Barbuda",
		"Argentina",
		"Armenia",
		"Aruba",
		"Australia",
		"Austria",
		"Azerbaijan",
		"Bahamas (the)",
		"Bahrain",
		"Bangladesh",
		"Barbados",
		"Belarus",
		"Belgium",
		"Belize",
		"Benin",
		"Bermuda",
		"Bhutan",
		"Bolivia (Plurinational State of)",
		"Bonaire, Sint Eustatius and Saba",
		"Bosnia and Herzegovina",
		"Botswana",
		"Bouvet Island",
		"Brazil",
		"British Indian Ocean Territory (the)",
		"Brunei Darussalam",
		"Bulgaria",
		"Burkina Faso",
		"Burundi",
		"Cabo Verde",
		"Cambodia",
		"Cameroon",
		"Canada",
		"Cayman Islands (the)",
		"Central African Republic (the)",
		"Chad",
		"Chile",
		"China",
		"Christmas Island",
		"Cocos (Keeling) Islands (the)",
		"Colombia",
		"Comoros (the)",
		"Congo (the Democratic Republic of the)",
		"Congo (the)",
		"Cook Islands (the)",
		"Costa Rica",
		"Croatia",
		"Cuba",
		"Curaçao",
		"Cyprus",
		"Czechia",
		"Côte d'Ivoire",
		"Denmark",
		"Djibouti",
		"Dominica",
		"Dominican Republic (the)",
		"Ecuador",
		"Egypt",
		"El Salvador",
		"Equatorial Guinea",
		"Eritrea",
		"Estonia",
		"Eswatini",
		"Ethiopia",
		"Falkland Islands (the) [Malvinas]",
		"Faroe Islands (the)",
		"Fiji",
		"Finland",
		"France",
		"French Guiana",
		"French Polynesia",
		"French Southern Territories (the)",
		"Gabon",
		"Gambia (the)",
		"Georgia",
		"Germany",
		"Ghana",
		"Gibraltar",
		"Greece",
		"Greenland",
		"Grenada",
		"Guadeloupe",
		"Guam",
		"Guatemala",
		"Guernsey",
		"Guinea",
		"Guinea-Bissau",
		"Guyana",
		"Haiti",
		"Heard Island and McDonald Islands",
		"Holy See (the)",
		"Honduras",
		"Hong Kong",
		"Hungary",
		"Iceland",
		"India",
		"Indonesia",
		"Iran (Islamic Republic of)",
		"Iraq",
		"Ireland",
		"Isle of Man",
		"Israel",
		"Italy",
		"Jamaica",
		"Japan",
		"Jersey",
		"Jordan",
		"Kazakhstan",
		"Kenya",
		"Kiribati",
		"Korea (the Democratic People's Republic of)",
		"Korea (the Republic of)",
		"Kuwait",
		"Kyrgyzstan",
		"Lao People's Democratic Republic (the)",
		"Latvia",
		"Lebanon",
		"Lesotho",
		"Liberia",
		"Libya",
		"Liechtenstein",
		"Lithuania",
		"Luxembourg",
		"Macao",
		"Madagascar",
		"Malawi",
		"Malaysia",
		"Maldives",
		"Mali",
		"Malta",
		"Marshall Islands (the)",
		"Martinique",
		"Mauritania",
		"Mauritius",
		"Mayotte",
		"Mexico",
		"Micronesia (Federated States of)",
		"Moldova (the Republic of)",
		"Monaco",
		"Mongolia",
		"Montenegro",
		"Montserrat",
		"Morocco",
		"Mozambique",
		"Myanmar",
		"Namibia",
		"Nauru",
		"Nepal",
		"Netherlands (the)",
		"New Caledonia",
		"New Zealand",
		"Nicaragua",
		"Niger (the)",
		"Nigeria",
		"Niue",
		"Norfolk Island",
		"Northern Mariana Islands (the)",
		"Norway",
		"Oman",
		"Pakistan",
		"Palau",
		"Palestine, State of",
		"Panama",
		"Papua New Guinea",
		"Paraguay",
		"Peru",
		"Philippines (the)",
		"Pitcairn",
		"Poland",
		"Portugal",
		"Puerto Rico",
		"Qatar",
		"Republic of North Macedonia",
		"Romania",
		"Russian Federation (the)",
		"Rwanda",
		"Réunion",
		"Saint Barthélemy",
		"Saint Helena, Ascension and Tristan da Cunha",
		"Saint Kitts and Nevis",
		"Saint Lucia",
		"Saint Martin (French part)",
		"Saint Pierre and Miquelon",
		"Saint Vincent and the Grenadines",
		"Samoa",
		"San Marino",
		"Sao Tome and Principe",
		"Saudi Arabia",
		"Senegal",
		"Serbia",
		"Seychelles",
		"Sierra Leone",
		"Singapore",
		"Sint Maarten (Dutch part)",
		"Slovakia",
		"Slovenia",
		"Solomon Islands",
		"Somalia",
		"South Africa",
		"South Georgia and the South Sandwich Islands",
		"South Sudan",
		"Spain",
		"Sri Lanka",
		"Sudan (the)",
		"Suriname",
		"Svalbard and Jan Mayen",
		"Sweden",
		"Switzerland",
		"Syrian Arab Republic",
		"Taiwan (Province of China)",
		"Tajikistan",
		"Tanzania, United Republic of",
		"Thailand",
		"Timor-Leste",
		"Togo",
		"Tokelau",
		"Tonga",
		"Trinidad and Tobago",
		"Tunisia",
		"Turkey",
		"Turkmenistan",
		"Turks and Caicos Islands (the)",
		"Tuvalu",
		"Uganda",
		"Ukraine",
		"United Arab Emirates (the)",
		"United Kingdom of Great Britain and Northern Ireland (the)",
		"United States Minor Outlying Islands (the)",
		"United States of America (the)",
		"Uruguay",
		"Uzbekistan",
		"Vanuatu",
		"Venezuela (Bolivarian Republic of)",
		"Viet Nam",
		"Virgin Islands (British)",
		"Virgin Islands (U.S.)",
		"Wallis and Futuna",
		"Western Sahara",
		"Yemen",
		"Zambia",
		"Zimbabwe",
		"Åland Islands"
		];
		$( ".country_tags" ).autocomplete({
			source: availableTags
		});
	} );
$( function() {
	var city_names = ["Aberdeen", "Abilene", "Akron", "Albany", "Albuquerque", "Alexandria", "Allentown", "Amarillo", "Anaheim", "Anchorage", "Ann Arbor", "Antioch", "Apple Valley", "Appleton", "Arlington", "Arvada", "Asheville", "Athens", "Atlanta", "Atlantic City", "Augusta", "Aurora", "Austin", "Bakersfield", "Baltimore", "Barnstable", "Baton Rouge", "Beaumont", "Bel Air", "Bellevue", "Berkeley", "Bethlehem", "Billings", "Birmingham", "Bloomington", "Boise", "Boise City", "Bonita Springs", "Boston", "Boulder", "Bradenton", "Bremerton", "Bridgeport", "Brighton", "Brownsville", "Bryan", "Buffalo", "Burbank", "Burlington", "Cambridge", "Canton", "Cape Coral", "Carrollton", "Cary", "Cathedral City", "Cedar Rapids", "Champaign", "Chandler", "Charleston", "Charlotte", "Chattanooga", "Chesapeake", "Chicago", "Chula Vista", "Cincinnati", "Clarke County", "Clarksville", "Clearwater", "Cleveland", "College Station", "Colorado Springs", "Columbia", "Columbus", "Concord", "Coral Springs", "Corona", "Corpus Christi", "Costa Mesa", "Dallas", "Daly City", "Danbury", "Davenport", "Davidson County", "Dayton", "Daytona Beach", "Deltona", "Denton", "Denver", "Des Moines", "Detroit", "Downey", "Duluth", "Durham", "El Monte", "El Paso", "Elizabeth", "Elk Grove", "Elkhart", "Erie", "Escondido", "Eugene", "Evansville", "Fairfield", "Fargo", "Fayetteville", "Fitchburg", "Flint", "Fontana", "Fort Collins", "Fort Lauderdale", "Fort Smith", "Fort Walton Beach", "Fort Wayne", "Fort Worth", "Frederick", "Fremont", "Fresno", "Fullerton", "Gainesville", "Garden Grove", "Garland", "Gastonia", "Gilbert", "Glendale", "Grand Prairie", "Grand Rapids", "Grayslake", "Green Bay", "GreenBay", "Greensboro", "Greenville", "Gulfport-Biloxi", "Hagerstown", "Hampton", "Harlingen", "Harrisburg", "Hartford", "Havre de Grace", "Hayward", "Hemet", "Henderson", "Hesperia", "Hialeah", "Hickory", "High Point", "Hollywood", "Honolulu", "Houma", "Houston", "Howell", "Huntington", "Huntington Beach", "Huntsville", "Independence", "Indianapolis", "Inglewood", "Irvine", "Irving", "Jackson", "Jacksonville", "Jefferson", "Jersey City", "Johnson City", "Joliet", "Kailua", "Kalamazoo", "Kaneohe", "Kansas City", "Kennewick", "Kenosha", "Killeen", "Kissimmee", "Knoxville", "Lacey", "Lafayette", "Lake Charles", "Lakeland", "Lakewood", "Lancaster", "Lansing", "Laredo", "Las Cruces", "Las Vegas", "Layton", "Leominster", "Lewisville", "Lexington", "Lincoln", "Little Rock", "Long Beach", "Lorain", "Los Angeles", "Louisville", "Lowell", "Lubbock", "Macon", "Madison", "Manchester", "Marina", "Marysville", "McAllen", "McHenry", "Medford", "Melbourne", "Memphis", "Merced", "Mesa", "Mesquite", "Miami", "Milwaukee", "Minneapolis", "Miramar", "Mission Viejo", "Mobile", "Modesto", "Monroe", "Monterey", "Montgomery", "Moreno Valley", "Murfreesboro", "Murrieta", "Muskegon", "Myrtle Beach", "Naperville", "Naples", "Nashua", "Nashville", "New Bedford", "New Haven", "New London", "New Orleans", "New York", "New York City", "Newark", "Newburgh", "Newport News", "Norfolk", "Normal", "Norman", "North Charleston", "North Las Vegas", "North Port", "Norwalk", "Norwich", "Oakland", "Ocala", "Oceanside", "Odessa", "Ogden", "Oklahoma City", "Olathe", "Olympia", "Omaha", "Ontario", "Orange", "Orem", "Orlando", "Overland Park", "Oxnard", "Palm Bay", "Palm Springs", "Palmdale", "Panama City", "Pasadena", "Paterson", "Pembroke Pines", "Pensacola", "Peoria", "Philadelphia", "Phoenix", "Pittsburgh", "Plano", "Pomona", "Pompano Beach", "Port Arthur", "Port Orange", "Port Saint Lucie", "Port St. Lucie", "Portland", "Portsmouth", "Poughkeepsie", "Providence", "Provo", "Pueblo", "Punta Gorda", "Racine", "Raleigh", "Rancho Cucamonga", "Reading", "Redding", "Reno", "Richland", "Richmond", "Richmond County", "Riverside", "Roanoke", "Rochester", "Rockford", "Roseville", "Round Lake Beach", "Sacramento", "Saginaw", "Saint Louis", "Saint Paul", "Saint Petersburg", "Salem", "Salinas", "Salt Lake City", "San Antonio", "San Bernardino", "San Buenaventura", "San Diego", "San Francisco", "San Jose", "Santa Ana", "Santa Barbara", "Santa Clara", "Santa Clarita", "Santa Cruz", "Santa Maria", "Santa Rosa", "Sarasota", "Savannah", "Scottsdale", "Scranton", "Seaside", "Seattle", "Sebastian", "Shreveport", "Simi Valley", "Sioux City", "Sioux Falls", "South Bend", "South Lyon", "Spartanburg", "Spokane", "Springdale", "Springfield", "St. Louis", "St. Paul", "St. Petersburg", "Stamford", "Sterling Heights", "Stockton", "Sunnyvale", "Syracuse", "Tacoma", "Tallahassee", "Tampa", "Temecula", "Tempe", "Thornton", "Thousand Oaks", "Toledo", "Topeka", "Torrance", "Trenton", "Tucson", "Tulsa", "Tuscaloosa", "Tyler", "Utica", "Vallejo", "Vancouver", "Vero Beach", "Victorville", "Virginia Beach", "Visalia", "Waco", "Warren", "Washington", "Waterbury", "Waterloo", "West Covina", "West Valley City", "Westminster", "Wichita", "Wilmington", "Winston", "Winter Haven", "Worcester", "Yakima", "Yonkers", "York", "Youngstown"];

	$( ".city_tags" ).autocomplete({
		source: city_names
	});
} );


$(".employee").click(function() {
	$(".employee_form").toggleClass("hidden");
	$("#holder_1").toggleClass("hidden");
	$('html,body').animate({ 
		scrollTop: $("#holder_1").offset().top },
		'slow');
});

$(".employer").click(function() {
	$(".employer_form").toggleClass("hidden");
	$("#holder_1").toggleClass("hidden");
	$('html,body').animate({
		scrollTop: $("#holder_1").offset().top},
		'slow');
});

$(".scroll_0").click(function() {
	$(".percent_50").toggleClass("hidden");
	$('html,body').animate({
		scrollLeft: $(".percent_50").offset().left,
		scrollTop: $("#holder_1").offset().top },
		'slow');

});

$(".scroll_1").click(function() {
	$(".percent_75").toggleClass("hidden");
	$('html,body').animate({
		scrollLeft: $(".percent_75").offset().left,
		scrollTop: $("#holder_1").offset().top },
		'slow');
});

$(".scroll_2").click(function() {
	$(".percent_50_2").toggleClass("hidden");
	$('html,body').animate({
		scrollLeft: $(".percent_50_2").offset().left,
		scrollTop: $("#holder_1").offset().top },
		'slow');
});

$(".scroll_3").click(function() {
	$(".percent_75_2").toggleClass("hidden");
	$('html,body').animate({
		scrollLeft: $(".percent_75_2").offset().left,
		scrollTop: $("#holder_1").offset().top },
		'slow');
});

let submit_employer = () => {
	let employer_company_name = $("#employer_company_name").val();
	let employer_country_tags = $("#employer_country_tags").val();
	let employer_city = $("#employer_city").val();
	let employer_company_type = $("#employer_company_type").val();
	let employer_company_size = $("#employer_company_size").val();
	let employer_company_slogan = $("#employer_company_slogan").val();
	let employer_company_website = $("#employer_company_website").val();
	let image_url = $("#inputGroupFile2").val();

	if(employer_company_name.length == 0 || employer_country_tags.length == 0 || employer_city.length == 0 || employer_company_type.length == 0 || employer_company_size.length == 0 || employer_company_slogan.length == 0 || employer_company_website.length == 0 || image_url.length == 0){
		alert("Please fill out all the input fields!");
		return;
	}

	let str = "company_name=" + employer_company_name + "&country=" + employer_country_tags + "&city=" + employer_city + "&company_type=" + employer_company_type + "&company_size=" + employer_company_size + "&company_slogan=" + employer_company_slogan + "&company_website=" + employer_company_website + "&image_url=" + image_url;

	ajaxPost("backend/signup_employer.php", str, function(results) {
		if(results != "success") {
			console.log(results);
			if(results.trim() == "image does not exist"){
				alert("The image url you provided is not valid. You can copy the url of an image by simply right clicking on it and choose 'Copy Image Address. A good example will be 'https://placekitten.com/200/300'");
			}
			else {
				alert("Error occurred when creating user.");	
			}
		}
		else {
			window.location.href = "post_job.php";
		}
	});

};


// do some prefill for the data that is not important yet.
function testData() {
	$("#employee_country").val("China");
	$("#city_tags").val("Shanghai");
	$("#employee_preferredWorkingCity").val("San Diego");
	$("#country_tags_2").val("China");
	$("#employee_targeted_career").val("software Engineer");
	$("#employee_from_dollar").val("10000");
	$("#employee_to_dollar").val("200000");
	$("#inputGroupFile").val("https://robohash.org/1?set=set2&size=180x180");

	
	$("#employer_company_type").val("Technology");
	$("#employer_company_size").val("100");
	$("#employer_company_slogan").val("NEVER GIVE UP!");
	$("#inputGroupFile2").val("https://robohash.org/2?set=set2&size=180x180");
}

testData();


let submit_employee = () => {
	let firstName = $("#employee_firstName").val();
	let lastName = $("#employee_lastName").val();
	let gender = $("#employee_gender").val();
	let country = $("#employee_country").val();
	let city = $("#city_tags").val();
	let preferredWorkingCity = $("#employee_preferredWorkingCity").val();
	let country_of_citizenship = $("#country_tags_2").val();
	let target_career = $("#employee_targeted_career").val();
	let expectedSalaryFrom = $("#employee_from_dollar").val();
	let expectedSalaryTo = $("#employee_to_dollar").val();
	let image_url = $("#inputGroupFile").val();

	if(firstName.length == 0 || lastName.length == 0 || gender.length == 0 || country.length == 0 || city.length == 0 || preferredWorkingCity.length == 0 || country_of_citizenship.length == 0 || target_career.length == 0 || expectedSalaryFrom.length == 0 || expectedSalaryTo.length == 0 || image_url.length == 0){
		alert("Please fill out all the input fields!");
		return;
	}

	let str = "firstName=" + firstName + "&lastName=" + lastName + "&gender=" + gender + "&country=" + country + "&city=" + city + "&perferredWorkingCity=" + preferredWorkingCity + "&country_of_citizenship=" + country_of_citizenship + "&target_career=" + target_career + "&expectedSalaryFrom=" + expectedSalaryFrom + "&expectedSalaryTo=" + expectedSalaryTo + "&image_url=" + image_url; 

	ajaxPost("backend/signup_employee.php", str, function(results) {
		if(results != "success") {
			console.log(results);
			if(results.trim() == "image does not exist"){
				alert("The image url you provided is not valid. You can copy the url of an image by simply right clicking on it and choose 'Copy Image Address. A good example will be 'https://placekitten.com/200/300'. You probably want to submit a photo with .png format!!!!");
			}
			else {
				alert("Error occurred when creating user.");	
			}
			
		}
		else {
			window.location.href = "job_search.php";
		}
	});


}


function ajaxPost(endpointUrl, postData, returnFunction){
	var xhr = new XMLHttpRequest();
	xhr.open('POST', endpointUrl, true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhr.onreadystatechange = function(){
		if (xhr.readyState == XMLHttpRequest.DONE) {
			if (xhr.status == 200) {
				returnFunction( xhr.responseText );
			} else {
				alert('AJAX Error.');
				console.log(xhr.status);
			}
		}
	}
	xhr.send(postData);
};



</script>
</body>
</html>


<!-- https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=789ux00u0yxc0p&redirect_uri=https://www.ifun.tv/&scope=r_liteprofile%20r_emailaddress%20w_member_social -->