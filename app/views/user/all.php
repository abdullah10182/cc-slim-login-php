{% extends 'templates/default.php' %}

{% block title %}all users{% endblock %}

{% block content %}
	<h2>All users</h2>

	{% if users is empty %}
		<p>No registered users</p>
	{% else %}
		{% for user in users %}
			<div class="user">
				<a href="{{ urlFor('user.profile', {username: user.username}) }}">{{ user.username }}</a>
				{% if user.getFullName %}
					({{ user.getFullName }})
				{% endif %}
				{% if user.isAdmin %}
					<small><strong>admin</strong></small>
				{% endif %}
			</div>
		{% endfor %}
	{% endif %}

{% endblock %}