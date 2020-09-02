<?php
namespace Brain\Games\Cli;
use function cli\line;
use function cli\promt;
function run()
{
	line('Welcome to the Brain Games!');
	$name = promt('May I have your name ?');
	line("Hello , %s!", $name);
}

