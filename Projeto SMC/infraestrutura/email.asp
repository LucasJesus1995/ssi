<input type="submit" value="<%
Set myMail=CreateObject("CDO.Message")
myMail.Subject="Sending email with CDO"
myMail.From="mymail@mydomain.com"
myMail.To="lgabriele@prefeitura.sp.gov.br"
myMail.TextBody="This is a message."
myMail.Send
set myMail=nothing
%>"/>
