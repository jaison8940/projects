<%@ page language="java" contentType="text/html; charset=ISO-8859-1" pageEncoding="ISO-8859-1"%>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Export</title>
</head>
<body>


<form action="dfs">
<br>
<h3>Select file format to download!</h3>
<br>
<select name="dboption">
  <option value="postgres">POSTGRES</option>
  <option value="mysql">MYSQL</option>
</select>
<br>
<br>
<select name="foption">
  <option value="csv">Csv</option>
  <option value="html">Html</option>
</select>
<br><br>
<button type="submit">submit</button>
</form>
<br>
<a href="ind.jsp">Go to main page</a>  

</body>
</html>
