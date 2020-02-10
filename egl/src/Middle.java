import java.io.*;  
import javax.servlet.*;  
import javax.servlet.http.*;  


public class Middle extends HttpServlet{  

static {
		try {
		System.load("C:\\Program Files (x86)\\Apache Software Foundation\\Tomcat 8.5_Tomcatt8\\webapps\\egl\\WEB-INF\\classes\\Project2.dll");
		}
		catch(Exception e) {
			System.out.println("Load error"+e);
		}
		
	}
	
private native int importx(String str,String db);
public void doGet(HttpServletRequest req,HttpServletResponse res)  
throws ServletException,IOException  
{  
   //res.setContentType("text/html");  
   String str = req.getSession().getAttribute("option").toString();
   String fname=req.getParameter("fname"); 
   String dboption = req.getParameter("dboption"); 
   PrintWriter out=res.getWriter(); 

   if(str.equals("Import"))
   {
	   int r= new Middle().importx(fname,dboption);
	   System.out.println(r);
	   if(r == 1)
		   req.getSession().setAttribute("result","Imported Successfully");
       else 
		   req.getSession().setAttribute("result","Error Occurred");
   }
   req.getRequestDispatcher("res.jsp").forward(req, res);
  
out.close();  
}}  
//C:\Program Files (x86)\Apache Software Foundation\Tomcat 8.5_Tomcatt8\webapps\egl\WEB-INF\classes\tomcatdll\Release
// C:\\Program Files (x86)\\Apache Software Foundation\\Tomcat 8.5_Tomcatt8\\webapps\\egl\\WEB-INF\\classes\\tomcatdll\\Debug\\TOMCATDLL.dll 
// C:\\Program Files (x86)\\Apache Software Foundation\\Tomcat 8.5_Tomcatt8\\webapps\\egl\\WEB-INF\\classes\\Project2.dll
//http://localhost:8080/ImpandExp/eg.jsp
//javac -cp "C:\Program Files (x86)\Apache Software Foundation\Tomcat 8.5_Tomcatt8\lib\servlet-api.jar" -d "../WEB-INF/classes/"  Middle.java
//javac  -cp "C:\Program Files (x86)\Apache Software Foundation\Tomcat 8.5_Tomcatt8\lib\servlet-api.jar" -d "../WEB-INF/classes/"  -h .  Middle.java