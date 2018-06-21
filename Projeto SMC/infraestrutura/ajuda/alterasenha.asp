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
      <td>Troque Sua Senha de Acesso nas&nbsp;F&eacute;rias</td>
    </tr>
    <tr class="Body1">
      <td><p align="justify">Evite o   bloqueio de sua senha renovando-a em alguns passos muito simples.</p>
        <p>Entre no site:</p>
        <p><a href="http://correio.prefeitura.sp.gov.br/">http://correio.prefeitura.sp.gov.br</a></p>
        <p>Se aparecer a janela de Alerta de Seguran&ccedil;a Clique em Sim</p>
        <p align="center"><img src="img/email1.jpg" width="544" height="392" /></p>
        <p align="justify">Clique em &ldquo;Alterar Senha&rdquo;.</p>
        <p align="justify"><img src="img/alterasenha2.jpg" width="544" height="392" /></p>
        <p align="justify">Abrir&aacute; uma janela para efetuar a troca de senha.</p>
        <p align="justify"><img src="img/alterasenha3.jpg" width="544" height="390" /></p>
        <ul>
          <li>No campo <em>Domain </em>digite o dom&iacute;nio (no caso da Secretaria Municipal   de Cultura &eacute; &ldquo;contas02&rdquo;).</li>
          <li>No campo <em>Account</em> digite o seu usu&aacute;rio que &eacute; a letra &ldquo;d&rdquo; mais os   seis primeiros n&uacute;meros de seu RF para os funcion&aacute;rios ou a letra &ldquo;x&rdquo; mais os   seis primeiros n&uacute;meros do seu RG para os estagi&aacute;rios.</li>
          <li>No campo <em>Old password</em> digite sua senha atual. </li>
          <li>No campo <em>New password</em> digite a sua nova senha.</li>
          <li>No campo <em>Confirm new password</em> redigite sua nova senha.</li>
        </ul>
        <p>Confira os dados digitados e clique em OK.</p>
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
