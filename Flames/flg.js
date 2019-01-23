function print() {
	var item3 = desc.innerText;
	var item1 = document.getElementById("aa").value;
	var item2 = document.getElementById("bb").value;
	// alert(item3);
	// window.location.href = "http://localhost/flames.php?one="+item1+"&two="+item2+"&three="+item3;
    // alert(item);
}
function opepp() {
	document.querySelector('.popup').style.display = "flex";
	var dis1 = document.getElementById('con');
	var dis2 = document.getElementById('desc');
	var i;
	i=res();
	if(i==1) {
	dis1.innerHTML='<img src=\'friends.gif\' width=\"300px\">';
	dis2.innerHTML="FRIENDS";}
	else if(i==2) {
        dis1.innerHTML='<img src=\'lovers.gif\' width=\"200px\">';
	    dis2.innerHTML="LOVERS";
	}
	else if(i==3) {
        dis1.innerHTML='<img src=\'affection.gif\' width=\"150px\">';
	    dis2.innerHTML="AFFECTION";
	}
	else if(i==4) {
        dis1.innerHTML='<img src=\'marriage.gif\' width=\"300px\">';
	    dis2.innerText="MARRIAGE";
	}
	else if(i==5) {
        dis1.innerHTML='<img src=\'enemy.gif\' width=\"300px\">';
	    dis2.innerHTML="ENEMY";
	}
	else if(i==6) {
        dis1.innerHTML='<img src=\'sister.gif\' width=\"200px\">';
	    dis2.innerHTML="SISTER";
	}
	else {
         dis1.innerHTML='<img src=\'emoji.gif\' width=\"100px\">'; 
 		 dis2.innerHTML="Please enter names properly";
	}

}
function closepp() {
    document.querySelector('.popup').style.display = "none";
    print();
    document.getElementById("fls").reset();
}
function res()
{
	var j=document.lol.aa.value;
	var k=document.lol.bb.value;
  j=j.toLowerCase();
  k=k.toLowerCase();
  //alert(j);
	var i=0,m,nn=0,n,count=0,sn=[],fn=[],l=0;
	for(n=0;n<k.length;n++)
	{
          if(k[n]!=' ')
           sn[nn++]=k[n];
	}
  for(n=0;n<j.length;n++)
  {
          if(j[n]!=' ')
           fn[l++]=j[n];
  }
  //alert(fn);
	for(m=0;m<l;m++)
	{
		for(n=0;n<nn;n++)
		{
			if(fn[m]==sn[n] && sn[n]!='*')
			{
				i++;
				sn[n]="*";
				// alert(k[n]);
				break;
			}
		}
   }
   // document.write(j);
   // document.write(k);
   //alert(sn);
   i=fn.length+sn.length-2*i;
   // alert(i);
   // /*
   if(i==0 || j.length==0 || k.length==0){ return 0;}
   else{
   var r=0,e,ct=0,x=0,st=0,ii;
   var fll=['F','L','A','M','E','S'];
    // alert(fll[0]);
   while(r<100)
   {
   	  x=0;
   	  ct=0;
   	  for(e=st;e<=5;e++)
   	  {
   	  	if(fll[e]!='*'){
             ct++;
   	  	}
   	  	if(ct==i) {
   	  		fll[e]='*';
   	  		st=e+1;
   	  		break;
   	  	}
   	  	if(e==5){
   	  		e=-1;
   	  	}
   	  }
   	  if(st>5){
   	  	st=0;
   	  }
      for(e=0;e<=5;e++)
      	if(fll[e]=='*')
      	{
            x++;
      	}
      	else ii=e;
      	if(x==5){
            if(ii==0) return 1;
            else if(ii==1) return 2;
            else if(ii==2) return 3;
            else if(ii==3) return 4;
            else if(ii==4) return 5;
            else return 6;
      		break;
      	}
   	  r++;
   }
  }
// alert(fll);
};
