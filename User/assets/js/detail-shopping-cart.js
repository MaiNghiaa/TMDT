const plus = document.querySelector(".plus"),
    minus = document.querySelector(".minus"),
    num = document.querySelector(".num");

    let a = 1;

    plus.addEventListener("click", ()=>{
        a++;
        a = (a < 100) ? a : a;
        num.innerText = (a * 0.5) + " kg";
        console.log(a);

    });

    

    minus.addEventListener("click", ()=>{
        if(a > 1){
            a--;
            a = (a < 100) ? a : a;
        num.innerText = (a * 0.5) + " kg";
        }
        
    }); 