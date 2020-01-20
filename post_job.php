<?php
session_start();
if (!isset($_SESSION["isEmployer"]) || $_SESSION["isEmployer"] == false) {
	header("Location: job_search.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Post Job</title>

	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- favicon -->
	<link rel="icon" type="image/png" href="assets/favicon.ico" />

	<!-- post_job.css -->
	<link rel="stylesheet" type="text/css" href="css/post_job.css">

	<!-- animsition.css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/css/animsition.css">
	<!-- animsition.js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/js/animsition.min.js"></script>

	<!-- loading font -->
	<?php require 'components/fonts.php'; ?>

	<!-- font css -->
	<link rel="stylesheet" href="css/fonts.css" />

	<!-- nav.css -->
	<link rel="stylesheet" href="css/nav.css" />
	
	<!-- for autocomplete -->
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="http://resources/demos/style.css">
	<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body class='animsition'>

	<div class="collapse" id="navbarToggleExternalContent">
		<ul class="navbar-nav font-Comfortaa" style="font-size: 22px;">
			<?php if (!isset($_SESSION["user_id"])) : ?>
				<li class="nav-item ">
					<a class="nav-link text-muted animsition-link " href="index.php">Home</a>
				</li>
			<?php endif; ?>
			<li class="nav-item ">
				<a class="nav-link text-muted animsition-link " href="job_search.php">Search</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link text-muted animsition-link " href="chatroom.php">Chat</a>
			</li>
			<?php
			if (isset($_SESSION["isEmployer"]) && $_SESSION["isEmployer"] == true) {
				echo '<li class="nav-item ">
				<a class="nav-link animsition-link " href="post_job.php">Post Job</a>
				</li>';
			}
			if (isset($_SESSION["user_id"])) {
				echo '<li class="nav-item ">
				<a class="nav-link text-muted animsition-link " href="logout.php">Sign out</a>
				</li>';
			}
			?>

		</ul>
	</div>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="collapse navbar-collapse w-100 order-1 order-lg-0" id="navbarNav">
			<ul class="navbar-nav font-Comfortaa" style="font-size: 22px;">
				<?php if (!isset($_SESSION["user_id"])) : ?>
					<li class="nav-item ">
						<a class="nav-link animsition-link " href="index.php" style="margin-left: 5%;">Home</a>
					</li>
				<?php endif; ?>
				<li class="nav-item">
					<a class="nav-link animsition-link " href="job_search.php">Search</a>
				</li>
				<li class="nav-item ">
					<a class="nav-link animsition-link " href="chatroom.php">Chat</a>
				</li>
				<?php
				if (isset($_SESSION["isEmployer"]) && $_SESSION["isEmployer"] == true) {
					echo '<li class="nav-item active">
					<a class="nav-link animsition-link " href="post_job.php">Post Job</a>
					</li>';
				}
				if (isset($_SESSION["user_id"])) {

					echo '<li class="nav-item ">
					<a class="nav-link animsition-link " href="logout.php" style="position: absolute;right: 0;">Sign out</a>
					</li>';
				}
				?>
			</ul>
		</div>
		<div class="d-flex w-100 order-0">
			<div class="w-100">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
			<a class="navbar-brand text-center w-100 font-Monoton animsition-link " href="index.php" style="font-size: 40px; letter-spacing: 3px;">JoinMe&nbsp;&nbsp;&nbsp; <img src="assets/JoinMe.png" class="navbar-brand text-center" class="d-inline-block align-top" alt="" width="45" height="45"></a>
			<span class="w-100"></span>
		</div>
		<span class="w-100"></span>
	</nav>

	<div class="container-fluid outermost">
		<div class="container">
			<form method="POST" action="backend/post_job_backend.php">
				<h1 style="text-align: center;  font-family: 'Baskervville', serif;">Tell Me About Your Job</h1>
				<div class="form-row ">
					<div class="col-6 form-group">
						<label for="job_title">Job Title</label>
						<input type="text" class="form-control form-control-lg" name="job_title" id="job_title" required>
					</div>
					<div class="col-6 form-group">
						<label for="job_department">Job Department</label>
						<input type="text" class="form-control form-control-lg" name="job_department" id="job_department" required>
					</div>
				</div>
				<div class='form-row'>
					<div class="col-4 form-group">
						<label for="city">City</label>
						<input type="text" class="form-control form-control-lg city_tags" name="city" id="city" required>
					</div>
					<div class="col-4 form-group">
						<label for="state">State</label>
						<input type="text" class="form-control form-control-lg" name="state" id="state" required>
					</div>
					<div class="col-4 form-group ">
						<label for="country">Country</label>
						<input type="text" class="form-control form-control-lg country_tags" name="country" id="country" required>
					</div>
				</div>
				<div class='form-row'>
					<div class="col-12 form-group ">
						<label for="job_description">Job Description</label>
						<textarea class="form-control form-control-lg" id="job_description" name="job_description" rows="3" aria-describedby="job_description_word_limit" required></textarea>
						<small id="job_description_word_limit" class="form-text text-muted">
							You can not have more than 200 words in job description.
						</small>
					</div>
				</div>
				<div class="form-row" id="responsibilities_div">
					<div class="col-12" style="margin-bottom: 8px;">What are the major responsibilities of the candidates <button class="btn btn-primary add" onclick="add_responsibility()">Add</button></div>
					<div class="col-4 form-group input-group input-group-lg">
						<div class="input-group-prepend">
							<span class="input-group-text">1.</span>
						</div>
						<input type="text" class="form-control form-control-lg" name="responsibilities[]">
					</div>
					<div class="col-4 form-group input-group input-group-lg">
						<div class="input-group-prepend">
							<span class="input-group-text">2.</span>
						</div>
						<input type="text" class="form-control form-control-lg" name="responsibilities[]">
					</div>
					<div class="col-4 form-group input-group input-group-lg">
						<div class="input-group-prepend">
							<span class="input-group-text">3.</span>
						</div>
						<input type="text" class="form-control form-control-lg" name="responsibilities[]">
					</div>
				</div>
				<div class="form-row" id="requirements_div">
					<div class="col-12" style="margin-bottom: 8px;">What skills/characteristics do you require from the candidates <button class="btn btn-primary add" onclick="add_requirement()">Add</button></div>
					<div class="col-4 form-group input-group input-group-lg">
						<div class="input-group-prepend">
							<span class="input-group-text">1.</span>
						</div>
						<input type="text" class="form-control form-control-lg" name="requirements[]">
					</div>
					<div class="col-4 form-group input-group input-group-lg">
						<div class="input-group-prepend">
							<span class="input-group-text">2.</span>
						</div>
						<input type="text" class="form-control form-control-lg" name="requirements[]">
					</div>
					<div class="col-4 form-group input-group input-group-lg">
						<div class="input-group-prepend">
							<span class="input-group-text">3.</span>
						</div>
						<input type="text" class="form-control form-control-lg" name="requirements[]">
					</div>
				</div>
				<div class='form-row'>
					<div class="col-12 form-group ">
						<label for="company_description">Company Description</label>
						<textarea class="form-control form-control-lg" id="company_description" rows="3" aria-describedby="company_description_word_limit" required name="company_description"></textarea>
						<small id="company_description_word_limit" class="form-text text-muted">
							You can not have more than 200 words in company description.
						</small>
					</div>
				</div>
				<div class="form-row">
					<div class="col-12 form-group">
						<label for="job_apply_url">Application Website</label>
						<input type="text" class="form-control form-control-lg" name="application_website" required>
					</div>
				</div>
				<div id="post_div"><button class="btn btn-lg btn-primary" id="post_button" type="submit">Post Now!</button></div>


			</form>
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
				inClass: 'fade-in-down',
				outClass: 'fade-out-down',
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
				browser: ['animation-duration', '-webkit-animation-duration'],
				// "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
				// The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
				overlay: false,
				overlayClass: 'animsition-overlay-slide',
				overlayParentElement: 'body',
				transition: function(url) {
					window.location.href = url;
				}
			});
		});


		$(document).ready(function() {
			$("textarea").on('keyup', function() {
				var words = this.value.match(/\S+/g).length;

				if (words > 200) {
					alert("You Exceeded Word Limit of 200!");
				}
			});
		});


		let add_responsibility = () => {
			let num = $("#responsibilities_div").children().length;
			$("#responsibilities_div").append('<div class="col-4 form-group input-group input-group-lg"><div class="input-group-prepend"> <span class="input-group-text">' + num + '</span> </div> <input type="text" class="form-control form-control-lg" name="responsibilities[]"></div>');
		};

		let add_requirement = () => {
			let num = $("#requirements_div").children().length;
			$("#requirements_div").append('<div class="col-4 form-group input-group input-group-lg"><div class="input-group-prepend"> <span class="input-group-text">' + num + '</span> </div> <input type="text" class="form-control form-control-lg" name="requirements[]"></div>');
		}

		$(function() {
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
			$(".country_tags").autocomplete({
				source: availableTags
			});
		});
		$(function() {
			var city_names = ["Aberdeen", "Abilene", "Akron", "Albany", "Albuquerque", "Alexandria", "Allentown", "Amarillo", "Anaheim", "Anchorage", "Ann Arbor", "Antioch", "Apple Valley", "Appleton", "Arlington", "Arvada", "Asheville", "Athens", "Atlanta", "Atlantic City", "Augusta", "Aurora", "Austin", "Bakersfield", "Baltimore", "Barnstable", "Baton Rouge", "Beaumont", "Bel Air", "Bellevue", "Berkeley", "Bethlehem", "Billings", "Birmingham", "Bloomington", "Boise", "Boise City", "Bonita Springs", "Boston", "Boulder", "Bradenton", "Bremerton", "Bridgeport", "Brighton", "Brownsville", "Bryan", "Buffalo", "Burbank", "Burlington", "Cambridge", "Canton", "Cape Coral", "Carrollton", "Cary", "Cathedral City", "Cedar Rapids", "Champaign", "Chandler", "Charleston", "Charlotte", "Chattanooga", "Chesapeake", "Chicago", "Chula Vista", "Cincinnati", "Clarke County", "Clarksville", "Clearwater", "Cleveland", "College Station", "Colorado Springs", "Columbia", "Columbus", "Concord", "Coral Springs", "Corona", "Corpus Christi", "Costa Mesa", "Dallas", "Daly City", "Danbury", "Davenport", "Davidson County", "Dayton", "Daytona Beach", "Deltona", "Denton", "Denver", "Des Moines", "Detroit", "Downey", "Duluth", "Durham", "El Monte", "El Paso", "Elizabeth", "Elk Grove", "Elkhart", "Erie", "Escondido", "Eugene", "Evansville", "Fairfield", "Fargo", "Fayetteville", "Fitchburg", "Flint", "Fontana", "Fort Collins", "Fort Lauderdale", "Fort Smith", "Fort Walton Beach", "Fort Wayne", "Fort Worth", "Frederick", "Fremont", "Fresno", "Fullerton", "Gainesville", "Garden Grove", "Garland", "Gastonia", "Gilbert", "Glendale", "Grand Prairie", "Grand Rapids", "Grayslake", "Green Bay", "GreenBay", "Greensboro", "Greenville", "Gulfport-Biloxi", "Hagerstown", "Hampton", "Harlingen", "Harrisburg", "Hartford", "Havre de Grace", "Hayward", "Hemet", "Henderson", "Hesperia", "Hialeah", "Hickory", "High Point", "Hollywood", "Honolulu", "Houma", "Houston", "Howell", "Huntington", "Huntington Beach", "Huntsville", "Independence", "Indianapolis", "Inglewood", "Irvine", "Irving", "Jackson", "Jacksonville", "Jefferson", "Jersey City", "Johnson City", "Joliet", "Kailua", "Kalamazoo", "Kaneohe", "Kansas City", "Kennewick", "Kenosha", "Killeen", "Kissimmee", "Knoxville", "Lacey", "Lafayette", "Lake Charles", "Lakeland", "Lakewood", "Lancaster", "Lansing", "Laredo", "Las Cruces", "Las Vegas", "Layton", "Leominster", "Lewisville", "Lexington", "Lincoln", "Little Rock", "Long Beach", "Lorain", "Los Angeles", "Louisville", "Lowell", "Lubbock", "Macon", "Madison", "Manchester", "Marina", "Marysville", "McAllen", "McHenry", "Medford", "Melbourne", "Memphis", "Merced", "Mesa", "Mesquite", "Miami", "Milwaukee", "Minneapolis", "Miramar", "Mission Viejo", "Mobile", "Modesto", "Monroe", "Monterey", "Montgomery", "Moreno Valley", "Murfreesboro", "Murrieta", "Muskegon", "Myrtle Beach", "Naperville", "Naples", "Nashua", "Nashville", "New Bedford", "New Haven", "New London", "New Orleans", "New York", "New York City", "Newark", "Newburgh", "Newport News", "Norfolk", "Normal", "Norman", "North Charleston", "North Las Vegas", "North Port", "Norwalk", "Norwich", "Oakland", "Ocala", "Oceanside", "Odessa", "Ogden", "Oklahoma City", "Olathe", "Olympia", "Omaha", "Ontario", "Orange", "Orem", "Orlando", "Overland Park", "Oxnard", "Palm Bay", "Palm Springs", "Palmdale", "Panama City", "Pasadena", "Paterson", "Pembroke Pines", "Pensacola", "Peoria", "Philadelphia", "Phoenix", "Pittsburgh", "Plano", "Pomona", "Pompano Beach", "Port Arthur", "Port Orange", "Port Saint Lucie", "Port St. Lucie", "Portland", "Portsmouth", "Poughkeepsie", "Providence", "Provo", "Pueblo", "Punta Gorda", "Racine", "Raleigh", "Rancho Cucamonga", "Reading", "Redding", "Reno", "Richland", "Richmond", "Richmond County", "Riverside", "Roanoke", "Rochester", "Rockford", "Roseville", "Round Lake Beach", "Sacramento", "Saginaw", "Saint Louis", "Saint Paul", "Saint Petersburg", "Salem", "Salinas", "Salt Lake City", "San Antonio", "San Bernardino", "San Buenaventura", "San Diego", "San Francisco", "San Jose", "Santa Ana", "Santa Barbara", "Santa Clara", "Santa Clarita", "Santa Cruz", "Santa Maria", "Santa Rosa", "Sarasota", "Savannah", "Scottsdale", "Scranton", "Seaside", "Seattle", "Sebastian", "Shreveport", "Simi Valley", "Sioux City", "Sioux Falls", "South Bend", "South Lyon", "Spartanburg", "Spokane", "Springdale", "Springfield", "St. Louis", "St. Paul", "St. Petersburg", "Stamford", "Sterling Heights", "Stockton", "Sunnyvale", "Syracuse", "Tacoma", "Tallahassee", "Tampa", "Temecula", "Tempe", "Thornton", "Thousand Oaks", "Toledo", "Topeka", "Torrance", "Trenton", "Tucson", "Tulsa", "Tuscaloosa", "Tyler", "Utica", "Vallejo", "Vancouver", "Vero Beach", "Victorville", "Virginia Beach", "Visalia", "Waco", "Warren", "Washington", "Waterbury", "Waterloo", "West Covina", "West Valley City", "Westminster", "Wichita", "Wilmington", "Winston", "Winter Haven", "Worcester", "Yakima", "Yonkers", "York", "Youngstown"];

			$(".city_tags").autocomplete({
				source: city_names
			});
		});
	</script>
</body>

</html>