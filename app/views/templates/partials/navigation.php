{% if auth %}
	<h2>logged in as {{auth.getFullNameOrUsername}}.	</h2>
{% endif %}
<ul>
	<li> <a href="{{ urlFor('home') }}">Home</a></li>
	{% if auth %}
	<li> <a href="{{ urlFor('logout') }}">Log out</a></li>
	{% else %}
	<li> <a href="{{ urlFor('register') }}">Register</a></li>
	<li> <a href="{{ urlFor('login') }}">Login</a></li>
	{% endif %}
</ul>