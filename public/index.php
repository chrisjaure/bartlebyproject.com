<?php
	$count = 0;
	try
	{
		$db = new PDO('sqlite:../db/bartleby.sqlite3');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$count = $db->query('SELECT COUNT(id) FROM sigs')->fetchColumn(0);
	}
	catch(Exception $e) {
	}
?>
<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; minimum-scale=1.0; user-scalable=0;" />
	<title>The Bartleby Project</title>
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
	<link type="text/css" rel="stylesheet" href="/fonts/belligerent/stylesheet.css" />
	<link type="text/css" rel="stylesheet" href="/style.css?v2" />
	<link type="text/css" rel="stylesheet" media="only screen and (max-device-width: 480px)" href="/iphone.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script type="text/javascript" src="/script.js"></script>
</head>
<body>
	<div id="header">
		<div class="content">
			<p id="first"><span id="number"><?php echo $count; ?></span> of us</p>
			<p>would prefer not to take your tests.</p>
			<div id="last">
				<button id="sign">+ Count me in!</button>
			</div>
		</div>
	</div>
	<div id="main">
		<div class="content">
			<h1>Join The Bartleby Project</h1>
			<p>"The Bartleby Project begins by inviting 60,000,000 American students, one by one, to peacefully refuse to take standardized tests or to participate in any preparation for these tests; it asks them to act because adults chained to institutions and corporations are unable to; because these tests pervert education, are disgracefully inaccurate, impose brutal stresses without reason, and actively encourage a class system which is poisoning the future of the nation." Read John Taylor Gatto's <a href="gatto.html">full statement on the Bartleby Project</a> (it's long).</p>
			
			<h2>There is Hope</h2>
			<p>
				<a href="https://twitter.com/search?q=unschooling">Unschooling on Twitter</a>,
				<a href="http://americaviaerica.blogspot.com/2010/07/coxsackie-athens-valedictorian-speech.html">Coxsackie-Athens Valedictorian Speech 2010</a>,
				<a href="http://www.ted.com/talks/lang/eng/charles_leadbeater_on_education.html">Charles Leadbeater: Education innovation in the slums</a>,
				<a href="http://www.naturalchild.org/articles/learning.html">The Natural Child Project</a>,
				<a href="http://www.ted.com/talks/lang/eng/gever_tulley_s_tinkering_school_in_action.html">Gever Tulley teaches life lessons through tinkering</a>,
				<a href="http://www.geniusinchildren.org/">The Genius in Children</a>
			</p>
			
			<h2>Your Story</h2>
			<p>
				If you've peacefully refused to take standardized testing, please share your story.
				<strong style="font-size:0.9em;">Please reserve this space for parents and students who want to share their experiences participating in the Bartleby Project. Off-topic comments will be removed.</strong>
			</p>
			<div id="disqus_thread"></div>
			<script type="text/javascript">
				/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
				var disqus_shortname = 'thebartlebyproject'; // required: replace example with your forum shortname

				// The following are highly recommended additional parameters. Remove the slashes in front to use.
				var disqus_identifier = 'index';
				var disqus_url = 'http://bartlebyproject.com/';

				/* * * DON'T EDIT BELOW THIS LINE * * */
				(function() {
					var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
					dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
					(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
				})();
			</script>
			<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
			
			<h2>Stay In Touch</h2>
			<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fbartlebyproject.com%2F&amp;layout=standard&amp;show_faces=false&amp;width=300&amp;action=like&amp;font=verdana&amp;colorscheme=light&amp;height=35" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:35px;" allowTransparency="true"></iframe>
			<p>Follow <a href="http://twitter.com/projectbartleby">@ProjectBartleby</a> on Twitter or get updates on the <a href="http://www.facebook.com/pages/The-Bartleby-Project/140903059271208">Bartleby Project Facebook page</a>.</p>
			<p>Email: <a href="mailto:chris@bartlebyproject.com">chris@bartlebyproject.com</a></p>
		</div>
	</div>
	
	<div id="sign-form-wrapper">
		<form id="sign-form">
			<div id="error"></div>
			<label for="email">Email Address (won't be shared)</label>
			<input type="text" name="email" id="email" autocapitalize="off" />
			<button type="submit">Submit</button><span id="loading">Loading...</span>
			<span id="cancel">Cancel</span>
		</form>
		<div id="overlay"></div>
	</div>
</body>
</html>
