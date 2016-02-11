{% extends 'templates/default.php' %}

{% block title %}Recover password{% endblock %}

{% block content %}
	<p>enter your email adrees to start your passwor recovery</p>
	<form action="{{ urlFor('password.recover.post') }}" method="post" autocomplete="off">
		<div>
			<label for="email">email</label>
			<input type="text" name="email" id="email" {% if request.post('email') %} value="{{ request.post('emai') }}" {% endif %}>
			{% if errors.has('email') %}{{ errors.first('email') }} {% endif %}
		</div>
		<div>
			<input type="submit" value="Request reset">
		</div>
		<input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
	</form>
{% endblock %}