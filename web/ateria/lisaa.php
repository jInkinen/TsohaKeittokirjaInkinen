<!-- 
    Document   : lisää ateria
    Created on : 14.9.2012, 16:13:41
    Author     : juhainki
-->

<!@page contentType="text/html" pageEncoding="UTF-8">
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Keittokirja Online - Ateria - Lisää</title>
        <link rel="stylesheet" href="../tyyli/tyylit.css" />
    </head>
    <body>
		<div id="banneri">
			<ul>
				<li>
					<form id="haku" action="">
						<input id="etsi" type="text" placeholder="Mitä etsit?">
						<input id="hae" type="submit" value="Hae">
					</form>
				</li>
			</ul>
		</div>
		<div>
			<ul id="navi">
				<li><a href="../index.html">Etusivu</a></li>
				<li>
					<a href="../ruoka/selaa.html">Reseptit</a>
					<ul>
						<li><a href="../ruoka/lisaa.html">Lisää uusi</a></li>
					</ul>
				</li>
				<li>
					<a href="selaa.html">Ateriat</a>
					<ul>
						<li><a href="lisaa.html">Lisää uusi</a></li>
					</ul>
				</li>
				<li><a href="../aines/selaa.html">Ainekset</a></li>
				<li>
					<a href="../user/profiili.html">Käyttäjä</a>
					<ul>
						<li><a href="../user/kori.html">Ostoskori</a></li>
						<li><a href="../user/rek.html">Rekisteröidy</a></li>
						<li><a href="../user/kir.html">Kirjaudu</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<div id="raami">
			<div id="sisus">
				<h1>Lisää uusi ateriakokonaisuus</h1>
					<form id="uusiresepti" action="lisays.php" method="post">
						<table>
							<tr>
								<td>Aterian nimi:</td>			
								<td><input name="nimi" type="text" required="true"></td>
							</tr>
							<tr>
								<td>Aterian kuvaus:</td>
								<td><input name="kuvaus" type="text"></td>
							</tr>
							<tr><td><br></td></tr>
							<tr>
								<td>Ruoka 1</td>
								<td>
									<select>
										<option value="null">(Lista tietokannasta)</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>Ruoka 2</td>
								<td>
									<select>
										<option value="null">(Lista tietokannasta)</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>Ruoka 3</td>
								<td>
									<select>
										<option value="null">(Lista tietokannasta)</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>Ruoka 4</td>
								<td>
									<select>
										<option value="null">(Lista tietokannasta)</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>Ruoka 5</td>
								<td>
									<select>
										<option value="null">(Lista tietokannasta)</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>Ruoka 6</td>
								<td>
									<select>
										<option value="null">(Lista tietokannasta)</option>
									</select>
								</td>
							</tr>

							<tr><td><br></td></tr>
							<tr>
								<td>Kuva:</td>
								<td><input name="kuva" type="file"></td>
							</tr>
						</table><br>
						<input id="lisaa" type="submit" value="Lisää">
					</form>
			</div>
		</div>
    </body>
</html>
