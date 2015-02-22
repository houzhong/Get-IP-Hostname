<!--
  ##########################################################################################
 *  Get IP&Hostname                       1.0
 *  Versao do PHP (PHP Version)           5.4.7
 *  Desenvolvido por (Developed by)       Levi Nobre
 *  Permissao (Permission)                Leitura & Escrita (Read & Write)
 *  -------------------------------------------------------------------------------------
 *  BUSCA ENDEREÇO IP E HOSTNAME (SEARCH IP ADDRESS AND HOSTNAME)
 *
 *  twitter.com/levi_nobre
 *  github.com/levinobre
 *  instagram.com/levi_nobre
 *  levinobre.com
  ##########################################################################################
 */
-->
<!DOCTYPE html>
<html lang="pt-BR">
   <head>
    <meta charset="UTF-8">
    <title>Get IP&Hostname</title>
   </head>
   <body>
   <style type="text/css">
    body {
     background: #000 url('');
     cursor: url(''), progress;
    }
    img[name=p] {
     background: white;
     border-radius: 10px;
    }
   </style>
   <font face="Helvetica" color="green">
    <h1 align="center">Get IP&Hostname</h1>
    <h3 align="center">by Levi Nobre (levinobre.com)</h3>
   </font>
   <hr>
   <br>
   <br>
   <center>
   <font face="Helvetica" color="green">
<?php
function printForm()
{
global $www;

$action = $_SERVER["PHP_SELF"];

print <<<ENDHTM
<form method="post" action="$action">
<p>http:// <input type="text" name="www" value="$www"/> <input type="submit" value="Ver (View)"/></p>
</form>

ENDHTM;
}

if($_REQUEST['www'])
{
print $www;

$domain = strtolower($_REQUEST['www']);
$xArray = @parse_url($domain);

	if(!$xArray["scheme"])
	{
	$domain = "http://" . $domain;
	$xArray = @parse_url($domain);
	}

	$xProtocol = $xArray["scheme"];
	$xHost   = $xArray["host"];
	$xPort   = $xArray["port"];
	$xUser   = $xArray["user"];
	$xPass   = $xArray["pass"];
	$xPath   = $xArray["path"];
	$xQuery  = $xArray["query"];
	$xFragment = $xArray["fragment"];

	$domain = $xProtocol ."://". $xHost . $xPath . ($xQuery?"?":"") . $xQuery;
	$www = $xHost . $xPath . ($xQuery?"?":"") . $xQuery;

	printForm();

		if(@gethostbyname($xHost) == $xHost)
		{
		$ip2 = "Erro (Error)";
		$hostname2 = "Erro (Error)";
		}
		else
		{
		$ip2 = @gethostbyname($xHost);
		$hostname2 = @gethostbyaddr($ip2);
		}
	print "<div><p><strong><font color=\"green\">IP</font></strong>: $ip2</p></div>\n";
	print "<div><p><strong><font color=\"green\">Hostname</font></strong>: $hostname2</p></div>\n";
}
else
{
		if(isset($_COOKIE['URL']))
		{
		$www = $_COOKIE['URL'];
		}
printForm();
}
?>
   </font>
   </center>
   </body>
</html>
