{% extends 'email/templates/default.php' %}

{% block content %}
	You have registered!

	<p>Activate your account with this link: {{ baseUrl }}{{urlFor('activate')}}?email={{ user.email }}&identifier={{ identifier|url_encode }}</p>
{% endblock %}

