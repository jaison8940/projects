/* Replace "dll.h" with the name of your header */
#include<Middle.h>
#include<DownloadFileServlet.h>
#include <windows.h>
#include<libpq-fe.h>
#include<mysql.h>
#include<iostream>
#include <fstream>
#include<sstream>
#include<string>
using namespace std;

JNIEXPORT jint JNICALL Java_Middle_importx
  (JNIEnv *env, jobject, jstring fn, jstring dn){
  	cout<<"Hello for connecting";
  	try {
        jboolean blnIsCopy;
        const char* strCIn = (env)->GetStringUTFChars(fn, &blnIsCopy);
        string fn = "C:\\Program Files (x86)\\Apache Software Foundation\\Tomcat 8.5_Tomcatt8\\webapps\\egl\\inputandoutput\\";
        fn = fn + strCIn;
		const char* dbname = (env)->GetStringUTFChars(dn, &blnIsCopy);
        cout << fn<<" "<<dbname;
        string dbn=dbname;
        PGconn* dbconn;
         MYSQL* conn;
        if(dbn == "postgres")
        {
		
	        
	
	        dbconn = PQconnectdb("dbname = postgres host = localhost user = postgres password = est");
	
	        if (PQstatus(dbconn) == CONNECTION_BAD) {
	            cout << "Unable to connect to database\n" << endl;
	
	        }
	        else {
	            cout << "Connected to perform import to postgresdb" << endl;
	
	        }
	        
        }
        else if(dbn == "mysql") 
		{
        	
             conn = mysql_init(0);
             conn = mysql_real_connect(conn,"172.22.112.228","jai","jai","admin",0,NULL,0);
			    if(conn)
			        cout<<"Connected"<<endl;
			    else cout<<"Not connected"<<endl;
			    
   
		}
        
        if(dbn == "postgres") PQexec(dbconn, "drop table admin");
        else if(dbn == "mysql") mysql_query(conn, "drop table admin");
        
        
        PGresult* queryres;
        fstream file;
        file.open(fn.c_str(), ios::in);
        string line, t, c[101], v[101][101];
        int flag = 0, i = 0, j = 0, cl = 0, rl = -1, tempf = 0;
        stringstream ct;
        ct << "create table admin(";
        while (getline(file, line)) {
            stringstream s(line);
            while (getline(s, t, ',')) {
                if (flag == 0)
                {
                    c[cl++] = t;
                    if (tempf == 0) ct << t << " text";
                    else ct << "," << t << " text";
                    tempf = 1;
                }
                else {
                    v[rl][i++] = t;
                }
            }
            i = 0;
            rl++;
            flag = 1;

        }
        ct << ")";
        string qry = ct.str();
        const char* q = qry.c_str();

		if(dbn == "postgres") PQexec(dbconn, q);
        else if(dbn == "mysql") mysql_query(conn, q);
        
		
		
        i = 0;
        file.close();
        
        stringstream ss;
        ss << "INSERT INTO admin(";
        while (i < cl)
        {
            if (i < cl - 1)
                ss << c[i] << ",";
            else ss << c[i] << ") VALUES(";
            i++;
        }
        i = 0;

        for (i = 0; i < rl; i++)
        {
            stringstream val;
            for (j = 0; j < cl; j++)
            {
                if (j < cl - 1) val << "\'" << v[i][j] << "\',";
                else val << "\'" << v[i][j] << "\'" << ")";
            }

            stringstream temp;
            temp << ss.str();
            temp << val.str();
            string query = temp.str();
            const char* q = query.c_str();
            //PQexec(dbconn, q);
			if(dbn == "postgres") PQexec(dbconn, q);
            else if(dbn == "mysql") mysql_query(conn, q);
        }

        cout << "Imported to postgresdb from " << strCIn << " file" << endl;

        file.close();
       
        
        if(dbn == "postgres")  PQfinish(dbconn);
        else if(dbn == "mysql") mysql_close(conn);

        return 1;

    }
    catch (...)
    {
        return 0;
    }
  }
  
  JNIEXPORT jint JNICALL Java_DownloadFileServlet_export
  (JNIEnv *env, jobject, jstring fo, jstring db){
  	jboolean blnIsCopy;
    const char* ft = (env)->GetStringUTFChars(fo, &blnIsCopy);
    const char* dbn = (env)->GetStringUTFChars(db, &blnIsCopy);
    string filetype=ft,dbname=dbn;
    cout<<filetype<<" "<<dbname;
    
    PGconn* dbconn;
    MYSQL* conn;
         
       if(dbname == "postgres")
       {
		
	        
	
	        dbconn = PQconnectdb("dbname = postgres host = localhost user = postgres password = est");
	
	        if (PQstatus(dbconn) == CONNECTION_BAD) {
	            cout << "Unable to connect to pg database\n" << endl;
	
	        }
	        else {
	            cout << "Connected to postgresdb" << endl;
	
	        }
	        
        }
        else if(dbname == "mysql") 
		{
        	
             conn = mysql_init(0);
             conn = mysql_real_connect(conn,"172.22.112.228","jai","jai","admin",0,NULL,0);
			    if(conn)
			        cout<<"Connected to mysqldb"<<endl;
			    else cout<<"Not connected to mysqldb"<<endl;
			    
   
		}
		
		fstream fio; 
        string filet="E:\\sample."+filetype;
        cout<<filetype<<endl;
        fio.open(filet.c_str(),ios::out | ios::trunc); 
        if(filetype == "html")
        fio<<"<!DOCTYPE html>\n<html>\n<head>\n<style>\ntable, th, td {  border: 1px solid black;}\n</style>\n</head>\n<body>\n<table>\n";
    
	   
		MYSQL_ROW row;
        MYSQL_RES* res;
        int r = 0, j;
        PGresult* queryres;
        if(dbname == "postgres"){
		
	        queryres = PQexec(dbconn, "select * from admin");
	        stringstream noofrows(PQcmdTuples(queryres));
	        noofrows >> r;
	    }
	    else if(dbname == "mysql"){
	    	int q = mysql_query(conn, "select count(*) from admin");
	 
	    	if(!q)
	    	{
	    		res = mysql_store_result(conn);
	    		 while(row = mysql_fetch_row(res)){
//	    		 	cout<<"--"<<row[0]<<"--";
	    		 	r=atoi(row[0]);
	    		 }
			}
			
		}
	    cout<<r<<endl;

        
        
        int i = 0, cl = 0;
        if(dbname == "postgres"){
		
	        PGresult* qry = PQexec(dbconn, "SELECT column_name FROM information_schema.columns WHERE table_schema = 'public'  AND table_name   = 'admin'");
	        stringstream noofcols(PQcmdTuples(qry));
	        noofcols >> cl;
	        while (i < cl)
	        {
	        	if(filetype == "html")
	        	{
	        		if(i==0) fio<<"<tr>\n";
	        		fio<<"<th>" << PQgetvalue(qry, i, 0) << "</th>\n";
	        		if(i==cl-1) fio<<"</tr>\n";
				}
				else{
				
		            if (i < cl - 1) fio << PQgetvalue(qry, i, 0) << ",";
		            else fio << PQgetvalue(qry, i, 0);
		        }
	            i++;
	        }
	        fio << endl;
	        for (i = 0; i < r; i++)
	        {
	            for (j = 0; j < cl; j++)
	            {
	                
	                
	                if(filetype == "html")
		        	{
		        		if(j==0) fio<<"<tr>\n";
		        		fio<<"<td>" << PQgetvalue(queryres, i, j) << "</td>\n";
		        		if(j==cl-1) fio<<"</tr>\n";
					}
					else{
					
			            if (j < cl - 1) fio << PQgetvalue(queryres, i, j) << ",";
			            else fio <<PQgetvalue(queryres, i, j);
			        }
	            }
	
	        }
	    }
	    else if(dbname == "mysql"){
	    	int q = mysql_query(conn, "SELECT count(column_name) FROM information_schema.columns WHERE table_schema = 'admin'  AND table_name   = 'admin'");
	    
	    	if(!q)
	    	{
	    		res = mysql_store_result(conn);
	    		 while(row = mysql_fetch_row(res)){
	    		 	cl=atoi(row[0]);
	    		 }
			}
			
			q = mysql_query(conn, "SELECT column_name FROM information_schema.columns WHERE table_schema = 'admin'  AND table_name   = 'admin'");
	        int flg=0;
	        if(filetype == "html") fio<<"<tr>\n";
	    	if(!q)
	    	{
	    		
	    		res = mysql_store_result(conn);
	    		 while(row = mysql_fetch_row(res)){
	    		 	if(filetype == "html")
	    		 	{
	    		 		
		        		fio<<"<th>" << row[0] << "</th>\n";
	    		    }
	    		    else if(filetype == "csv"){
					    cout<<"came in"<<row[0];
					  	if(flg == 0) fio<<row[0];
		    		 	else fio<<","<<row[0];
		    		 }
	    		 	flg=1;
	    		 }
			}
			if(filetype == "html") fio<<"</tr>\n";
			fio<<endl;
			q = mysql_query(conn, "select * from admin");
			if(!q)
			{
				cout<<"came in";
				res = mysql_store_result(conn);
				while(row = mysql_fetch_row(res))
		        {
		            for (j = 0; j < cl; j++)
		            {
		            	if(filetype == "html")
			        	{
			        		if(j==0) fio<<"<tr>\n";
			        		fio<<"<td>" << row[j] << "</td>\n";
			        		if(j==cl-1) fio<<"</tr>\n";
						}
						else if(filetype == "csv"){
						
			                if (j < cl - 1) fio << row[j] << ",";
			                else fio << row[j] << endl;
		                }
		            }
		
		        }
		    }
			
		}
		cout<<cl;
        if(filetype == "html") fio<<"\n</table>\n</body>\n</html>";
        fio.close(); 
        if(dbname == "postgres")  PQfinish(dbconn);
        else if(dbname == "mysql") mysql_close(conn);
    
  	return 2;
  }

