{% if flash.global %}
	<div class="global">{{ flash.global }}</div>
{% endif %}

{% if flash.warning %}
	  {% for flash in flash.warning %}
        <li><div style="color:red;" class="warning">{{ flash }}</div></li>
    {% endfor %}
{% endif %}