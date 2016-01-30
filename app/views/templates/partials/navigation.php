<ul>
	<li> <a href="{{ urlFor('home') }}">Home</a></li>
	{% if auth %}
		logged in as {{auth.getFullNameOrUsername}}.
	{% else %}
		<li> <a href="{{ urlFor('register') }}">Register</a></li>
		<li> <a href="{{ urlFor('login') }}">Login</a></li>
	{% endif %}
</ul>