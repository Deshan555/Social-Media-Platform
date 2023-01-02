let day = new Date();
let month = day.getMonth()+1;
let year = String(day.getFullYear());
let date = String(day.getDate()); 
let datePost = ' ';

if(month==1){month="Jan"}
if(month==2){month="Feb"}
if(month==3){month="Mar"}
if(month==4){month="Apr"}
if(month==5){month="May"}
if(month==6){month="Jun"}
if(month==7){month="Jul"}
if(month==8){month="Aug"}
if(month==9){month="Sep"}
if(month==10){month="Oct"}
if(month==11){month="Nov"}
if(month==12){month="Dec"}

if(date!=1 && date!=2 && date!=3 && date!=21 && date!=22 && date!=23 && date!=31)
{
    datePost="th";
}
else
{
    if(date<4)
    {
        if(date==1){datePost="st";}
        if(date==2){datePost="nd";}
        if(date==3){datePost="rd";}
    }
    else
    {
        if(date==31){datePost="st";}
        else
        {
            if(date==21){datePost="st";}
            if(date==22){datePost="nd";}
            if(date==23){datePost="rd";}
        }
    }  
}
         
let finalToday = date + datePost + " " + month +" " + year;
document.getElementById('dateToday').innerHTML = finalToday;