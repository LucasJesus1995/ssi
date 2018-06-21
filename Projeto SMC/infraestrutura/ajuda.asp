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
  <!--	#include file = "settings.asp" -->
  <!-- 	#include file = "public.asp" -->
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
    <link rel="stylesheet" type="text/css" href="default.css">  
    <style type="text/css">
<!--
.style1 {font-size: xx-small}
-->
    </style>
  </head>
  <body>
  <a name="topo" id="topo"></a>
  <table width="763" align="center" class="Normal">
        <tr class="Head1">
          <td width="895"><% = Cfg(cnnDB, "SiteName") %></td>
        </tr>
        <tr class="Head1">
          <td>
            <div align="center">
              <%=lang(cnnDB, "HelpDesk")%>            </div>          </td>
  </tr>
     <tr class="Body1"><td><div align="center"><a href="#novo">Para enviar um novo problema</a></div></td></tr>
     <tr class="Body1"><td><div align="center"><a href="#categoria">Defini&ccedil;&otilde;es das categorias</a></div></td></tr>
     <tr class="Body1"><td><div align="center"><a href="#lista">Para ver lista de problemas</a></div></td></tr>
     <tr class="Body1"><td><div align="center"><a href="#visualizar">Para visualizar um chamado espec&iacute;fico</a></div></td></tr>
     <tr class="Body1"><td><div align="center"><a href="#nota">Para colocar uma nota adicional em um chamado aberto</a></div></td></tr>
     <tr class="Body1"><td><div align="center"><a href="#senha">Para trocar sua senha </a></div></td></tr>
  </table>  
  <br />
  <br />
  <table align="center">     
		<tr class="Body1">
		  <td><a href="default.asp">MENU INICIAL </a>| </td>
		  <td><a href="javascript:history.go(-1)">VOLTAR</a></td></tr>	
  </table>
		
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table align="center" class="Normal">
        <tr class="Head2">
          <td><a id="novo" name="novo"></a>Para enviar um novo problema</td>
		</tr>
		<tr class="Body1">
          <td><ul>
      <li>Fa&ccedil;a o logon com seu usu&aacute;rio e senha.</li>
      <li>No menu inicial clique em &ldquo;enviar novo problema&rdquo;</li>
      <li>Selecione o setor onde voc&ecirc; trabalha. </li>
      <li>Selecione a Categoria do problema ( )</li>
      <li>No campo &ldquo;Descri&ccedil;&atilde;o&rdquo; acrescente coment&aacute;rios sobre o problema.</li>
      <li>Para limpar o formul&aacute;rio inteiro clique em &ldquo;Limpar&rdquo;.</li>
      <li>Clique em &ldquo;Enviar problema&rdquo; para seu chamado ser enviado.</li>
      <li>Aparecer&aacute; um formul&aacute;rio avisando que o problema com seu c&oacute;digo espec&iacute;fico   foi enviado.</li>
      <li>Clique em &ldquo;Menu&rdquo; para voltar ao menu inicial.</li>
      <li>Clique em &ldquo;Desconectar&rdquo; para fazer o logoff.</li>
      </ul>
     <p><a href="manuais/novo_problema.avi" title="Download movie">Ou assita ou v&iacute;deo.</p>
          <p align="right" class="style1"><a href="#topo">Topo</a></p></td>
  </table>
    
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table align="center" class="Normal">
      <tr class="Head2">
        <td><a id="categoria" name="categoria"></a>Defini&ccedil;&otilde;es de categorias </td>
      </tr>
      <tr class="Body1">
        <td>
        	<p><strong>Alvenaria</strong></p>
        	<ul>
          		<li>Reboco em paredes, muros, etc.</li>
		        <li>Assentamento de tijplos e blocos.</li>
          		<li>Impermeabilza&ccedil;&atilde;o em geral.</li>
        	</ul>
            <br/>
        	<p><strong>Carpintaria</strong></p>
         	<ul>
              	<li>Madeiramento.</li>
            </ul>
            <br />
            <p><strong>El&eacute;trica</strong></p>
          	<ul>
            	<li>Troca de  l&acirc;mpadas.</li>
              	<li>Instala&ccedil;&atilde;o de interruptores.</li>
              	<li>Ilumina&ccedil;&atilde;o de emerg&ecirc;ncia.</li>
            </ul>
            <br/>
            <p><strong>Geral</strong></p>
            <ul>
            	<li>Pesquisa de materiais como pre&ccedil;o, qualidade, tipo, quantidade e descri&ccedil;&atilde;o.</li>
              	<li>Compra dos materiais.</li>
              	<li>Limpeza.</li>
              	<li>Organiza&ccedil;&atilde;o / Conserva&ccedil;&atilde;o.</li>
                <li>Itens que não entram em classificações anteriores.</li>
            </ul>
            <br />
            <p><strong>Hidr&aacute;ulica</strong></p>
            <ul>
            	<li>Conserto de vazamentos em tubula&ccedil;&otilde;es.</li>
              	<li>Troca de reparo em v&aacute;lvulas de descarga.</li>
              	<li>Troca de v&aacute;lvulas de descargas, torneiras, registro, etc.</li>
              	<li>Calhas e rufos.</li>
          	</ul>
            <br />
            <p><strong>Jardinagem</strong></p>
            <ul>
            	<li>Corte de grama.</li>
            </ul>
            <br />
          	<p><strong>Manuten&ccedil;&atilde;o de equipamentos</strong></p>
            <ul>
            	<li>Microondas.</li>
              	<li>Geladeiras.</li>
	        </ul>
            <br />
            <p><strong>Marcenaria</strong></p>
          	<ul>
              	<li>Troca de fechaduras e puxadores.</li>
              	<li>Troca de folha de porta.</li>
              	<li>Confec&ccedil;&atilde;o de molduras.</li>
              	<li>Colagem de folha de revestimento como f&oacute;rmica, post formic e l&acirc;mina de madeira.</li>
              	<li>Polimento com cera / verniz.</li>
              	<li>Cord&otilde;es de acabamento.</li>
            </ul>
            <br />
            <p><strong>Pintura</strong></p>
            <ul>
              	<li>Aplica&ccedil;&atilde;o de verniz.</li>
              	<li>Aplica&ccedil;&atilde;o de latex acr&iacute;lico e a base d'agua.</li>
              	<li>Esmalte e tinta &agrave; &oacute;leo em madeiras, portas, janelas, grades, etc.</li>
              	<li>Cria&ccedil;&atilde;o a base de cal. </li>
          	</ul>            
            <br />
          	<p><strong>Serralheria</strong></p>
            <ul>
              	<li>Consertos gerais. </li>
          	</ul>
            <br/>
        	<p><strong>Telhado</strong></p>          
            <ul>
            	<li>Vazamentos.</li>
            </ul>
            <p align="right" class="style1"><a href="#topo">Topo</a></p></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table align="center" class="Normal">
        <tr class="Head2">
          <td><a id="lista" name="lista"></a>Para ver a lista de problemas</td>
		</tr>
		<tr class="Body1">
          <td><ul>
      <li>Fa&ccedil;a o logon com seu usu&aacute;rio e senha</li>
      <li>No menu inicial clique em &ldquo;Ver lista de problemas&rdquo;</li>
      <li>Aparecer&aacute; a lista com todos os chamados abertos com o ID, Categoria,   Nomeado, Data de envio e Estado</li>
      <li>Clique em &ldquo;Menu&rdquo; para voltar ao menu inicial</li>
      <li>Clique em &ldquo;Desconectar&rdquo; para fazer o logoff<br />
          </li>
      </ul>
	   <p align="right" class="style1"><a href="#topo">Topo</a></p></td>
	</tr></table>
	
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table align="center" class="Normal">
        <tr class="Head2">
          <td><a id="visualizar" name="visualizar"></a>Para vizualizar um chamado   espec&iacute;fico</td>
		</tr>
		<tr class="Body1">
          <td><ul>
      <li>Fa&ccedil;a o logon com seu usu&aacute;rio e senha.</li>
      <li>Digite o n&uacute;mero do chamado.</li>
      <li>Clique em &ldquo;Abrir um ID espec&iacute;fico&rdquo;.</li>
      <li>Clique em &ldquo;Listar os problemas&rdquo; para ver todos os problemas deste   usu&aacute;rio.</li>
      <li>Clique em &ldquo;Menu&rdquo; para voltar ao menu inicial.</li>
      <li>Clique em &ldquo;Desconectar&rdquo; para fazer o logoff.</li>
    </ul>
	 <p align="right" class="style1"><a href="#topo">Topo</a></p></td>
	</tr></table>
	
   <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table align="center" class="Normal">
        <tr class="Head2">
          <td><a id="nota" name="nota"></a>Para colocar uma nota adicional em um chamado aberto</td>
   </tr>
		<tr class="Body1">
          <td><ul>
      <li>Fa&ccedil;a o logon com seu usu&aacute;rio e senha.</li>
      <li>No menu inicial clique em &ldquo;Ver lista de problemas&rdquo;.</li>
      <li>Aparecer&aacute; a lista com todos os chamados abertos com o ID, Categoria,   Nomeado, Data de envio e Estado.</li>
      <li>Clique no campo Categoria do chamado desejado.</li>
      <li>Digite sua nota adicional no campo &ldquo;Proporcionar notas adicionais&rdquo;.</li>
      <li>Clique em &ldquo;Limpar as altera&ccedil;&otilde;es&rdquo; para apagar toda a anota&ccedil;&atilde;o adicional   digitada.</li>
      <li>Clique em &ldquo;Atualizar problemas&rdquo; para enviar as anota&ccedil;&otilde;es adicionais.</li>
      <li>Clique em &ldquo;Menu&rdquo; para voltar ao menu inicial.</li>
      <li>Clique em &ldquo;Desconectar&rdquo; para fazer o logoff.</li>
    </ul>
	 <p align="right" class="style1"><a href="#topo">Topo</a></p></td>
	</tr></table>
	
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table align="center" class="Normal">
        <tr class="Head2">
          <td><a id="senha" name="senha"></a>Para trocar sua senha</td>
	  </tr>
		<tr class="Body1">
          <td><ul>
      <li>Fa&ccedil;a o logon com seu usu&aacute;rio e senha.</li>
      <li>No menu inicial clique em Editar Informa&ccedil;&otilde;es.</li>
      <li>No campo &quot;Senha anterior&quot; digite sua senha atual.</li>
      <li>No campo &quot;Senha&quot; digite sua nova senha.</li>
      <li>No campo &quot;Confirme senha&quot; repita sua nova senha para confirma&ccedil;&atilde;o.</li>
      <li>Clique em &quot;Enviar&quot;.</li>
      <li>Aparecer&aacute; o aviso que sua conta foi atualizada.</li>
      <li>Clique em &ldquo;Menu Principal &rdquo; para voltar ao menu inicial.</li>
      <li>Clique em &ldquo;Desconectar&rdquo; para fazer o logoff. </li>
    </ul>
	 <p align="right" class="style1"><a href="#topo">Topo</a></p></td>
	</tr></table>
    <p><strong><br />
    </strong></p>
    <p>&nbsp;  </p>
  </body>
</html>