<%@ LANGUAGE="VBScript" %>
<% 
  Option Explicit
  'Buffer the response, so Response.Expires can be used
  Response.Buffer = TRUE
%>

<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

  <!--
  Liberum Help Desk, Copyright (C) 2000-2001 Doug Luxem
  Liberum Help Desk comes with ABSOLUTELY NO WARRANTY
  Please view the license.html file for the full GNU General Public License.

  Filename: default.asp
  Date:     $Date: 2001/12/09 02:01:24 $
  Version:  $Revision: 1.50 $
  Purpose:  This is the main page that will redirect users to the logon screen
  or to their user or rep menu.
  -->
  <!--	#include file = "../settings.asp" -->
  <!-- 	#include file = "../public.asp" -->
  <%
    Call SetAppVariables

    Dim cnnDB, sid
    Set cnnDB = CreateCon
    sid = GetSid
  %>

  <head>
    <title>
      <% = Cfg(cnnDB, "SiteName") %>&nbsp;<%=lang(cnnDB, "HelpDesk")%>
    </title>
    <link rel="stylesheet" type="text/css" href="../default.css">  
    <style type="text/css">
<!--
.style1 {font-size: xx-small}
-->
    </style>
</head>
  <body>
  <a name="topo" id="topo"></a>
  <table align="center" class="Normal">
    <tr class="Head2">
      <td>Problemas Para Conseguir Responder E-Mails Pelo Site   da&nbsp;Prefeitura?</td>
    </tr>
    <tr class="Body1">
      <td><p align="justify">Quem utiliza o sistema operacional Windows XP com SP2 ou posterior, pode encontrar problemas para conseguir responder os e-mails da   prefeitura pelo site, pois o Windows possui um bloqueador de Pop-ups que   bloqueia o aparecimento da janela que abre quando clica-se em Responder. Para   solucionar este problema, basta seguir as instru&ccedil;&otilde;es abaixo.</p>
        <p align="justify">No Internet Explorer, entre no menu Ferramentas e depois em Op&ccedil;&otilde;es da   Internet&hellip;</p>
        <p align="justify"><img src="img/respondemail1.jpg" width="544" height="387" /></p>
        <p align="justify">Na janela que abrir, clique na guia Privacidade e em seguida no bot&atilde;o   Configura&ccedil;&otilde;es&hellip; na parte do Bloqueador de Pop-ups.</p>
        <p align="center"><img src="img/respondemail2.jpg" width="544" height="387" /></p>
        <p align="justify">Abrir&aacute; uma nova janela pedindo para cadastrar o endere&ccedil;o de site permitido.   Digite o endere&ccedil;o correio.prefeitura.sp.gov.br e clique em adicionar.</p>
        <p align="center"><img src="img/respondemail3.jpg" width="544" height="388" /></p>
        <p align="justify">O endere&ccedil;o ir&aacute; aparecer na parte de Sites permitidos com na imagem abaixo.</p>
        <p align="justify"><img src="img/respondemail4.jpg" width="544" height="387" /></p>
        <p align="justify">Ap&oacute;s isso, basta clicar em Fechar e na janela anterior clicar   em OK.</p>
        <p>Pronto! Voc&ecirc; poder&aacute; responder seus e-mails atrav&eacute;s do webmail a vontade sem   precisar repetir essa configura&ccedil;&atilde;o no mesmo computador.</p>
        <p align="right" class="style1"><a href="#topo">Topo</a></p></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table align="center">     
		<tr class="Body1">
		  <td><a href=javascript:window.print()>IMPRIMIR</a></td>
		</tr>	
  </table>
		
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</body>
</html>
