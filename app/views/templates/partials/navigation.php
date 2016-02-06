{% if auth %}
	<div>logged in as {{auth.getFullNameOrUsername}}
	<img src="{{ auth.getAvatarUrl({size: 20}) }}" alt="Your avatar">
	</div>
{% endif %}
<ul>
	<li> <a href="{{ urlFor('home') }}">Home</a></li>
	{% if auth %}
	<li> <a href="{{ urlFor('logout') }}">Log out</a></li>
	<li><a href="{{ urlFor('user.profile', {username: auth.username}) }}">Your profile</a></li>
	{% else %}
	<li> <a href="{{ urlFor('register') }}">Register</a></li>
	<li> <a href="{{ urlFor('login') }}">Login</a></li>
	{% endif %}
	<li><a href="{{ urlFor('user.all') }}">All users</a></li>
</ul>