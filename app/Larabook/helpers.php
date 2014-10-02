<?php

function gravatar_link($email)
{
	$email = md5($email);
	return "http://www.gravatar.com/avatar/{$email}?s=30";
}
