<h1>Welcome to LIST READ</h1>
<h2>This is the view that shows a single list if a param is passed, or all lists if not.</h2>
@if (isset($tasklist))
	{{Pre::render($tasklist)}}
	<h2>Here are all the incomplete tasks associated with the list.</h2>
	<h3>Each link is to a 'Read' view.</h3>
	<h2>Here are the complete tasks associated with the list.</h2>
	<h3>Each link is to a 'Read' view.</h3>
@endif
