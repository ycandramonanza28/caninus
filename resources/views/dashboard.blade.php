@extends('layouts.backend.master')
@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Turret+Road:wght@200;300;400;500;700;800&display=swap');

        :root {
            --hue-color: 240;

            --first-color: hsl(var(--hue-color), 53%, 49%);
            --title-color: hsl(var(--hue-color), 53%, 15%);
            --text-color: hsl(var(--hue-color), 12%, 35%);
            --text-color-light: hsl(var(--hue-color), 12%, 65%);
            --white-color: #FFFFFF;
            --body-color: hsl(var(--hue-color), 24%, 94%);

            --body-font: 'Poppins', sans-serif;
            --signature-font: 'Turret Road', sans-serif;

            --biggest-font-size: 3rem;
            --small-font-size: .813rem;
            --smaller-font-size: .75rem;
            --tiny-font-size: .625rem;

            --font-medium: 500;

            --mb-0-25: .25rem;
            --mb-1: 1rem;
            --mb-1-5: 1.5rem;
            --mb-2-5: 2.5rem;

            --z-normal: 1;
            --z-tooltip: 10;
        }

        body.dark-theme {
            --title-color: hsl(var(--hue-color), 12%, 95%);
            --text-color: hsl(var(--hue-color), 12%, 75%);
            --body-color: hsl(var(--hue-color), 10%, 16%);
        }

        @media screen and (min-width: 968px) {
            :root {
                --biggest-font-size: 3.5rem;
                --small-font-size: .875rem;
                --smaller-font-size: .813rem;
                --tiny-font-size: .75rem;
            }
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: var(--body-font);
            background-color: var(--body-color);
            color: var(--text-color);
        }

        a {
            text-decoration: none;
        }

        .container {
            max-width: 968px;
            margin-left: var(--mb-1);
            margin-right: var(--mb-1);
        }

        .grid {
            display: grid;
        }

        .clock-container {
            height: 100vh;
            grid-template-rows: 1fr max-content;
        }

        .clock-circle {
            position: relative;
            width: 200px;
            height: 200px;
            grid-template-rows: 1fr max-content !important;
            box-shadow: -6px -6px 16px var(--white-color),
                6px 6px 16px hsla(var(--hue-color), 30%, 86%, 1),
                inset 6px 6px 16px hsla(var(--hue-color), 30%, 86%, 1),
                inset -6px -6px 16px var(--white-color);
            border-radius: 50%;
            justify-self: center;
            display: flex;
            justify-content: center;
            align-items: center;

            /* Tambahan ini buat gambar background */
            background-image: url('{{ asset('img/logo.png') }}');
            /* pastikan path gambarnya benar */
            background-size: 100px 100px;
            /* supaya gambar memenuhi lingkaran */
            background-position: center;
            /* gambar di tengah */
            background-repeat: no-repeat;
            /* gambar tidak diulang */
        }


        .clock-content {
            align-self: center;
            row-gap: 3.5rem;
        }

        .clock-twelve,
        .clock-three,
        .clock-six,
        .clock-nine {
            position: absolute;
            width: 1rem;
            height: 1px;
            background-color: var(--text-color-light);
        }

        .clock-twelve,
        .clock-six {
            transform: translateX(-50%) rotate(90deg);
        }

        .clock-twelve {
            top: 1.25rem;
            left: 50%;
        }

        .clock-six {
            bottom: 1.25rem;
            left: 50%;
        }

        .clock-three {
            top: 50%;
            right: 0.75rem;
        }

        .clock-nine {
            left: 0.75rem;
            top: 50%;
        }

        .clock-rounder {
            width: 0.75rem;
            height: 0.75rem;
            background-color: var(--first-color);
            border-radius: 50%;
            border: 2px solid var(--body-color);
            z-index: var(--z-tooltip);
        }

        .clock-hour,
        .clock-minutes,
        .clock-seconds {
            position: absolute;
            display: flex;
            justify-content: center;
        }

        .clock-hour {
            width: 105px;
            height: 105px;
        }

        .clock-hour::before {
            content: '';
            position: absolute;
            background-color: var(--text-color);
            width: 0.25rem;
            height: 3rem;
            border-radius: .75rem;
            z-index: var(--z-normal);
        }

        .clock-minutes {
            width: 136px;
            height: 136px;
        }

        .clock-minutes::before {
            content: '';
            position: absolute;
            background-color: var(--text-color);
            width: 0.25rem;
            height: 4rem;
            border-radius: .75rem;
            z-index: var(--z-normal);
        }

        .clock-seconds {
            width: 130px;
            height: 130px;
        }

        .clock-seconds::before {
            content: '';
            position: absolute;
            background-color: var(--first-color);
            width: 0.125rem;
            height: 5rem;
            border-radius: .75rem;
            z-index: var(--z-normal);
        }

        .clock-logo {
            width: max-content;
            justify-self: center;
            margin-bottom: var(--mb-2-5);
            font-size: var(--smaller-font-size);
            font-weight: var(--font-medium);
            color: var(--text-color-light);
            transition: .5s;
            font-family: var(--signature-font);
        }

        .clock-logo:hover {
            color: var(--first-color);
        }

        .clock-text {
            display: flex;
            justify-content: center;
        }

        .clock-text-hour,
        .clock-text-minutes {
            font-size: var(--biggest-font-size);
            font-weight: var(--font-medium);
            color: var(--title-color);
        }

        .clock-text-ampm {
            font-size: var(--tiny-font-size);
            color: var(--title-color);
            font-weight: var(--font-medium);
            margin-left: var(--mb-0-25);
        }

        .clock-date {
            text-align: center;
            font-size: var(--small-font-size);
            font-weight: var(--font-medium);
        }

        .clock-theme {
            position: absolute;
            top: -1rem;
            right: -1rem;
            display: flex;
            padding: 0.25rem;
            border-radius: 50%;
            box-shadow: inset -1px -1px 1px hsla(var(--hue-color), 0%, 100%, 1), inset 1px 1px 1px hsla(var(--hue-color), 30%, 86%, 1);
            color: var(--first-color);
            cursor: pointer;
        }

        .dark-theme .clock-circle {
            box-shadow: 6px 6px 6px hsla(var(--hue-color), 8%, 12%, 1), -6px -6px 16px hsla(var(--hue-color), 8%, 20%, 1), inset -6px -6px 16px hsla(var(--hue-color), 8%, 20%, 1), inset 6px 6px 12px hsla(var(--hue-color), 8%, 12%, 1);
        }

        .dark-theme .clock-theme {
            box-shadow: inset -1px -1px 1px hsla(var(--hue-color), 8%, 20%, 1), inset 1px 1px 1px hsla(var(--hue-color), 8%, 12%, 1);
        }

        @media screen and (min-width: 968px) {
            .container {
                margin-left: auto;
                margin-right: auto;
            }

            .clock-logo {
                margin-bottom: 3rem;
            }
        }
    </style>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">

            <body>
                <section class="clock container">
                    <div class="clock-container grid">
                        <div class="clock-content grid">
                            <div class="clock-circle">
                                <span class="clock-twelve"></span>
                                <span class="clock-three"></span>
                                <span class="clock-six"></span>
                                <span class="clock-nine"></span>

                                <div class="clock-rounder"></div>
                                <div class="clock-hour" id="clock-hour"></div>
                                <div class="clock-minutes" id="clock-minutes"></div>
                                <div class="clock-seconds" id="clock-seconds"></div>

                                <div class="clock-theme">
                                    <i class="bx bxs-moon" id="theme-button"></i>
                                </div>
                            </div>

                            <div>
                                <div class="clock-text">
                                    <div class="clock-text-hour" id="text-hour"></div>
                                    <div class="clock-text-minutes" id="text-minutes"></div>
                                    <div class="clock-text-ampm" id="text-ampm"></div>
                                </div>

                                <div class="clock-date">
                                    <span id="date-day"></span>
                                    <span id="date-month"></span>
                                    <span id="date-year"></span>
                                </div>
                            </div>
                        </div>

                        <a href="https://codepen.io/leonam-silva-de-souza" target="_blank" class="clock-logo">ULTRA CODE</a>
                    </div>
                </section>
            </body>
        </div>
    </div>
    <script>
        // Activating Clock

        const hour = document.getElementById('clock-hour');
        const minutes = document.getElementById('clock-minutes');
        const seconds = document.getElementById('clock-seconds');

        const clock = () => {
            let date = new Date();
            let hh = date.getHours() * 30;
            let mm = date.getMinutes() * 6;
            let ss = date.getSeconds() * 6;

            hour.style.transform = `rotateZ(${hh + mm / 12}deg)`;
            minutes.style.transform = `rotateZ(${mm}deg)`;
            seconds.style.transform = `rotateZ(${ss}deg)`;
        }
        setInterval(clock, 1000)

        // Synchronizing hour and day

        const textHour = document.getElementById('text-hour');
        const textMinutes = document.getElementById('text-minutes');
        const textAmPm = document.getElementById('text-ampm');
        const dateDay = document.getElementById('date-day');
        const dateMonth = document.getElementById('date-month');
        const dateYear = document.getElementById('date-year');

        const clockText = () => {
            let date = new Date();
            let hh = date.getHours(); // langsung 0-23
            let mm = date.getMinutes();
            let day = date.getDate();
            let month = date.getMonth();
            let year = date.getFullYear();

            // Format jam: tambahkan 0 di depan jika kurang dari 10
            if (hh < 10) {
                hh = `0${hh}`;
            }

            // Format menit: tambahkan 0 di depan jika kurang dari 10
            if (mm < 10) {
                mm = `0${mm}`;
            }

            textHour.innerHTML = `${hh}:`;
            textMinutes.innerHTML = mm;

            // Hapus bagian AM/PM karena tidak dipakai di 24 jam format

            let months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            dateDay.innerHTML = day;
            dateMonth.innerHTML = `${months[month]},`;
            dateYear.innerHTML = year;
        }
        setInterval(clockText, 1000);


        // Dark/Light Theme

        const themeButton = document.getElementById('theme-button');
        const darkTheme = 'dark-theme';
        const iconTheme = 'bxs-sun';

        const selectedTheme = localStorage.getItem('selected-theme');
        const selectedIcon = localStorage.getItem('selected-icon');

        const getCurrentTheme = () => document.body.classList.contains(darkTheme) ? 'dark' : 'light';
        const getCurrentIcon = () => themeButton.body.classList.contains(iconTheme) ? 'bxs-moon' : 'bxs-sun';

        if (selectedTheme) {
            document.body.classList[selectedTheme === 'dark' ? 'add' : 'remove'](darkTheme);
            themeButton.classList[selectedIcon === 'bxs-moon' ? 'add' : 'remove'](iconTheme);
        }

        themeButton.addEventListener('click', () => {
            document.body.classList.toggle(darkTheme);
            themeButton.classList.toggle(iconTheme);

            localStorage.setItem('selected-theme', getCurrentTheme());
            localStorage.setItem('selected-icon', getCurrentIcon());
        })
    </script>
@endsection
