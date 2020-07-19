<?php
	$translations_path = "../../../translations/";
	$home_path = "../../../";
	require $home_path.'lang_select.php';
	sleep(1);
	require $home_path.'theme_select.php';
	$Icon = $home_path.'assets/img/ACOS_0and0.png';
	$Name = 'name.txt';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="<?php echo $home_path; ?>css/style.css"/>
	<link rel="stylesheet" href="../style.css"/>
	<link rel="stylesheet" href="../../style.css"/>
	<link rel="stylesheet" href="<?php echo $home_path.'css/'.$Theme; ?>_theme.css">
	<title>ACOS</title>
	<style>
		#Main {
			padding-top: 8%;
			padding-bottom: 3%;
			margin: 0;
		}
	</style>
</head>
<body>
	<?php require '../../header.php'; ?>
	<div id="Main">
		<script language="javascript">
		<!--
		// Scientific Calculator written by Eni Generalic - http://www.ktf-split.hr/~eni
		// If you use a variant of this in your page, then please email me (eni@ktf-split.hr)
		// Please honor my hard work :), and keep these comments in the Script.

		var novibroj = 0
		var memorija = 0

		function dodajBroj(operator, noviznak)
		{
		if (operator == 1) novibroj = 1

		if (document.racunalo.display.value == null)
			novibroj = 0
		else if (document.racunalo.display.value == "0")
			novibroj = 0

		if (novibroj == 0)
			document.racunalo.display.value = noviznak
		else
			document.racunalo.display.value += noviznak

		novibroj = 1
		}

		function izracunaj(zarez, decimala, unos)
		{with (Math)
			{
			novibroj = 0

			if (zarez >= 1) {broj = unos.value;}
			
			var rezultat = eval(broj);

		if (document.racunalo.stupnjevi[1].checked)
			radijani = (rezultat / 180) * PI
		else
			radijani = rezultat
			
			if (zarez == 2) rezultat = pow(rezultat, 2);
			else if (zarez == 3) rezultat = sqrt(rezultat);
			else if (zarez == 4) rezultat = -rezultat;
			else if (zarez == 5) rezultat = log(rezultat);
			else if (zarez == 6) rezultat = pow(E, rezultat);
			else if (zarez == 7) rezultat = 1/rezultat;
			else if (zarez == 8) rezultat = log(rezultat)/LN10;
			else if (zarez == 9) rezultat = pow(10, rezultat);
			else if (zarez == 10) memorija = rezultat;
			else if (zarez == 11) memorija += rezultat;
			else if (zarez == 12) memorija -= rezultat;
			else if (zarez == 14) rezultat = tan(radijani);
			else if (zarez == 15) rezultat = cos(radijani);
			else if (zarez == 16) rezultat = sin(radijani);
			else if (zarez == 17) rezultat = rezultat/100;
			else if (zarez == 18) rezultat = rezultat/1000000;
			else if (zarez == 20) rezultat = factorial(rezultat);
			else if (zarez == 21) {
				var eksponent=prompt("Insérez l'exposant désiré", 3);
				rezultat = pow(rezultat, eksponent);}
			else if (zarez == 22) {
				var eksponent=prompt("Insérez la racine désirée", 3);
				rezultat = pow(rezultat, (1/eksponent));}

				if (decimala == -1)
					unos.value = rezultat;
				else
					unos.value = round(rezultat*pow(10, decimala))/pow(10, decimala);

			if (zarez >= 2) broj = rezultat;

			zarez = 1;
			}
		}

		function factorial(n)
		{
			if ((n == 0) || (n == 1))
				return 1
			else {
				rezultat = (n * factorial(n-1) )
				return rezultat}
		}

		//Eni Generalic, Split, 14.10.1999.-->

		</script>


		<form NAME="racunalo">
			<table BORDER="4" CELLSPACING="0" CELLPADDING="1" ALIGN="CENTER" BGCOLOR="#EFEFEF">
				<tr>
					<td><table BORDER="2" CELLSPACING="3" CELLPADDING="1" BGCOLOR="#808080" width="298">
						<tr>
							<td COLSPAN="6" ALIGN="CENTER" width="290" bgcolor="#C0C0C0"><font SIZE="4"><input TYPE="text" SIZE="16"
							NAME="display" VALUE
							STYLE="FONT-SIZE: 13pt; FONT-STYLE: normal; FONT-WEIGHT: bold; HEIGHT: 30px; WIDTH: 260px"></font></td>
						</tr>
						<tr>
							<td COLSPAN="5" ALIGN="center" VALIGN="middle" bgcolor="#C0C0C0" width="253"><div
							align="center"><center><p><font SIZE="2"><select NAME="izaZareza" SIZE="1"
							ONCHANGE="if (document.racunalo.display.value != '') {izracunaj(0, racunalo.izaZareza.options[racunalo.izaZareza.selectedIndex].value, document.racunalo.display)}">
								<option VALUE="-1" SELECTED>decimales</option>
								<option VALUE="0"> 0 </option>
								<option VALUE="1"> 1 </option>
								<option VALUE="2"> 2 </option>
								<option VALUE="3"> 3 </option>
								<option VALUE="4"> 4 </option>
								<option VALUE="5"> 5 </option>
								<option VALUE="6"> 6 </option>
								<option VALUE="7"> 7 </option>
								<option VALUE="8"> 8 </option>
								<option VALUE="9"> 9 </option>
								<option VALUE="10"> 10 </option>
								<option VALUE="11"> 11 </option>
								<option VALUE="12"> 12 </option>
								<option VALUE="13"> 13 </option>
								<option VALUE="14"> 14 </option>
								<option VALUE="15"> 15 </option>
							</select> <input TYPE="radio" NAME="stupnjevi" CHECKED>Rad <input TYPE="radio"
							NAME="stupnjevi">Deg</font></td>
							<td width="45" align="center" bgcolor="#C0C0C0"><input HEIGHT="24" WIDTH="38" TYPE="button" NAME="C"
							VALUE="Cls" ONCLICK="this.form.display.value = ''"
							STYLE="BACKGROUND: #EEEEEE; FONT-SIZE: 10pt; HEIGHT: 24px; WIDTH: 38px"></td>
						</tr>
						<tr align="center">
							<td width="41" bgcolor="#C0C0C0"><input HEIGHT="28" WIDTH="38" TYPE="button" NAME="sqrt" VALUE="sqrt"
							ONCLICK="izracunaj(3, racunalo.izaZareza.options[racunalo.izaZareza.selectedIndex].value, document.racunalo.display)"
							STYLE="BACKGROUND: #CDCDCD; FONT-SIZE: 10pt; HEIGHT: 28px; WIDTH: 38px"></td>
							<td width="41" bgcolor="#C0C0C0"><input HEIGHT="28" WIDTH="38" TYPE="button" NAME="root" VALUE="root"
							ONCLICK="izracunaj(22, racunalo.izaZareza.options[racunalo.izaZareza.selectedIndex].value, document.racunalo.display)"
							STYLE="BACKGROUND: #CDCDCD; FONT-SIZE: 10pt; HEIGHT: 28px; WIDTH: 38px"></td>
							<td width="40" bgcolor="#C0C0C0"><input HEIGHT="28" WIDTH="38" TYPE="button" NAME="ln" VALUE="ln"
							ONCLICK="izracunaj(5, racunalo.izaZareza.options[racunalo.izaZareza.selectedIndex].value, document.racunalo.display)"
							STYLE="BACKGROUND: #CDCDCD; FONT-SIZE: 10pt; HEIGHT: 28px; WIDTH: 38px"></td>
							<td width="46" bgcolor="#C0C0C0"><input HEIGHT="28" WIDTH="38" TYPE="button" NAME="log" VALUE="log"
							ONCLICK="izracunaj(8, racunalo.izaZareza.options[racunalo.izaZareza.selectedIndex].value, document.racunalo.display)"
							STYLE="BACKGROUND: #CDCDCD; FONT-SIZE: 10pt; HEIGHT: 28px; WIDTH: 38px"></td>
							<td width="53" bgcolor="#C0C0C0"><input HEIGHT="28" WIDTH="38" TYPE="button" NAME="tan" VALUE="tan"
							ONCLICK="izracunaj(14, racunalo.izaZareza.options[racunalo.izaZareza.selectedIndex].value, document.racunalo.display)"
							STYLE="BACKGROUND: #CDCDCD; FONT-SIZE: 10pt; HEIGHT: 28px; WIDTH: 38px"></td>
							<td width="45" bgcolor="#C0C0C0"><input HEIGHT="28" WIDTH="38" TYPE="button" NAME="MC" VALUE="MC"
							ONCLICK="memorija=0"
							STYLE="BACKGROUND: #EEEEEE; FONT-SIZE: 10pt; HEIGHT: 28px; WIDTH: 38px"></td>
						</tr>
						<tr align="center">
							<td width="41" bgcolor="#C0C0C0"><input HEIGHT="28" WIDTH="38" TYPE="button" NAME="x^2" VALUE="x^2"
							ONCLICK="izracunaj(2, racunalo.izaZareza.options[racunalo.izaZareza.selectedIndex].value, document.racunalo.display)"
							STYLE="BACKGROUND: #CDCDCD; FONT-SIZE: 10pt; HEIGHT: 28px; WIDTH: 38px"></td>
							<td width="41" bgcolor="#C0C0C0"><input HEIGHT="28" WIDTH="38" TYPE="button" NAME="x^y" VALUE="x^y"
							ONCLICK="izracunaj(21, racunalo.izaZareza.options[racunalo.izaZareza.selectedIndex].value, document.racunalo.display)"
							STYLE="BACKGROUND: #CDCDCD; FONT-SIZE: 10pt; HEIGHT: 28px; WIDTH: 38px"></td>
							<td width="40" bgcolor="#C0C0C0"><input HEIGHT="28" WIDTH="38" TYPE="button" NAME="e^x" VALUE="e^x"
							ONCLICK="izracunaj(6, racunalo.izaZareza.options[racunalo.izaZareza.selectedIndex].value, document.racunalo.display)"
							STYLE="BACKGROUND: #CDCDCD; FONT-SIZE: 10pt; HEIGHT: 28px; WIDTH: 38px"></td>
							<td width="46" bgcolor="#C0C0C0"><input HEIGHT="28" WIDTH="38" TYPE="button" NAME="10^x" VALUE="10^x"
							ONCLICK="izracunaj(9, racunalo.izaZareza.options[racunalo.izaZareza.selectedIndex].value, document.racunalo.display)"
							STYLE="BACKGROUND: #CDCDCD; FONT-SIZE: 10pt; HEIGHT: 28px; WIDTH: 38px"></td>
							<td width="53" bgcolor="#C0C0C0"><input HEIGHT="28" WIDTH="38" TYPE="button" NAME="cos" VALUE="cos"
							ONCLICK="izracunaj(15, racunalo.izaZareza.options[racunalo.izaZareza.selectedIndex].value, document.racunalo.display)"
							STYLE="BACKGROUND: #CDCDCD; FONT-SIZE: 10pt; HEIGHT: 28px; WIDTH: 38px"></td>
							<td width="45" bgcolor="#C0C0C0"><input HEIGHT="28" WIDTH="38" TYPE="button" NAME="M" VALUE="M"
							ONCLICK="izracunaj(10, racunalo.izaZareza.options[racunalo.izaZareza.selectedIndex].value, document.racunalo.display)"
							STYLE="BACKGROUND: #CDCDCD; FONT-SIZE: 10pt; HEIGHT: 28px; WIDTH: 38px"></td>
						</tr>
						<tr align="center">
							<td width="41" bgcolor="#C0C0C0"><input HEIGHT="28" WIDTH="38" TYPE="button" NAME="-" VALUE="+/-"
							ONCLICK="izracunaj(4, racunalo.izaZareza.options[racunalo.izaZareza.selectedIndex].value, document.racunalo.display)"
							STYLE="BACKGROUND: #CDCDCD; FONT-SIZE: 10pt; HEIGHT: 28px; WIDTH: 38px"></td>
							<td width="41" bgcolor="#C0C0C0"><input HEIGHT="28" WIDTH="38" TYPE="button" NAME="1/x" VALUE="1/x"
							ONCLICK="izracunaj(7, racunalo.izaZareza.options[racunalo.izaZareza.selectedIndex].value, document.racunalo.display)"
							STYLE="BACKGROUND: #CDCDCD; FONT-SIZE: 10pt; HEIGHT: 28px; WIDTH: 38px"></td>
							<td width="40" bgcolor="#C0C0C0"><input HEIGHT="28" WIDTH="38" TYPE="button" NAME="x!" VALUE="x!"
							ONCLICK="izracunaj(20, racunalo.izaZareza.options[racunalo.izaZareza.selectedIndex].value, document.racunalo.display)"
							STYLE="BACKGROUND: #CDCDCD; FONT-SIZE: 10pt; HEIGHT: 28px; WIDTH: 38px"></td>
							<td width="46" bgcolor="#C0C0C0"><input HEIGHT="28" WIDTH="38" TYPE="button" NAME="PI" VALUE="PI"
							ONCLICK="dodajBroj(2, Math.PI)"
							STYLE="BACKGROUND: #CDCDCD; FONT-SIZE: 10pt; HEIGHT: 28px; WIDTH: 38px"></td>
							<td width="53" bgcolor="#C0C0C0"><input HEIGHT="28" WIDTH="38" TYPE="button" NAME="sin" VALUE="sin"
							ONCLICK="izracunaj(16, racunalo.izaZareza.options[racunalo.izaZareza.selectedIndex].value, document.racunalo.display)"
							STYLE="BACKGROUND: #CDCDCD; FONT-SIZE: 10pt; HEIGHT: 28px; WIDTH: 38px"></td>
							<td width="45" bgcolor="#C0C0C0"><input HEIGHT="28" WIDTH="38" TYPE="button" NAME="M-" VALUE="M-"
							ONCLICK="izracunaj(12, racunalo.izaZareza.options[racunalo.izaZareza.selectedIndex].value, document.racunalo.display)"
							STYLE="BACKGROUND: #CDCDCD; FONT-SIZE: 10pt; HEIGHT: 28px; WIDTH: 38px"></td>
						</tr>
						<tr align="center">
							<td width="41" bgcolor="#C0C0C0"><input HEIGHT="32" WIDTH="38" TYPE="button" NAME="7" VALUE="7"
							ONCLICK="dodajBroj(0, 7)"
							STYLE="BACKGROUND: #DEDEDE; FONT-SIZE: 12pt; HEIGHT: 32px; WIDTH: 38px"></td>
							<td width="41" bgcolor="#C0C0C0"><input HEIGHT="32" WIDTH="38" TYPE="button" NAME="8" VALUE="8"
							ONCLICK="dodajBroj(0, 8)"
							STYLE="BACKGROUND: #DEDEDE; FONT-SIZE: 12pt; HEIGHT: 32px; WIDTH: 38px"></td>
							<td width="40" bgcolor="#C0C0C0"><input HEIGHT="32" WIDTH="38" TYPE="button" NAME="9" VALUE="9"
							ONCLICK="dodajBroj(0, 9)"
							STYLE="BACKGROUND: #DEDEDE; FONT-SIZE: 12pt; HEIGHT: 32px; WIDTH: 38px"></td>
							<td width="46" bgcolor="#C0C0C0"><input HEIGHT="32" WIDTH="38" TYPE="button" NAME="/" VALUE="/"
							ONCLICK="dodajBroj(1, '/')"
							STYLE="BACKGROUND: #DEDEDE; FONT-SIZE: 12pt; HEIGHT: 32px; WIDTH: 38px"></td>
							<td width="53" bgcolor="#C0C0C0"><input HEIGHT="32" WIDTH="38" TYPE="button" NAME="ppm" VALUE="ppm"
							ONCLICK="izracunaj(18, racunalo.izaZareza.options[racunalo.izaZareza.selectedIndex].value, document.racunalo.display)"
							STYLE="BACKGROUND: #CDCDCD; FONT-SIZE: 10pt; HEIGHT: 32px; WIDTH: 38px"></td>
							<td width="45" bgcolor="#C0C0C0"><input HEIGHT="32" WIDTH="38" TYPE="button" NAME="M+" VALUE="M+"
							ONCLICK="izracunaj(11, racunalo.izaZareza.options[racunalo.izaZareza.selectedIndex].value, document.racunalo.display)"
							STYLE="BACKGROUND: #CDCDCD; FONT-SIZE: 10pt; HEIGHT: 32px; WIDTH: 38px"></td>
						</tr>
						<tr align="center">
							<td width="41" bgcolor="#C0C0C0"><input HEIGHT="32" WIDTH="38" TYPE="button" NAME="4" VALUE="4"
							ONCLICK="dodajBroj(0, 4)"
							STYLE="BACKGROUND: #DEDEDE; FONT-SIZE: 12pt; HEIGHT: 32px; WIDTH: 38px"></td>
							<td width="41" bgcolor="#C0C0C0"><input HEIGHT="32" WIDTH="38" TYPE="button" NAME="5" VALUE="5"
							ONCLICK="dodajBroj(0, 5)"
							STYLE="BACKGROUND: #DEDEDE; FONT-SIZE: 12pt; HEIGHT: 32px; WIDTH: 38px"></td>
							<td width="40" bgcolor="#C0C0C0"><input HEIGHT="32" WIDTH="38" TYPE="button" NAME="6" VALUE="6"
							ONCLICK="dodajBroj(0, 6)"
							STYLE="BACKGROUND: #DEDEDE; FONT-SIZE: 12pt; HEIGHT: 32px; WIDTH: 38px"></td>
							<td width="46" bgcolor="#C0C0C0"><input HEIGHT="32" WIDTH="38" TYPE="button" NAME="*" VALUE="*"
							ONCLICK="dodajBroj(1, '*')"
							STYLE="BACKGROUND: #DEDEDE; FONT-SIZE: 12pt; HEIGHT: 32px; WIDTH: 38px"></td>
							<td width="53" bgcolor="#C0C0C0"><input HEIGHT="32" WIDTH="38" TYPE="button" NAME="%" VALUE="%"
							ONCLICK="izracunaj(17, racunalo.izaZareza.options[racunalo.izaZareza.selectedIndex].value, document.racunalo.display)"
							STYLE="BACKGROUND: #CDCDCD; FONT-SIZE: 10pt; HEIGHT: 32px; WIDTH: 38px"></td>
							<td width="45" bgcolor="#C0C0C0"><input HEIGHT="32" WIDTH="38" TYPE="button" NAME="MR" VALUE="MR"
							ONCLICK="dodajBroj(2, memorija)"
							STYLE="BACKGROUND: #CDCDCD; FONT-SIZE: 10pt; HEIGHT: 32px; WIDTH: 38px"></td>
						</tr>
						<tr align="center">
							<td width="41" bgcolor="#C0C0C0"><input HEIGHT="32" WIDTH="38" TYPE="button" NAME="1" VALUE="1"
							ONCLICK="dodajBroj(0, 1)"
							STYLE="BACKGROUND: #DEDEDE; FONT-SIZE: 12pt; HEIGHT: 32px; WIDTH: 38px"></td>
							<td width="41" bgcolor="#C0C0C0"><input HEIGHT="32" WIDTH="38" TYPE="button" NAME="2" VALUE="2"
							ONCLICK="dodajBroj(0, 2)"
							STYLE="BACKGROUND: #DEDEDE; FONT-SIZE: 12pt; HEIGHT: 32px; WIDTH: 38px"></td>
							<td width="40" bgcolor="#C0C0C0"><input HEIGHT="32" WIDTH="38" TYPE="button" NAME="3" VALUE="3"
							ONCLICK="dodajBroj(0, 3)"
							STYLE="BACKGROUND: #DEDEDE; FONT-SIZE: 12pt; HEIGHT: 32px; WIDTH: 38px"></td>
							<td width="46" bgcolor="#C0C0C0"><input HEIGHT="32" WIDTH="38" TYPE="button" NAME="-" VALUE="-"
							ONCLICK="dodajBroj(1, '-')"
							STYLE="BACKGROUND: #DEDEDE; FONT-SIZE: 12pt; HEIGHT: 32px; WIDTH: 38px"></td>
							<td width="53" bgcolor="#C0C0C0"><input HEIGHT="32" WIDTH="38" TYPE="button" NAME="(" VALUE="("
							ONCLICK="dodajBroj(1, '(')"
							STYLE="BACKGROUND: #CDCDCD; FONT-SIZE: 10pt; HEIGHT: 32px; WIDTH: 38px"></td>
							<td width="45" bgcolor="#C0C0C0"><input HEIGHT="32" WIDTH="38" TYPE="button" NAME=")" VALUE=")"
							ONCLICK="dodajBroj(1, ')')"
							STYLE="BACKGROUND: #CDCDCD; FONT-SIZE: 10pt; HEIGHT: 32px; WIDTH: 38px"></td>
						</tr>
						<tr align="center">
							<td width="41" bgcolor="#C0C0C0"><input HEIGHT="32" WIDTH="38" TYPE="button" NAME="0" VALUE="0"
							ONCLICK="dodajBroj(0, 0)"
							STYLE="BACKGROUND: #DEDEDE; FONT-SIZE: 12pt; HEIGHT: 32px; WIDTH: 38px"></td>
							<td width="41" bgcolor="#C0C0C0"><input HEIGHT="32" WIDTH="38" TYPE="button" NAME="." VALUE="."
							ONCLICK="dodajBroj(1, '.')"
							STYLE="BACKGROUND: #DEDEDE; FONT-SIZE: 12pt; HEIGHT: 32px; WIDTH: 38px"></td>
							<td width="40" bgcolor="#C0C0C0"><input HEIGHT="32" WIDTH="38" TYPE="button" NAME="exp" VALUE="exp"
							ONCLICK="dodajBroj(1, 'E')"
							STYLE="BACKGROUND: #DEDEDE; FONT-SIZE: 10pt; HEIGHT: 32px; WIDTH: 38px"></td>
							<td width="46" bgcolor="#C0C0C0"><input HEIGHT="32" WIDTH="38" TYPE="button" NAME="+" VALUE="+"
							ONCLICK="dodajBroj(1, '+')"
							STYLE="BACKGROUND: #DEDEDE; FONT-SIZE: 12pt; HEIGHT: 32px; WIDTH: 38px"></td>
							<td COLSPAN="2" ALIGN="CENTER" width="90" bgcolor="#C0C0C0"><input HEIGHT="32" WIDTH="82" TYPE="button"
							NAME="enter"
							ONCLICK="izracunaj(1, racunalo.izaZareza.options[racunalo.izaZareza.selectedIndex].value, document.racunalo.display)"
							type="button" VALUE="="
							STYLE="BACKGROUND: #CDCDCD; FONT-SIZE: 12pt; HEIGHT: 32px; WIDTH: 82px"></td>
						</tr>
					</table>
					</td>
				</tr>
			</table>
		</form><p align="center"><font face="Arial"><small><small>Calculatrice scientifique réalisée par Eni Generalic</small></small></font></p>
		<p align="center"><script language="JavaScript">

		// <!--

		function fin()

		{

		window.close();

		}

		// -->

		</script>
	</div>
</body>