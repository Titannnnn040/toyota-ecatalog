    <style>
        @keyframes marquee {
        0% {
            transform: translateX(-70%);
        }
        100% {
            transform: translateX(0%);
        }
        }
        .animate-marquee {
        display: inline-block;
        animation: marquee 12s linear infinite;
        }
    </style>
    <section class="relative w-full" id="home">
        <img src="public/images/banner-1.png" class="w-full h-auto" />
        <img src="public/images/banner-2.png" class="w-full h-auto" />
        <marquee direction="right" scrollamount="20" class="bg-[#DD3333] p-[.5cm] text-white text-md">
            @for ($i = 1; $i <= 4 ; $i++)
                <p class="inline-block mr-[7cm]">
                    {{$home->running_text}}
                </p>
            @endfor
        </marquee>
    </section>