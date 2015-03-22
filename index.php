<?php 
//If the form is submitted
if(isset($_POST['submit'])) {

	//Check to make sure that the name field is not empty
	if(trim($_POST['contactname']) == '') {
		$hasError = true;
	} else {
		$name = trim($_POST['contactname']);
	}

	//Check to make sure sure that a valid email address is submitted
	if(trim($_POST['email']) == '')  {
		$hasError = true;
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	//Check to make sure comments were entered
	if(trim($_POST['message']) == '') {
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['message']));
		} else {
			$comments = trim($_POST['message']);
		}
	}

	//If there is no error, send the email
	if(!isset($hasError)) {
		$emailTo = 'aaronmitchellart@gmail.com'; //Put your own email address here
		$body = "Name: $name \n\nEmail: $email \n\nSubject: $subject \n\nComments:\n $comments";
		$headers = 'From: My Site <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}
}

include 'header.php'
?>

<sectiion id="aboutMe" name="aboutMe">
<div class="aboutHeadline">Your one stop shop for all creative services. Let's make something together!</div>
<img class="portrait" src="images/aaron_mitchell.jpg" alt="Aaron Mitchell"/>

<p><span class="highlight">Hello! My name is Aaron Mitchell</span> and I'm a designer living in Portland, ME. I graduated Summa Cum laude from the <span class="highlight">New Hampshire Institute of Art</span> in 2011 with a major in Illustration. While my primary focus was working digitally in the adobe creative suite, I also studied oil painting and have shown my work in several exhibitions.</p>
<p>Since July 2012 I've worked as a web designer for <span class="highlight">Liquid Wireless, a mobile marketing startup owned by Publishers Clearing House.</span> At Liquid Wireless I've tackled many projects including designing Mobile Advertisements and Landing Pages, building a Mobile First Email template, designing a profitable Android App with over 500K downloads and reorganizing the CSS stylesheets for a large dynamic website.</p>

<p>I also work as a <span class="highlight">freelance designer</span> and have worked with a variety of small businesses to help get them the creative resources they need to succeed. A few sample projects include.</p>
<p>
<ul>
<li>Illustrating the mascot for <span class="highlight">Doctor Suds</span>, a Car Wash in North Providence, Rhode Island.</li>
<li>Designing the logo, marketing collateral and building a mobile responsive website for <span class="highlight">Schillaci Guitars</span>, a custom guitar luthier in Harrisburg, Pennsylvania.</li>
<li>Designing the menu for The <span class="highlight">Stone Church</span>, a restaurant and live music venue in Newmarket, New Hampshire.</li> 
<li>Designing the logo and marketing collateral for <span class="highlight">Coastal Farms</span>, a Food Processing and Storage facility in my home town of Belfast, Maine</li>
</ul>
</p>
<p>In what remains of my free time I play guitar in the punk rock band Afghan, and have handled all the design and marketing tasks including branding the band, designing album art, flyers, stickers, social media materials and building a mobile friendly website. <span class="highlight">DIY or Die.</span></p> 

</sectiion>

<section id="galleryNav">
<h2 class="blue">Portfolios</h2>
	<div class="galleryIcon"><a href="design.php"><img src="images/design/Aaron_Mitchell_Lobster_Fest_Shirt_350.jpg" alt=""/>Design</a></div>
	<div class="galleryIcon"><a href="illustration.php"><img src="images/illustration/Aaron_Mitchell_Phish_Poster_350.jpg" alt=""/>Illustration</a></div>
	<div class="galleryIcon"><a href="painting.php"><img src="images/painting/Aaron_Mitchell_Painting_In_Between_350.jpg" alt=""/>Fine Art</a></div>
	<div style="clear: both;"></div>
</section>
<section id="siteNav">
<h2 class="blue">Websites I've Built</h2>
<p class="websiteAside">(Besides this one)</p>
	<div class="siteIcon"><a href="http://www.schillaciguitars.com"><img src="images/Schillaci_Icon.jpg"/>schillaciguitars.com</a></div>
	<div class="siteIcon"><a href="http://www.itsafghan.com"><img src="images/Afghan_Icon.jpg"/>itsafghan.com</a></div>
	<div style="clear: both;"></div>
</section>

<section id="contact">
<h1 class="highlight">Have a project in mind? Let's Talk!</h1>
<div id="contact-wrapper">

<?php if(isset($hasError)) { //If errors are found ?>
		<p class="error">Please check if you've filled all the fields with valid information. Thank you.</p>
	<?php } ?>

	<?php if(isset($emailSent) && $emailSent == true) { //If email is sent ?>
	<div class="messageSuccess">
		<p><strong>Email Successfully Sent!</strong></p>
		<p>Thank you <strong><?php echo $name;?></strong> for the message! I'll be in touch soon.</p>
	</div>
	<?php } ?>
	
	<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>#contact" id="contactform">
		<label for="Name">Name: </label><br />
		<input type="text" name="contactname" id="contactname" class="required"/><br />
		<label for="email">Email: </label><br />
		<input type="text" name="email" id="email" class="required email"/><br />
		<label for="message">Message: </label><br />
		<textarea name="message" id="message" rows="5" cols="50"></textarea><br />
		<input class="submitButton" type="submit" value="Send Message" name="submit" class="required"/>
	</form>
</div>
</section>
	
<?php 
include 'footer.php'?>