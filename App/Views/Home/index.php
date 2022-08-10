{% extends "base.html" %}
{% block title %} Home {% endblock %}

{% block body %}
<h1>Welcome</h1>
<p>Hello {{ name }}!</p>
<p>This is your favorite colours :</p>
<ul>
    {% for colour in colours %}
    <li>{{ colour }}</li>
    {% endfor %}
</ul>
{% endblock %}