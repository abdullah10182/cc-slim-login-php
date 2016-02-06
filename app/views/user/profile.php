{% extends 'templates/default.php' %}

{% block title %}{{ user.getFullNameOrUserName }}{% endblock %}

{% block content %}
	<h2>{{ user.username }}</h2>
	<img src="{{ user.getAvatarUrl({size:400}) }}" alt="Profile picture for {{ user.getFullNameOrUserName }}">
	<ul>
		{% if user.getFullName %}<li>Full name:  {{ user.getFullName }} </li> {% endif %}
		<li>Email: {{ user.email }}</li>
	</ul>
{% endblock %}