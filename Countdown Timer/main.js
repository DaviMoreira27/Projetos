const count = () => {
  const countDate = new Date("January 21, 2023, 00:00:00").getTime();
  const currentTime = new Date().getTime();

   
    
  const gap = countDate - currentTime;

  const second = 1000;
  const minute = second * 60;
  const hour = minute * 60;
  const day = hour * 24;


  const textDay = Math.floor(gap / day);
  const textHour = Math.floor((gap % day) / hour);
  const textMinute = Math.floor((gap % hour) / minute);
  const textSecond = Math.floor((gap % minute) / second);

  const dayExibe = document.getElementById("count-day").innerText = textDay;
  const hourExibe = document.getElementById("count-hour").innerText =
    textHour;
  const minuteExibe = document.getElementById("count-minute").innerText =
    textMinute;
  const secondExibe = document.getElementById("count-second").innerText =
        textSecond;
};

setInterval(count, 1000);
