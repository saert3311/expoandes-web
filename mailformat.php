<?php
function format($msg, $vars)
{
    $vars = (array)$vars;

    $msg = preg_replace_callback('#\{\}#', function($r){
        static $i = 0;
        return '{'.($i++).'}';
    }, $msg);

    return str_replace(
        array_map(function($k) {
            return '{'.$k.'}';
        }, array_keys($vars)),

        array_values($vars),

        $msg
    );
}

function correo_user($nombre, $correo) {
    $correobase='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>[SUBJECT]</title>
		<style type="text/css">
	
	@media screen and (max-width: 600px) {
		table[class="container"] {
			width: 95% !important;
		}
	}
	
		#outlook a {padding:0;}
			body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
			.ExternalClass {width:100%;}
			.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;}
			#backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
			img {outline:none; text-decoration:none; -ms-interpolation-mode: bicubic;}
			a img {border:none;}
			.image_fix {display:block;}
			p {margin: 1em 0;}
			h1, h2, h3, h4, h5, h6 {color: black !important;}
	
			h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {color: blue !important;}
	
			h1 a:active, h2 a:active,  h3 a:active, h4 a:active, h5 a:active, h6 a:active {
				color: red !important; 
			 }
	
			h1 a:visited, h2 a:visited,  h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited {
				color: purple !important; 
			}
	
			table td {border-collapse: collapse;}
	
			table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }
	
			a {color: #000;}
	
			@media only screen and (max-device-width: 480px) {
	
				a[href^="tel"], a[href^="sms"] {
							text-decoration: none;
							color: black; /* or whatever your want */
							pointer-events: none;
							cursor: default;
						}
				.mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
							text-decoration: default;
							color: orange !important; /* or whatever your want */
							pointer-events: auto;
							cursor: default;
						}
			}
			@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
				a[href^="tel"], a[href^="sms"] {
							text-decoration: none;
							color: blue; /* or whatever your want */
							pointer-events: none;
							cursor: default;
						}
	
				.mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
							text-decoration: default;
							color: orange !important;
							pointer-events: auto;
							cursor: default;
						}
			}
			@media only screen and (-webkit-min-device-pixel-ratio: 2) {
				/* Put your iPhone 4g styles in here */
			}
			@media only screen and (-webkit-device-pixel-ratio:.75){
				/* Put CSS for low density (ldpi) Android layouts in here */
			}
			@media only screen and (-webkit-device-pixel-ratio:1){
				/* Put CSS for medium density (mdpi) Android layouts in here */
			}
			@media only screen and (-webkit-device-pixel-ratio:1.5){
				/* Put CSS for high density (hdpi) Android layouts in here */
			}
			/* end Android targeting */
			h2{
				color:#181818;
				font-family:Helvetica, Arial, sans-serif;
				font-size:22px;
				line-height: 22px;
				font-weight: normal;
			}
			a.link1{
			}
			a.link2{
				color:#fff;
				text-decoration:none;
				font-family:Helvetica, Arial, sans-serif;
				font-size:16px;
				color:#fff;border-radius:4px;
				font-weight: bold;
			}
			p{
				color:#555;
				font-family:Helvetica, Arial, sans-serif;
				font-size:16px;
				line-height:160%;
			}
		</style>
	<script type="colorScheme" class="swatch active">
	  {
		"name":"Default",
		"bgBody":"ffffff",
		"link":"fff",
		"color":"555555",
		"bgItem":"ffffff",
		"title":"181818"
	  }
	</script>
	</head>
	<body style="background-color:#ffffff!important">
		<table cellpadding="0" width="100%" cellspacing="0" border="0" id="backgroundTable" class="bgBody">
		<tr>
			<td>
		<table cellpadding="0" width="620" class="container" align="center" cellspacing="0" border="0">
		<tr>
			<td>
			<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
				<tr>
					<td class="movableContentContainer bgItem">
						<div class="movableContent">
							<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
								<tr height="40">
									<td width="200">&nbsp;</td>
									<td width="200">&nbsp;</td>
									<td width="200">&nbsp;</td>
								</tr>
								<tr>
									<td width="200" valign="top">&nbsp;</td>
									<td width="200" valign="top" align="center">
										<div class="contentEditableContainer contentImageEditable">
											<div class="contentEditable" align="center" >
												  <img src="https://grexialbornett.com/assets/img/logo_grexi2020_b.png" width="193" height="150" alt="Logo"  data-default="placeholder" style="height:150px;width:auto;"/>
											</div>
										  </div>
									</td>
									<td width="200" valign="top">&nbsp;</td>
								</tr>
								<tr height="25">
									<td width="200">&nbsp;</td>
									<td width="200">&nbsp;</td>
									<td width="200">&nbsp;</td>
								</tr>
							</table>
						</div>
						<div class="movableContent">
							<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
								<tr>
									<td width="100%" colspan="3" align="center" style="padding-bottom:10px;padding-top:25px;">
										<div class="contentEditableContainer contentTextEditable">
											<div class="contentEditable" align="center" >
												  <h2>Hola {first_name}, ¡Tú tienes el poder de cambiar tu vida!.</h2>
												  <p>Este espacio será para ti, para mí y para todos los que quieran aprender el arte de la creación de milagros, encontraremos las fallas y malos hábitos que venimos haciendo hasta la actualidad, para cambiar nuestra realidad, ya que todos estos problemas solo es un reflejo de nuestro interior. Es importante resaltar que este curso no es para aprender a sanar heridas, para tratar temas específicos de terapia. Este curso tiene como finalidad el despertar de la mente consciente.</p>
											</div>
										  </div>
									</td>
								</tr>
								<tr>
									<td width="100">&nbsp;</td>
									<td width="400" align="center">
										<div class="contentEditableContainer contentTextEditable">
											<div class="contentEditable" align="left" >
												  <p style="text-align: center;">Si tuviste algun problema al momento de hacer el pago del registro puedes hacerlo mediante el siguiente enlace</p>
											</div>
										  </div>
									</td>
									<td width="100">&nbsp;</td>
								</tr>
							</table>
							<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
								<tr>
									<td width="200">&nbsp;</td>
									<td width="200" align="center" style="padding-top:25px;">
										<table cellpadding="0" cellspacing="0" border="0" align="center" width="200" height="50">
											<tr>
												<td bgcolor="#1282c4" align="center" style="border-radius:4px;" width="200" height="50">
													<div class="contentEditableContainer contentTextEditable">
														<div class="contentEditable" align="center" >
															  <a target="_blank" href="https://checkout.square.site/pay/34f441aac4b04f6480c86bf0df21c204" class="link2">Completar Registro</a>
														</div>
													  </div>
												</td>
											</tr>
										</table>
									</td>
									<td width="200">&nbsp;</td>
								</tr>
							</table>
							<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container" style="margin-top: 2em">
								<tr>
									<td width="100">&nbsp;</td>
									<td width="400" align="center">
										<div class="contentEditableContainer contentTextEditable">
											<div class="contentEditable" align="left" >
												  <p style="text-align: center;">Si necesitas alguna información adicional o mas especifica puedes contactarme.</p>
											</div>
										  </div>
									</td>
									<td width="100">&nbsp;</td>
								</tr>
								<tr>
									<td width="225">&nbsp;</td>
									<td width="250" align="center" style="padding-top:25px;">
										<table cellpadding="0" cellspacing="0" border="0" align="center" width="200" height="50">
											<tr>
												<td bgcolor="#9c5b57" align="center" style="border-radius:4px;" width="200" height="50">
													<div class="contentEditableContainer contentTextEditable">
														<div class="contentEditable" align="center" >
															  <a target="_blank" href="https://grexialbornett.com/#contact" class="link2">Contacto</a>
														</div>
													  </div>
												</td>
											</tr>
										</table>
									</td>
									<td width="225">&nbsp;</td>
								</tr>
							</table>
						</div>
						<div class="movableContent">
							<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
								<tr>
									<td width="100%" colspan="2" style="padding-top:65px;">
										<hr style="height:1px;border:none;color:#333;background-color:#ddd;" />
									</td>
								</tr>
								<tr>
									<td width="60%" height="70" valign="middle" style="padding-bottom:20px;">
										<div class="contentEditableContainer contentTextEditable">
											<div class="contentEditable" align="left" >
												  <span style="font-size:13px;color:#181818;font-family:Helvetica, Arial, sans-serif;line-height:200%;">Enviado a  {email} por  Formacion Grexi Albornett</span>
												<br/>
												<span style="font-size:11px;color:#555;font-family:Helvetica, Arial, sans-serif;line-height:200%;">8200 NW 41st Street, Suite 200, Miami, FL 33166</span>
											</div>
										  </div>
									</td>
									<td width="40%" height="70" align="right" valign="top" align="right" style="padding-bottom:20px;">
									</td>
								</tr>
							</table>
						</div>
					</td>
				</tr>
			</table>
		</td></tr></table>
			</td>
		</tr>
		</table>
	</body>
	</html>';   
    $devolver = format($correobase, array('first_name' => $nombre, 'email' => $correo));
    return $devolver;
}
?>