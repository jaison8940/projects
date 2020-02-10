import java.io.File;
import java.io.FileInputStream;
import java.io.IOException;
import java.io.OutputStream;
import java.io.InputStream;
import java.io.OutputStreamWriter;

import javax.servlet.ServletContext;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;



public class DownloadFileServlet extends HttpServlet {
 static {
		try {
		System.load("C:\\Program Files (x86)\\Apache Software Foundation\\Tomcat 8.5_Tomcatt8\\webapps\\egl\\WEB-INF\\classes\\Project2.dll");
		}
		catch(Exception e) {
			System.out.println("Load error"+e);
		}
		
	}
	private native int export(String str,String db);
    protected void doGet(HttpServletRequest request,
            HttpServletResponse response) throws ServletException, IOException {
				
		String dboption = request.getParameter("dboption");
		String foption = request.getParameter("foption");
		int r= new DownloadFileServlet().export(foption,dboption);
	   System.out.println(r);
	   
        // reads input file from an absolute path
         String filePath = "E://sample."+foption;
        File downloadFile = new File(filePath);
        FileInputStream inStream = new FileInputStream(downloadFile);
         
        // if you want to use a relative path to context root:
        String relativePath = getServletContext().getRealPath("");
        System.out.println("relativePath = " + relativePath);
         
        // obtains ServletContext
        ServletContext context = getServletContext();
         
        // gets MIME type of the file
        String mimeType = context.getMimeType(filePath);
        if (mimeType == null) {        
            // set to binary type if MIME mapping not found
            mimeType = "application/octet-stream";
        }
        System.out.println("MIME type: " + mimeType);
         
        // modifies response
        response.setContentType(mimeType);
        response.setContentLength((int) downloadFile.length());
         
        // forces download
        String headerKey = "Content-Disposition";
        String headerValue = String.format("attachment; filename=\"%s\"", "data."+foption);
        response.setHeader(headerKey, headerValue);
         
        // obtains response's output stream
        OutputStream outStream = response.getOutputStream();
         
        byte[] buffer = new byte[4096];
        int bytesRead = -1;
         
        while ((bytesRead = inStream.read(buffer)) != -1) {
            outStream.write(buffer, 0, bytesRead);
        }
         
        inStream.close();
        outStream.close();     
       
	   
    }
}
//javac -cp "C:\Program Files (x86)\Apache Software Foundation\Tomcat 8.5_Tomcatt8\lib\servlet-api.jar" -d "../WEB-INF/classes/" -cp "C:\Program Files (x86)\Apache Software Foundation\Tomcat 8.5_Tomcatt8\lib\itextpdf-5.3.4.jar" -cp "C:\Program Files (x86)\Apache Software Foundation\Tomcat 8.5_Tomcatt8\lib\opencsv-2.3.jar" -cp "C:\Program Files (x86)\Apache Software Foundation\Tomcat 8.5_Tomcatt8\lib\commons-fileupload-1.2.2.jar" -cp "C:\Program Files (x86)\Apache Software Foundation\Tomcat 8.5_Tomcatt8\lib\commons-io-2.4.jar"  DownloadFileServlet.java
//javac -cp "C:\Program Files (x86)\Apache Software Foundation\Tomcat 8.5_Tomcatt8\lib\servlet-api.jar" -d "../WEB-INF/classes/"  DownloadFileServlet.java