<?php
/*
	ITTakes2 random quote PHP API
	
	To use: 
		Plaintext Output - http://domain.com/randomQuote.php
		JSON Output - http://domain.com/randomQuote.php?json
	
	JSON Output will return 2 or 3 keys + values,
	"status" => "success",
	"quote" => "(random quote)",
	"info" => "(link to info about the quote @ ittakes2.net (if theres info associated with the quote))"
	
	Plaintext Output will just return the quote, plain text, no hastle or fuss.
	
	https://github.com/ITTakes2
*/

// Add your own quotes here!
$quotes = array(
	array("'Did you know improper sanitization of user input in programming can lead to vulnerabilities?' - ITTakes2", "https://ittakes2.net/knowledge/never-trust-the-client"), // if there's a 2nd value, treat it as the "info" part.
	array("'Open source is a development methodology; free software is a social movement.' - Richard Stallman"),
	array("'Everybody should learn to program a comput	er, because it teaches you how to think.' - Steve Jobs."),
	array("'Whether you want to uncover the secrets of the universe, or you just want to pursue a career in the 21st century, basic computer programming is an essential skill to learn.' - Stephen Hawking"),
);


// No need to edit below here, unless you know what you're doing
$json = false;
if (isset($_GET['json']))
{
	$json = true;
}

$randomQuoteNumber = rand(0, (count($quotes) - 1)); // 'count' returns the amount starting from 1, but arrays in PHP start from 1, the "- 1" just removes this.
$randomQuoteArray = $quotes[$randomQuoteNumber];

$quote = $randomQuoteArray[0];
$info = "";

if ($json)
{
	header("Content-Type: application/json"); // this tells a web browser not to treat the output as HTML, but as JSON
	if (isset($randomQuoteArray[1])) // checking if it has any info in the array
	{
		$info = $randomQuoteArray[1];
	}
	echo(json_encode(array("status" => "success", "quote" => $quote, "info" => $info)));
}
else
{
	header("Content-Type: text/plain"); // this tells a web browser not to treat the output as HTML
	echo($quote);
}
?>
