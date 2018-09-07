<?PHP

/*//Check POST Keys & Values
print_r(array_keys($_POST));
echo "<br />";
print_r(array_Values($_POST));
echo "<br />";
print_r(array_keys($_GET));
echo "<br />";
print_r(array_Values($_GET));
////////////////////////////////// Get Browser Agent
*/



////////////////////////////////// endsWith() & startsWith() functions ////////////////////////////


function startsWith($haystack, $needle)
{
    return strncmp($haystack, $needle, strlen($needle)) === 0;
}

function endsWith($haystack, $needle)
{
    return $needle === '' || substr_compare($haystack, $needle, -strlen($needle)) === 0;
}


//////////////////////////////  PHPMailer  Start //////////////////////////////////////////////////

if (isSet($_POST['activateMail'])){
    $sendisSet = $_POST['activateMail'];
}

if (isSet($sendisSet)){
$From = $_POST['email']; 
$Name = $_POST['fname'].' '.$_POST['lname'];
$Message = $_POST['comment'];

$To = 'newbrunslaypr@newbrunswickdistlay.org';

require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->smtpConnect([
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    ]
]);
$mail->Host = 'mail.newbrunswickdistlay.org;127.0.0.1';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'Newbrunslaypr@newbrunswickdistlay.org';                 // SMTP username
$mail->Password = 'nbdlS3cr3t!';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                    // TCP port to connect to

$mail->setFrom($From, $Name);
$mail->addAddress($To, 'New Brunswick District Lay Public Relations Director');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = "New!! Comment by $Name from NewBrunswickDistrictLay.Org's Contact Page";
$mail->Body    =  $Message;  // 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = $Message;  //'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo '<script> alert("Message Could Not Be Sent\n'. $mail->ErrorInfo.'"); </script>';
    //    echo '<script>window.location="http://workspace.com?menuOption=Contact Us";</script>';
    //header('Location: http://workspace.com?menuOption=Contact Us');
} else {
    echo '<script> alert("Message has been sent"); </script>';
    //    header('Location: http://workspace.com?menuOption=Contact Us');
}
}


///////////////////////////////////////////  PHPMailer End /////////////////////////////////////

Class conn {
/*
	This file creates a new MySQL connection using the PDO class.
	The login details are taken from config.php.
*/

  Private $usr = "root";
  Private $pwd = "rootpw";
  Private $db = "uls";
  Private $host = "localhost";

  function __construct(){
    try {
	$db = new PDO(
		"mysql:host=$host;dbname=$db;",
		$usr,
		$pwd
	);
	
    $db->query("SET NAMES 'utf8'");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
	error_log($e->getMessage());
	die("Somethings fucked up with MySql!!!". "   " . $e->getMessage());
    }
  }

//echo "connection made\n ";

}

Class user {

  Public $fname;
  Public $lname;
  Public $email; 
  Public $uname; 

  function create($u,$p){
    $st = $db->prepare("SELECT count(*) from uzers where email='$email' and uzer='$uname'");
    $st->execute();
    $alreadyUsed = $st->fetchColumn();
    if ($alreadyUsed == 1){
      return 'Username already exists';
    }else{
      $sta = $db->prepare("INSERT into uzers(first, last, email, uzer, reg_date), values($fname, $lname, $email, $uname, now())");
      $sta->execute();
      $result = $sta->fetchColumn();
      if ($result == 1){
	return $uname;
      }else{
	return 'ERROR';
      }
    }
  }
}

$Home = '<div><table class="wsite-multicol-table">
		<tbody class="wsite-multicol-tbody">
			<tr class="wsite-multicol-tr">
				<td class="wsite-multicol-col" style="width:50%; padding:0 15px;">
					
						

<h2 style="text-align:left;"><font color="#3366ff" size="5"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome</strong></font><br /><strong><font size="5"><font color="#3366ff">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; from the<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;New Brunswick District&nbsp;Lay<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Organization!</font></font><br /><font color="#3366ff"><font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><br /><em><font size="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"Informed - Included - Involved"</font></em></font></strong><br /><br /></h2>
<span class="imgPusher" style="float:right;height:0px"></span><span style="position:relative;float:right;z-index:1;;clear:right;margin-top:0px;*margin-top:0px"><a><img class="wsite-image galleryImageBorder" src="/images/Andrea-Felder.jpg" style="margin-top: 5px; margin-bottom: 50px; margin-left: 100px; margin-right: 100px; border-width:1px;padding:3px;" alt="Picture" /></a><div style="display: block; font-size: 90%; margin-top: -50px; margin-bottom: 50px; text-align: center;">      Sis. Andrea B. Felder,
                President

               </div></span>
<div class="paragraph" style="text-align:left;display:block;"><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></div>
<hr style="clear:both;visibility:hidden;width:100%;"></hr>


					
				</td>				<td class="wsite-multicol-col" style="width:50%; padding:0 15px;">
					
						

<div><div class="wsite-image wsite-image-border-thin " style="padding-top:10px;padding-bottom:10px;margin-left:0px;margin-right:10px;text-align:right">
<a download="NBDL Flyer.jpg" href="/images/nb_district_lay_newsletter_-_december_2015_-_final_img_114.jpg" title="New Brunswick District Lay Flyer">
<img src="/images/9496382.jpg" alt="Picture" style="width:auto;max-width:100%" />
</a>
<div style="display:block;font-size:90%"></div>
</div></div>


					
				</td>			</tr>
		</tbody>
	</table></div>';

$HomeOld = '<div class="paragraph" style="display:block;"><img src="/files/3388437.jpg " alt="Sis Jacqueline Davis (Jacqui)" height="240" width="200" align="left" style="display:inline-block;border:5px double black;"/><a download="NBDL Flyer.jpg" href="/images/nb_district_lay_newsletter_-_december_2015_-_final_img_114.jpg" title="New Brunswick District Lay Flyer"> <img src="/files/7264467.jpg " alt="Flyer" height="340" width="250" align="right" style="display:inline-block;border:5px double black;"/></a><font color="#3366ff"><strong><font size="2">Welcome from the New Brunswick District Lay Organization!</font><br /><br /><font size="2"><span></span> </font><font style="FONT-SIZE: small"><em>"Informed - Included - Involved"<br /></em></font></strong><br /><span></span><strong>As President of the New Brunswick District Lay, my vision for the District is to provide accurate and timely information, to encourage participation in every aspect of the Lay, to identify and explore the gifts and talents that are apparent in the district, and to get&nbsp;all laity involved in Kingdom Building.&nbsp; <br /><br /></strong></font><br /><font color="#3366ff"><strong>We plan to capitalize on the use of technology and other resources to share our story as we continue to build upon our great legacy.<br /><span></span><br /></strong><strong>The district is moving forward, building upon the leadership of past&nbsp;</strong></font><font color="#3366ff"><strong>administrations. &nbsp;as we have presented our District Calendar of Events which was implemented in March 2013. We will publish the calendar bi-monthly to keep you informed of events taking place in the district. We want to encourage support of our brothers and sisters as we continue the work of the A.M.E. Church.<br /><br /><span></span>The calendar is a precursor to our newly revised newsletter, webpage, and Facebook presence.&nbsp; Stay tuned as we move forward with innovative and creative methods to spread the word and expand our reach.<br /><br /><span></span>In keeping with the 1st Episcopal District\'s Theme, "First Things First", and our "Membership to Discipleship" focus, the New Brunswick District strives to be the First and The Finest District in the New Jersey Conference and beyond as we go about our Father\'s business.&nbsp; We are excited about things to come!!!<br /><br /><span></span></strong><strong><em>Matt. 6:33 "But seek ye first the Kingdom of God and his righteousness and all these things shall be <br />added unto you."<br /><span></span><br /></em>May God richly bless you,<br /><br /><span></span>Sis Jacqueline Davis (Jacqui), <br />Your 2013-2014 Servant Leader<br /><br /></strong><br /></font><strong><font color="#3366ff">Thank you!</font><br /></strong></div>';

$District_Lay_Leadership = '<div id="935748115344317921" align="center" style="width: 100%; overflow-y: hidden;" class="wcustomhtml"><p style="font:14pt"><b><i>Rev. Vernard R. Leak - Presiding Elder</i></b></p>
<br/>
<br/>
<p style="font:14pt"><b><i>Sis. Andrea B. Felder - President</i></b></p>
<br/>
<br/>
<p style="font:14pt"><b><i>Sis. Melanie Woods - 1st Vice President</i></b></p>
<br/>
<br/>
<p style="font:14pt"><b><i>Sis. Arlene Sumner - 2nd Vice President</i></b></p>
<br/>
<br/>
<p style="font:14pt"><b><i>Vacant - 3rd Vice President</i></b></p>
<br/>
<br/>
<p style="font:14pt"><b><i>Sis. Valerie Chestnut - Treasurer</i></b></p>
<br/>
<br/>
<p style="font:14pt"><b><i>Sis. Brenda Skinner - Recording Secretary</i></b></p>
<br/>
<br/>
<p style="font:14pt"><b><i>Vacant - Corresponding Secretary</i></b></p>
<br/>
<br/>
<p style="font:14pt"><b><i>Sis. Evelyn Turton - Financial Secretary</i></b></p>
<br/>
<br/>
<p style="font:14pt"><b><i>Sis. Carolyn Massey - Director of Lay Activities</i></b></p>
<br/>
<br/>
<p style="font:14pt"><b><i>Sis. Marian Simmons - Chaplain</i></b></p>
<br/>
<br/>
<p style="font:14pt"><b><i>Mother Melvin S. Wynn - Historiographer</i></b></p>
<br/>
<br/>
<p style="font:14pt"><b><i>Sis. Sharon Carmichael  - Director of Public Relations</i></b></p>
</div>';

$change_me = "text to change";

$Local_Churches = '<div id="local_Churches">
<table border="1" cellpadding="10" bordercolor="#000000" >
<caption><p style="font:29pt"><b><i>New Brunswick District Local Churches </b></i></p></caption>
<br/>
<br/>
<tr>
<th> Church </th>
<th> Pastor </th>
<th> Address </th>
<th> Phone | Email | Website </th>
<th> Lay President </th>
</tr>
<tr>
<td> Allen Chapel (Asbury Park) </td><td>Rev. Edwin Lloyd</td><td> 214 DeWitt Avenue <br/> Asbury Park, NJ 07712 </td><td> 732-774-8730 <br/> <p><u><a href="https://www.facebook.com/pages/Allen-Chapel-AME-Church-Asbury-Park/159237330805662">click->Allen Chapel Asbury Park on facebook</a></u></p> </td><td> Sis. Jackie Atkins </td> </tr><tr>
<td> Bethel (Asbury Park) </td><td> Rev. Dr. Danielle Hunter </td><td> 1001 Cookman Avenue /P.O. Box 815 <br/> Asbury Park, NJ 07712 </td><td> 732-988-6883 <br/> <p><u><a href="mailto:Bethelameasbury@verizon.net">click->Email: Bethelameasbury@verizon.net
<a/></u></p> </td><td>Sis. Mary Jo Blue </td> </tr><tr><td> Bethel (Freehold) </td><td> Rev. Ron Sparks </td><td> 3 Waterworks Road /P.O. Box 541 <br/> Freehold, NJ 07728 </td><td> 732-462-0826 <br/> <a href="https://www.facebook.com/pages/Bethel-A-M-E-Church/120222434660906">click->Bethel Freehold on facebook</a></td><td> Sis. Brenda Skinner </td></tr><tr>
<td> Bethel (Pennington) </td><td> </td><td> 246 S. Main Street <br/> Pennington, NJ 08634 </td><td> 609-737-0922 <br/> <a href="https://www.facebook.com/pages/Bethel-A-M-E-Church/115450798477975">click->Email: Bethel Pennington on facebook<a/> </td><td>Sis. Traci Heading</td> </tr><tr>
<td> Ebenezer (Rahway) </td><td> Rev. Marti Robinson </td><td> 253 Central Avenue /P.O. Box 1081 <br/> Rahway, NJ 07065</td><td> 732-382-0541 <br/> <a href="mailto:ebenezeramechurch65@yahoo.com">click->Email:  ebenezeramechurch65@yahoo.com<a/>
</td><td> Sis. Joan Beauchamp </td> </tr><tr>
<td> Fisk Chapel (Fair Haven) </td><td> Rev. Thomas P. Johnson </td><td> 38 Fisk Street
<br/> Fair Haven, NJ 07704 </td><td> 732-842-9337 <br/> <a href="https://www.facebook.com/pages/Fisk-Chapel-AME-Church/113947155293849">click->Fisk Chapel on facebook</a> </td><td> Sis. Melanie Woods </td> </tr><tr>
</td><td> Heard (Roselle) </td><td> Rev. Stephen A. Green </td><td> 310 East 8th Avenue <br/> Roselle, NJ 07203 </td><td> 908-241-5588 <br/> <a href="mailto:Heard.church@verizon.net">click->Email: Heard.church@yahoo.com<a/>
<a/> <br/> <a href="mailto:heard_layorganization@yahoo.com">click->Email: heard_layorganization@yahoo.com<a/> </td><td> Sis. Arlene Sumner </td> </tr><tr>
<td> Mt. Pisgah (Jersey City) </td><td>Rev. Stanley Hearst II </td><td> 354 Forrest Street <br/> Jersey City, NJ 07304 </td><td> 201-435-3680 <br/> <a href="https://www.facebook.com/pages/Mt-Pisgah-AME-Church-Jersey-City/328639193831401">click->Mt Pisgah JC on facebook</a> <br/> <a href="http://www.mtpisgahjc.org/">click->Website: mtpisgahjc.org </a> </td><td> Sis. Patricia Pate </td> </tr><tr>
<td> Mt. Pisgah (Princeton) </td><td> Rev.Tamoya Buckley-David </td><td> 170 Witherspoon Street <br/> Princeton NJ 08542 </td><td> 609-924-9017 <br/> <a href="https://www.facebook.com/pages/Welcome-to-Mt-Pisgah-AME-Princeton-NJ/103799512987356">click->Mt Pisgah Princeton on facebook</a> </td><td> Sis. Valerie Chestnut </td> </tr><tr>
<td> Mt. Teman (Elizabeth) </td><td> Rev. George Britt </td><td> 106 Madison Avenue <br/> Elizabeth, NJ 07201 </td><td> 908-351-2625 <br/> <a href="mailto:mttemanamechurch@yahoo.com">click->Email: mttemanamechurch@yahoo.com<a/> </td><td> Sis. Barbara Cook </td> </tr><tr>
<td> Mt. Zion (Plainfield) </td><td> </td><td> 630 E. Front Street <br/> Plainfield, NJ 07060 </td><td> 908-753-9411 <br/> <a href="mailto:mzamechurch.plainfieldnj@yahoo.com">click-> Email: mzamechurch.plainfieldnj@yahoo.com</a> </td><td> Bro. J. Frank Johnson </td> </tr><tr>
<td> Mt. Zion (New Brunswick) </td><td> Rev. W. Golden Carmon </td><td> 39 Hildebrand Way (Morris Ave.) <br/>      New Brunswick, NJ 08901 </td><td> 732-249-8476 <br/> <a href="https://www.facebook.com/mountzionamenb">click->Mt Zion NB on facebook</a> <br/> <a href="http://www.mountzioname.org/">click->Website: mountzioname.org</a> </td><td> Sis. Evelyn Turton </td> </tr><tr>
<td> Mt. Zion (Princeton) </td><td> </td><td> 77 Old Road <br/> Princeton, NJ 08540 </td><td> 732-297-5153 <br/> <a href="https://www.facebook.com/pages/Mt-Zion-A-M-E-Church/120866847929961">click->Mt Zion Princeton on facebook</a></td><td> Bro. Raymond Burnett </td> </tr><tr>
<td> North Stelton (Piscataway) </td><td> Revs. Dr. Eric R. Billips & Rev. Dr. Myra T. Billips </td><td> 123 Craig Avenue <br/> Piscataway, NJ 08854 </td><td> 732-287-5184 <br/> <a href="https://www.facebook.com/pages/North-Stelton-A-M-E-Church/111473298892409">click->North Stelton on facebook</a> <br/> <a href="http://northsteltoname.org/">click->Website: northsteltoname.org</a> </td><td>Sis. Jacqui Davis </td> </tr><tr>
<td> Quinn Chapel (Atlantic Highlands) </td><td> Rev. Dr. Natalie Mitchem </td><td> 109 Prospect Avenue <br/> Atlantic Highlands, NJ 07716 </td><td> 732-291-1078 <br/> <a href="mailto:quinnchapelamec@aol.com">click->Email: quinnchapelamec@aol.com</a> <br/> <a href="https://www.facebook.com/pages/Quinn-Chapel-Ame-Church/116116235084886">click->Quinn Chapel on facebook</a> </td><td>Sis. Georgette Thomas </td> </tr><tr>
<td> St. James (Hightstown) </td><td> Rev. Stephen Bryant </td><td> 413 Summit Street <br/> Hightstown, NJ 08520 </td><td> 609-448-7855 <br/> <a href="http://stjamesamehightstown.com/">click->Website: stjamesamehightstown.com</a> </td><td> Sis Virginia Muse </td> </tr><tr>
<td> St. James (Manalapan) </td><td>  </td><td> 232 Smithburg Rd. <br/> Manalapan, NJ 07726 </td><td> 732-446-5797 <br/> <a href="mailto:stjamesmanalapan@yahoo.com">click->Email:stjamesmanalapan@yahoo.com</a> </td><td>  </td> </tr><tr>
<td> St. Mark (Cranford) </td><td> Rev. Wilfred D. Lewis </td><td> 34 High Street <br/> Cranford, NJ 07016 </td><td> 908-276-3449 <br/>  </td><td> Sis. Patricia Carter </td> </tr><tr>
<td> St. Paul (South Bound Brook) </td><td> Rev. Ronald Ray </td><td> 137 W. Warren St. <br/> South Bound Brook, NJ 08880 </td><td> 732-469-0060 <br/> <a href="https://www.facebook.com/pages/St-Paul-A-M-E-Church/126551277400751">click->St. Paul Bound Brook on facebook<a/> </td><td> Sis. Ellen Miller </td> </tr><tr>
<td> Trinity (Long Branch) </td><td> Rev. Leslie Devereaux </td><td> 64 Liberty Street <br/> Long Branch, NJ 07740 </td><td> 732-222-6598 <br/> <a href="mailto:trinityameclb@gmail.com">click->Email: trinityameclb@gmail.com</a> <br/> <a href="https://www.facebook.com/pages/Trinity-A-M-E-Church/449294735133">click->Trinity Long Branch on facebook </a></td><td> </td>
</tr> </tr><tr>
</table>
</div>';


/*
<div style="padding-top:10px;padding-bottom:10px;margin-left:0;margin-right:0;text-align:center">
<a>
<embed src="file_name.pdf" width="800px" height="2100px" />
</a>
</div>

<div style="padding-top:10px;padding-bottom:10px;margin-left:0;margin-right:0;text-align:center">
<a>
<img src="/images/Shades of Blue 2017-4.jpg" alt="Shades of Blue - Gospel Jazz Brunch" style="width:auto;max-width:85%" />
</a>
</div>
 */



$Events = '<div style="padding-top:10px;padding-bottom:10px;margin-left:0;margin-right:0;text-align:center">
<a>
<img src="/images/new Lay Organization.jpg" alt="New AME Logo" style="width:auto;max-width:100%" />
</a>
</div>

<div style="padding-top:10px;padding-bottom:10px;margin-left:0;margin-right:0;text-align:center">
<a>
<img src="/files/7572349.jpg" alt="FDR Recruitment Flyer Final" style="width:auto;max-width:100%" />
</a>
<div style="display:block;font-size:90%">The Charleston 9
</div>
</div>

<div class="wsite-image wsite-image-border-thin " style="padding-top:10px;padding-bottom:10px;margin-left:10px;margin-right:10px;text-align:center">
<a>
<img src="/files/9096475.jpg?1391740816" alt="Picture" style="width:auto;max-width:100%" />
</a>
</div>

<div class="wsite-image wsite-image-border-none " style="padding-top:10px;padding-bottom:10px;margin-left:10px;margin-right:10px;text-align:center">
<a>
<img src="/files/8548377.jpg?1388429482" alt="Picture" style="width:auto;max-width:100%" />
</a>
<div style="display:block;font-size:90%"></div>
</div>';

$newsLetter = '<div id="935748115344317921" align="center" style="height: 100%; width: 100%;" class="wcustomhtml">
<br/>
<p style="font:14pt"><b><i>Rev. Vernard R. Leak - Presiding Elder</i></b></p>
<br/>
<br/>
<p style="font:14pt"><b><i>Sis. Jacqueline Davis - President</i></b></p>
<br/>
<br/>
<p style="font:14pt"><b><i>Sis. Andrea Felder- 1st Vice President</i></b></p>
<br/>
<br/>
<p style="font:14pt"><b><i>Sis. Melanie Woods - 2nd Vice President</i></b></p>
<br/>
<br/>
<p style="font:14pt"><b><i>Sis. Arlene Sumner - 3rd Vice President</i></b></p>
<br/>
<br/>
<p style="font:14pt"><b><i>Sis. Valerie Chestnut - Treasurer</i></b></p>
<br/>
<br/>
<p style="font:14pt"><b><i>Sis. Julie Dennis - Secretary (RS/CS)</i></b></p>
<br/>
<br/>
<p style="font:14pt"><b><i>Sis. Jacqueline Sibblies - Financial Secretary</i></b></p>
<br/>
<br/>
<p style="font:14pt"><b><i>Sis. Elizabeth Clark - Director of Lay Activities</i></b></p>
<br/>
<br/>
<p style="font:14pt"><b><i>Sis. Marian Simmons - Chaplain</i></b></p>
<br/>
<br/>
<p style="font:14pt"><b><i>Mother Melvin S. Wynn - Historiographer</i></b></p>
<br/>
<br/>
<p style="font:14pt"><b><i>Sis. Sharon Carmichael  - Director of Public Relations</i></b></p>
<br/>
<br/>
</div>
';

$calHeader = '<img src="/files/header_images/3829.jpg" alt="Mountain View" style="width:50px;height:50px;"><b> NEW BRUNSWICK DISTRICT LAY CHURCHES SPECIAL EVENTS</b> <img src="/images/nb_district_lay_newsletter_-_december_2015_-_final_img_110.png" alt="Mountain View" style="width:50px;height:50px;background:transparent;"><br/>';

$Resources =  '<div id="wsite-content" class="wsite-elements wsite-not-footer">
<h2 class="wsite-content-title" style="text-align:center;"><font size="5"><em>Links</em></font></h2>

<br/> <div><div id="911632701453365274" align="center" style="width: 100%; overflow-y: hidden;" class="wcustomhtml"><p style="font:14pt"><b><i><u><a href="https://www.facebook.com/newbrunswickdistrictlay">New Brunswick District Lay on Facebook </a> 
<br/> 
<br/> 
<br/> 
<a href="http://www.connectionallay-amec.org">Connectional Lay Organization</a> 
<br/> 
<br/> 
<br/> 
<a href="http://www.connectionallay-amec.org/docs/AMECLBylaws.pdf">Constitution & Bylaws of Connectional Lay Organization</a>  
<br/> 
<br/>
<br/> 
<a href="http://www.firstdistrictame.org">First Episcopal District AME Church</a>
<br/> 
<br/> 
<br/>
<a href="http://www.ame-church.com">AME Church</a> 
<br/> 
<br/> 
<br/>
<a href="http://www.thechristianrecorder.com">The Christian Recorder</a> 
<br/>
<br/>
<br/> 
<a href="http://www.biblegateway.com">Bible Gateway</a></b></i></u></p> 
<br/> </div>
</div></div>';


$Contact_Us = '<div id="contactUs" align="left">
<form action="'.$_SERVER['PHP_SELF'].'?menuOption=Contact Us"; method="post" accept-charset="UTF-8">
<input type="hidden" name="menuOption" value="Contact Us"/>
<font size="6" color="#0905a4" > <b> Leave a Message </b></font><br/><br/>
<b>Name</b> <font id="name*" color="red" size="4"> &ast;</font><br/>
<div>
<div style="float:left">
<input type="text" name="fname" maxlength="50" size="30"/><br/>
first
</div>
<div style="float:left">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="lname" maxlength="50" size="30"/><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;last
</div>
</div><br/><br/><br/>
<b>Email</b> <font id="email*" color="red" size="4" > &ast;</font><br/>
<input type="text" name="email" maxlength="50" size="50"/><br/>
<br/>
<b>Comment</b> <font id="comment*" color="red" size="4" > &ast;</font><br/>
<textarea name="comment" cols="50" rows="5"></textarea><br/><br/>
<input type="submit" name="activateMail" value="send" style="background-color:black;color:white;">
</form>
<br>
</div>

<div id="983368284902217570"  style="width: 100%; overflow-y: hidden;" class="wcustomhtml"><ul style="list-style:none">
   <li><b>Sharon Carmichael</b><br/>

<i>New Brunswick District Lay Public Relations Director</i><br/></li>
<br/>
   <li><b>Andrea Felder</b><br/>

<i>New Brunswick District Lay President</i><br/></li>
<br/>
   <li><b>Webmaster</b><br/>

<i>Tech Support</i><br/>

webmaster@newbrunswickdistlay.org</li>
<br/>
 
</ul>
</div>';



?>