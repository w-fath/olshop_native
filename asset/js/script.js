$(document).ready(function() {
    $('#menu-toggle').click(function() {
        $('#wrapper').toggleClass('toggled');
    });
});
document.addEventListener("DOMContentLoaded", function() {
    const text1 = "Selamat Datang Kawan, Silahkan Download Source Keinginan Kalian";
    const text2 = "GRATIS!!";
    const text3 = "Jangan Lupa Support Terus Tim Kami";
    const text4 = "Subscribe Channel Youtube Kami : Tecno Code";
    const text5 = "Kalau ada yang mau donasi kami tidak menolak kok!";
    const text6 = "😁😁😁😁😁😁";
    let i = 0;
    let textIndex = 1;
    const speed = 100; 
    function typeWriter(text, callback) {
        if (i < text.length) {
            document.getElementById("animated-text").innerHTML += text.charAt(i);
            i++;
            setTimeout(() => typeWriter(text, callback), speed);
        } else {
            i = 0;
            setTimeout(callback, 500);
        }
    }
    function startTyping() {
        if (textIndex === 1) {
            typeWriter(text1, () => {
                textIndex = 2;
                document.getElementById("animated-text").innerHTML = "";
                startTyping();
            });
        } else if (textIndex === 2) {
            typeWriter(text2, () => {
                textIndex = 3;
                document.getElementById("animated-text").innerHTML = "";
                startTyping();
            });
        } else if (textIndex === 3) {
            typeWriter(text3, () => {
                textIndex = 4;
                document.getElementById("animated-text").innerHTML = "";
                startTyping();
            });
        } else if (textIndex === 4) {
            typeWriter(text4, () => {
                textIndex = 5;
                document.getElementById("animated-text").innerHTML = "";
                startTyping();
            });
        }else if (textIndex === 5) {
            typeWriter(text5, () => {
                textIndex = 6;
                document.getElementById("animated-text").innerHTML = "";
                startTyping();
            });
        }else if (textIndex === 6) {
            typeWriter(text6, () => {
                textIndex = 1;
                document.getElementById("animated-text").innerHTML = "";
                startTyping();
            });
        }
    }
    startTyping();
});