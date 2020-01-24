package com.conn;

import java.io.File;
import java.io.IOException;
import java.io.RandomAccessFile;
import java.sql.*;
import java.util.Scanner;

public class MyClass {
	public static String nameoc;
	
	public static String getNameoc() {
		return nameoc;
	}

	public  void setNameoc(String nameoc) throws IOException {
		this.nameoc = nameoc;
		main(null);
		System.out.println(nameoc);
	}

	public static void main(String[] args) throws IOException {
		// TODO Auto-generated method stub
	
		String url = "jdbc:postgresql://localhost/postgres";
		Connection con;
		ResultSet rs;
		String s,line,crst="create table admin(";
		String[] col = new String[101];
		String[][] val = new String[101][101];
		
		s=getNameoc();
		int flag = 0,colno=0,rowno=-1,i=0;
		try {
		File file = new File(s);
		
        RandomAccessFile raf = new RandomAccessFile(file, "rw"); 
		while (raf.getFilePointer() < raf.length()) { 
			  
            // reading line from the file. 
            line = raf.readLine(); 
            String[] arrOfStr = line.split(","); 
            
            for (String a : arrOfStr) 
            {
            	if(flag == 0)
            	{
            		col[colno++]=a;
            		if(colno==1) crst=crst+a;
            		else crst=crst+','+a;
            		System.out.print(col[colno-1]+" ");
            	}
            	else 
            	{
            		val[rowno][i++]=a;
            		System.out.print(val[rowno][i-1]+" ");
            	}
            }
            i=0;
            rowno++;
            flag=1;
            System.out.println();
         
        } 
		}
		catch (IOException ioe) 
        { 

            System.out.println(ioe); 
        }
		crst+=')';
		System.out.println(crst);
        
/*
		try 
		{
			Class.forName("org.postgresql.Driver");
		} 
		catch(java.lang.ClassNotFoundException e) 
		{
			System.err.print("ClassNotFoundException: ");
			System.err.println(e.getMessage());
		}



		try
		{
			con = DriverManager.getConnection(url,"postgres", "est@1301");
			System.out.println("Connected");


			Statement st = con.createStatement();
			st.executeUpdate("drop table admin");
			st.executeUpdate("create table admin");
			
			

//			System.out.println("Rows are :");
//			while(rs.next())
//			{
//				s = rs.getString(1);
//  				System.out.println(rs);
//			}
			
//     		rs.close();
			st.close();
			con.close();



		} 
		catch(SQLException ex) 
		{
			System.err.println("SQLException: " + ex.getMessage());
		}
		*/
	}

}
