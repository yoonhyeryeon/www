window.onload=function(){  //a=1,2,3 (파라미터)값이 넘어온다.  
    let list = document.getElementsByClassName('contlist');    
    let tabs1 = document.getElementById('tab1');
    let tabs2 = document.getElementById('tab2');
    let tabs3 = document.getElementById('tab3');
    let tabs4 = document.getElementById('tab4');
     
    let purl=window.location; //호출된 현재창의 주소  sub.html?a=1
    tmp=String(purl).split('?'); 
        //? 이후가 배열에 담김 a=1 (split가 ?이후로 앞 뒤로 나눌수 있다. )
    //tmp[0]='sub.html' , tmp[1]='a=1'

    
       if(tmp[1]!=undefined){
            tmp2=tmp[1].split('='); 
        //tmp2[0]='a'  , tmp2[1]='1'
  
    if(tmp2[1]==1){
        list[0].style.display='block'
        list[1].style.display='none'
        list[2].style.display='none'
        list[3].style.display='none'
        
    }else if(tmp2[1]==2){
        list[0].style.display='none'
        list[1].style.display='block'
        tabs1.classList.remove('on');
        tabs2.classList.add('on');
        
        
    }else if(tmp2[1]==3){
        list[0].style.display='none'
        list[1].style.display='none'
        list[2].style.display='block'
        list[3].style.display='none'
        tabs1.classList.remove('on');
        tabs3.classList.add('on');
        
    }else if(tmp2[1]==4){
        list[0].style.display='none'
        list[1].style.display='none'
        list[2].style.display='none'
        list[3].style.display='block'
        tabs1.classList.remove('on');
        tabs4.classList.add('on')
        
    }
        
    }
}