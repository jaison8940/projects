// ConsoleApplication2.cpp : This file contains the 'main' function. Program execution begins and ends there.
//

#include <iostream>
#include <fstream>
#include<sstream>
#include<string>
#include <libpq-fe.h>

using namespace std;

int main()
{
    //Import to postgresdb from input.csv file
    
    PGconn* dbconn;

    dbconn = PQconnectdb("dbname = postgres host = localhost user = postgres password = est@1301");
    if (PQstatus(dbconn) == CONNECTION_BAD) {
        cout << "Unable to connect to database"<<endl;
    }
    else {
        cout<<"connected to perform import to postgresdb from input.csv"<<endl;
    }
    PQexec(dbconn, "drop table admin");
   
  
   
   PGresult* queryres;
    fstream file;
    file.open("input.csv",ios::in);
    string line,t,c[101],v[101][101];
    int flag = 0,i=0,j=0,cl=0,rl=-1,tempf=0;
    stringstream ct;
    ct << "create table admin(";
    while (getline(file, line)) {
        stringstream s(line);
        while (getline(s, t, ',')) {
            if (flag == 0)
            {
                c[cl++] = t;
                if (tempf == 0) ct << t<<" text";
                else ct << "," << t<<" text";
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
    

    PQexec(dbconn, q);
   
    
    i = 0;
    file.close();
    stringstream ss;
    ss << "INSERT INTO admin(";
    while (i<cl)
    {
        if (i < cl - 1)
            ss << c[i] << ",";
        else ss << c[i]<<") VALUES(";
        i++;
    }
    i = 0;
    
    for (i = 0; i < rl; i++)
    {
        stringstream val;
        for (j = 0; j < cl; j++)
        {
            if (j < cl - 1) val<<"\'"<< v[i][j] <<"\',";
            else val<<"\'" << v[i][j]<<"\'" << ")";
        }
     //   cout << val.str()<<endl;
        stringstream temp;
        temp << ss.str();
        temp << val.str();
        string query = temp.str();
        const char* q = query.c_str();
        PQexec(dbconn, q);
        
       
      
    }
 
    cout << "Imported to postgresdb from input.csv file"<<endl;
    file.close();
    PQfinish(dbconn);

    //Export to output.csv file from postgresdb

    dbconn = PQconnectdb("dbname = postgres host = localhost user = postgres password = est@1301");

    if (PQstatus(dbconn) == CONNECTION_BAD) {
        cout<<"Unable to connect to database\n"<<endl;
    }
    else {
        cout<<"Connected to perform export to output.csv from postgresdb"<<endl;
    }

    int r = 0;
    queryres = PQexec(dbconn, "select * from admin");
    stringstream noofrows(PQcmdTuples(queryres));
    noofrows>> r;

   ofstream fout;
   fout.open("output.csv", ios::trunc);
   fout.close();
   fout.open("output.csv", ios::app);
   i = 0;
   while (i < cl)
   {
       if (i < cl - 1) fout << c[i] << ",";
       else fout << c[i];
       i++;
   }
   fout << endl;
  
    for (i = 0; i < r; i++)
    {
        for (j = 0; j < cl; j++)
        {
            if(j<cl-1) fout<<PQgetvalue(queryres, i, j)<<",";
            else fout << PQgetvalue(queryres, i, j)<<endl;
        }
        
    }
    fout.close();
    PQfinish(dbconn);
    cout << "Exported to output.csv file from postgresdb";
    
    
}

// Run program: Ctrl + F5 or Debug > Start Without Debugging menu
// Debug program: F5 or Debug > Start Debugging menu

// Tips for Getting Started: 
//   1. Use the Solution Explorer window to add/manage files
//   2. Use the Team Explorer window to connect to source control
//   3. Use the Output window to see build output and other messages
//   4. Use the Error List window to view errors
//   5. Go to Project > Add New Item to create new code files, or Project > Add Existing Item to add existing code files to the project
//   6. In the future, to open this project again, go to File > Open > Project and select the .sln file
