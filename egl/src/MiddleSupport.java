import java.io.*;  
import javax.servlet.*;  
import javax.servlet.http.*;  


public class MiddleSupport extends HttpServlet{  


private native int importx(String str,String db);
public void doGet(HttpServletRequest req,HttpServletResponse res)  
throws ServletException,IOException  
{  
   //res.setContentType("text/html");  
   
   String str = req.getParameter("opt");
   req.getSession().setAttribute("result","");
   req.getSession().setAttribute("option",str);
   if(str.equals("Import"))
   req.getRequestDispatcher("res.jsp").forward(req, res);
   else 
   req.getRequestDispatcher("expres.jsp").forward(req, res);

   

  

  
    
}}  
//C:\Program Files (x86)\Apache Software Foundation\Tomcat 8.5_Tomcatt8\webapps\egl\WEB-INF\classes\tomcatdll\Release
// C:\\Program Files (x86)\\Apache Software Foundation\\Tomcat 8.5_Tomcatt8\\webapps\\egl\\WEB-INF\\classes\\tomcatdll\\Debug\\TOMCATDLL.dll 
// C:\\Program Files (x86)\\Apache Software Foundation\\Tomcat 8.5_Tomcatt8\\webapps\\egl\\WEB-INF\\classes\\Project2.dll
//http://localhost:8080/ImpandExp/eg.jsp
//javac -cp "C:\Program Files (x86)\Apache Software Foundation\Tomcat 8.5_Tomcatt8\lib\servlet-api.jar" -d "../WEB-INF/classes/"  Middle.java
//javac  -cp "C:\Program Files (x86)\Apache Software Foundation\Tomcat 8.5_Tomcatt8\lib\servlet-api.jar" -d "../WEB-INF/classes/"  -h .  Middle.java
//javac -cp "C:\Program Files (x86)\Apache Software Foundation\Tomcat 8.5_Tomcatt8\lib\servlet-api.jar" -d "../WEB-INF/classes/"  MiddleSupport.java