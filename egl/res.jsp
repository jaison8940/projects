<%@ page language="java" contentType="text/html; charset=ISO-8859-1" pageEncoding="ISO-8859-1"%>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Choose file</title>
</head>
<body>
<h2><%
try{
out.println(request.getSession().getAttribute("result").toString());
}
catch(Exception e)
{
	out.println("");
}
 %></h2>
<form action="mid">
<br><br>
<input type="file" name="fname"/>
<br/><br>
Select Database:
<select name="dboption">
  <option value="postgres">PostgresDB</option>
  <option value="mysql">MySQLDB</option>
</select>
<br><br>

<button type="submit">submit</button>
</form>
<br>
<a href="ind.jsp">Go to main page</a>  

</body>
</html>
