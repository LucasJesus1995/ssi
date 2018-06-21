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
      <td>Veja Seu E-Mail da Prefeitura em Qualquer Lugar Atrav&eacute;s do&nbsp;Site</td>
    </tr>
    <tr class="Body1">
      <td><p align="justify">Este &eacute; um recurso &uacute;til para quem precisa abrir seus e-mails em   alguma m&aacute;quina que seu Microsoft Outlook n&atilde;o esteja configurado ou at&eacute; mesmo   fora da prefeitura.</p>
        <p>Entre no site:</p>
        <p><a href="http://correio.prefeitura.sp.gov.br/">http://correio.prefeitura.sp.gov.br</a></p>
        <p>Se aparecer a janela de Alerta de Seguran&ccedil;a Clique em Sim.</p>
        <p><img src="img/email1.jpg" width="544" height="392" /></p>
        <p align="center"><img src="img/email2.jpg" width="388" height="310" /></p>
        <p>No quadro digite o come&ccedil;o do seu e-mail, o que vem antes do   @prefeitura.sp.gov.br</p>
        <p><img src="img/email3.jpg" width="544" height="391" /></p>
        <p>Abrir&aacute; uma janelinha para conectar ao correio</p>
        <p><img src="img/email4.jpg" width="544" height="391" /></p>
        <p align="justify">No campo Nome de usu&aacute;rio, digite o seu dom&iacute;nio (no caso do DEC   &eacute; &ldquo;contas02&rdquo;) e junto coloque uma barra invertida &ldquo;\&rdquo; e depois o login que &eacute; a   letra &ldquo;d&rdquo; mais os seis primeiros n&uacute;meros de seu RF para os funcion&aacute;rios ou a   letra &ldquo;x&rdquo; mais os seis primeiros n&uacute;meros do seu RG para os estagi&aacute;rios.</p>
        <p align="justify">Digite a sua senha no campo Senha:</p>
        <p>Clique em OK.</p>
        <p align="center"><img src="img/email5.jpg" width="326" height="288" />        </p>
        <p align="justify">Pronto!</p>
        <p align="justify"><img src="img/email6.jpg" width="544" height="392" /></p>
        <p align="justify">Para ver as suas outras pastas como Itens Enviados, clique na pasta <img src="img/email9.jpg" width="18" height="14" /></p>
        <p align="justify"><img src="img/email7.jpg" width="544" height="392" /></p>
        <p align="justify">Aparecer&aacute; o resto de suas pastas.</p>
        <p align="justify"><img src="img/email8.jpg" width="544" height="392" /><br />
        </p>
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
