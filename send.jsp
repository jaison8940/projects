<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Choose csv file</title>
</head>
<body>
Choose csv file to import to postgresdb!
<form action="imp.jsp">
<br><br>
<input type="file" name="fname"/>
<br/>  
<br>
<button type="submit">submit</button>
</form>
<a href="NewFile.jsp">Go to main page</a>  

</body>
</html>