$(document).ready(function() {
    let minutes = 25;
    let seconds = 0;
    let countdownInterval;

    $("#startButton").click(function() {
        countdownInterval = setInterval(function() {
            if (seconds === 0) {
                minutes--;
                seconds = 59;
            } else {
                seconds--;
            }

            $("#minutes").text(minutes.toString().padStart(2, '0'));
            $("#seconds").text(seconds.toString().padStart(2, '0'));

            if (minutes === 0 && seconds === 0) {
                clearInterval(countdownInterval);
                // カウントダウン終了時の処理 (アラートを表示するなど)
                alert("終了しました！");
            }
        }, 1000);
    });
});