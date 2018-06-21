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
      <td>Aprenda a Compartilhar Seus Arquivos e Acesse em   Outras&nbsp;M&aacute;quinas</td>
    </tr>
    <tr class="Body1">
      <td><p align="justify">O que &eacute; o compartilhamento? Compartilhamento &eacute; a capacidade de   pessoas de outros computadores acessarem recursos localizados em seu computador,   como arquivos.</p>
        <p align="justify">Este nosso tutorial &eacute; baseado no Windows XP. O modo como o   compartilhamento de arquivos funciona nas vers&otilde;es anteriores do Windows &eacute;   exatamente o mesmo, apesar do nome exato das op&ccedil;&otilde;es serem diferentes.</p>
        <p><strong>Compartilhando Pastas</strong><br />
          Voc&ecirc; pode compartilhar qualquer   pasta em seu computador fazendo com que as pessoas possam acessar todos os   arquivos contidos nela a partir de outros computadores. Qualquer dispositivo que   &eacute; reconhecido como um disco pelo sistema operacional pode ser   compartilhado.<br />
          Para compartilhar uma pasta ou disco clique sobre ele com o   bot&atilde;o direito do mouse e selecione a op&ccedil;&atilde;o Compartilhamento e Seguran&ccedil;a do menu   que aparecer&aacute;.&nbsp; Em nosso exemplo iremos compartilhar a pasta Nova pasta. Como   mencionamos, voc&ecirc; poderia compartilhar apenas uma pasta do seu disco r&iacute;gido.</p>
        <p align="center"><a href="http://go2.wordpress.com/?id=725X1342&amp;site=dicasinformatica.wordpress.com&amp;url=http%3A%2F%2Fdicasinformatica.files.wordpress.com%2F2008%2F10%2Fcompartilhando_pasta_clip_image002.jpg"></a><img src="img/compart1.jpg" width="544" height="408" /><br />
        <strong>Figura 1</strong>: Selecione Compartilhamento e Seguran&ccedil;a na pasta que   deseja compartilhar.</p>
        <p align="justify">No menu que aparecer&aacute;, clique em &ldquo;Se voc&ecirc; sabe que h&aacute; risco,   mas deseja compartilhar a raiz da unidade mesmo assim, clique aqui&rdquo;.</p>
        <p align="center"><img src="img/compart2.jpg" width="366" height="455" /><br />
        <strong>Figura 2</strong>: Sim, &eacute; exatamente isto que n&oacute;s queremos.</p>
        <p align="justify">Na pr&oacute;xima janela, marque a op&ccedil;&atilde;o &ldquo;Compartilhar esta   pasta&rdquo; e d&ecirc; um nome para o compartilhamento em &ldquo;Nome do compartilhamento&rdquo;   (usamos &ldquo;Nova pasta&rdquo;). Isto &eacute; como sua pasta compartilhada ser&aacute; conhecida na sua   rede.</p>
        <p align="center"><img src="img/compart3.jpg" width="366" height="481" /><br />
        <strong>Figura 3</strong>: Habilitando o compartilhamento da pasta.</p>
        <p>Para voc&ecirc; ter um controle total sobre essa pasta, podendo alterar os arquivos   nela contidos, clique em &ldquo;Permiss&otilde;es&rdquo; e assinale a op&ccedil;&atilde;o &ldquo;Controle total&rdquo;.</p>
        <p align="center"><img src="img/compart4.jpg" width="366" height="450" /><br />
        <strong>Figura 4 </strong>: Alterando as permiss&otilde;es de acesso da pasta.</p>
        <p align="justify">Clique em OK e sua pasta estar&aacute; acess&iacute;vel por todos os   computadores da sua rede (este procedimento pode demorar um pouco).<br />
          Agora que   voc&ecirc; compartilhou sua pasta, mostraremos a voc&ecirc; como acess&aacute;-la a partir de   outros computadores.</p>
        <p align="justify"><strong>Acessando Pastas Compartilhadas</strong><br />
          Para   acessar pastas compartilhadas dispon&iacute;veis em sua rede, clique no menu Iniciar,   depois em Executar, digite &ldquo;\\&rdquo; mais o nome do computador que est&aacute; a sua pasta   compartilhada e clique em OK.<br />
          O nome do computador voc&ecirc; encontra na etiqueta   localizada em cima da CPU.</p>
        <p align="center"><img src="img/compart5.jpg" width="347" height="186" /><br />
        <strong>Figura 5 </strong>: Inserindo o comando para acessar a pasta que est&aacute;   compartilhada no outro computador.</p>
        <p>Abrir&aacute; uma janela com os itens que est&atilde;o compartilhados no computador   solicitado.</p>
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
