$(document).ready(function() {
    localStorage.clear();

    //----------------------------------------------practice links on start page
    $('.praticar_links').on('click', function(e) {
        e.preventDefault();
        var link = $(this).attr('data-href');
        $('.modal').addClass('top').show('slow');
        $('.modal a.forward').attr("href", "./begin?page=" + link);
    });

    //----------------------------------------------position will begin in 3, 2, 1
    let searchParams = new URLSearchParams(window.location.search)
    if (searchParams.has('page')) {
        let page = searchParams.get('page');
        let remSec = $(".secs h2"),
            countSec = 3;
        timer = setInterval(() => {
            if (countSec >= 0) {
                remSec.text(countSec--)
            } else {
                remSec.hide();
                $('.secs img').show();
                setTimeout(function() {
                    window.location.replace("../pos/" + page);
                }, 2000);
            }
        }, 1000);
    };

    //---------------------------------------------each position countdown will begin here
    var song1 = new Audio();
    var bell = document.createElement("source");
    bell.type = "audio/wav";
    bell.src = "../../assets/music/irelp-tibetan-singing-bowl-01.mp3";
    song1.appendChild(bell);

    var song2 = new Audio();
    var music = document.createElement("source");
    music.src = "../../assets/music/irelp-bg-music-01-5min.mp3";
    song2.appendChild(music);
    song2.loop = true;

    //-----------------------------------------------------------------check if music is off and display corresponding button
    if (localStorage.getItem('music') == 'off') {
        $(".sound-controls img:not(#sound-muted)").hide();
        $(".sound-controls #sound-muted").show();
    } else {
        $(".sound-controls img:not(#sound-muted)").show();
        $(".sound-controls #sound-muted").hide();
    }

    //-----------------------------------------------------------------turn the music and sound on/off
    $(".sound-controls #sound-active").on('click', function() {
        song2.volume = 0.0;
        localStorage.setItem("music", "off");
        $(".sound-controls #sound-active").hide();
        $(".sound-controls #sound-muted").show();

    })
    $(".sound-controls #sound-muted").on('click', function() {
        song2.volume = 1.0;
        localStorage.setItem("music", "on");
        $(".sound-controls #sound-muted").hide();
        $(".sound-controls #sound-active").show();
    })

    if (localStorage.getItem('music') == 'on') {
        song2.volume = 1.0;
        $(".sound-controls #sound-muted").hide();
        $(".sound-controls #sound-active").show();
    } else {
        song2.volume = 0.0;
        $(".sound-controls #sound-active").hide();
        $(".sound-controls #sound-muted").show();
    }

    //------------------------------------------------------------------------------------------------------------start position countdown
    $('#begin-position').on('click', function(e) {
        $('.play-pause').show('fast');
        $('#play').hide('fast');
        $('.close').show('fast');
        if (localStorage.getItem('music') == 'on') {
            song2.volume = 1.0;
            song1.play();
            setTimeout(function() {
                song2.play();
            }, 1000);
        } else {
            song2.volume = 0.0;
            song1.play();
            song2.play();
        }
        $(this).hide('fast');
        setTimeout(function() {
            $('.secs #disabled').attr('id', 'timer');
        }, 1500)
    })

    startTimer();

    function pauseTimer() {

    }

    let next_url = parseInt($(".secs p span").text()); //---------------------------------------------------------get the current position number
    localStorage.setItem('resetTimer', $('.secs .timekeep').text()); //-----------------------------------------------get the time for each position;

    function startTimer() {
        let presentTime = $('h2#timer').text();
        var timeArray = presentTime.split(":");
        var m = timeArray[0];
        var s = checkSecond((timeArray[1] - 1));
        if (s == 59) {
            m = m - 1
        }
        if (s == 1 && m == 0) {
            song1.play();
            song2.animate({ volume: 0.4 }, 1000);
        }

        if (m < 0) {
            next_url++;
            if (next_url <= 13) {
                $(".secs p span").text(next_url);
                $(".Posição.wrapper").addClass('pos' + next_url);
                $(".begin img").attr('srcset', '../../assets/images/' + next_url + '.png');
                $(".secs span.desc:not(#p" + next_url + ")").hide();
                $(".secs span.desc:not(#p" + next_url + ")").hide();
                $(".secs #p" + next_url).show();
                $('h2#timer').text(localStorage.getItem('resetTimer'));
                setTimeout(startTimer, 1000);
            } else {
                setTimeout(function() {
                    window.location = '../../end';
                }, 1000);
            }
            return
        }

        $('h2#timer').text(m + ":" + s);
        var interval = setTimeout(startTimer, 1000);

        $('#pause').on('click', function() { //--------------------------------------------------------------------------pause everything
            song2.pause()
            $(this).hide();
            $('#play').show()
            clearTimeout(interval);
        })
    }

    //-----------------------------------------------------------------------------------------------------------------resume everything
    $('#play').on('click', function() {
        song2.play()
        $(this).hide();
        $('#pause').show()
        setTimeout(startTimer, 1000);
    })

    //-----------------------------------------------------------------------------------------------------------------
    $(".close").on('click', function(e) {
        e.preventDefault();
        $('.modal').css('top', '0');
    })
    $(".close-return").on('click', function(e) {
        e.preventDefault();
        $('.modal').css('top', '110%');
    })


    function checkSecond(sec) {
        if (sec < 10 && sec >= 0) {
            sec = "0" + sec
        };
        //--------------------------------------------------------------------------------------------------------- add zero in front of numbers < 10
        if (sec < 0) {
            sec = "59"
        };
        return sec;
    }

    //-----------------------------------------------------------------------------------------------------------------keep screen awake
    var noSleep = new NoSleep();

    var wakeLockEnabled = false;
    // var toggleEl = $("document");
    document.addEventListener('click', function() {
        if (!wakeLockEnabled) {
            noSleep.enable(); // keep the screen on!
            wakeLockEnabled = true;
        } else {
            noSleep.disable(); // let the screen turn off.
            wakeLockEnabled = false;
        }
    }, false);

})