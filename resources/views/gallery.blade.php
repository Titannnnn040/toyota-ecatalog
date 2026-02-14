<style>
    .swiper-slide{
        margin-right:12px
    }
    .swiper-button-prev, .swiper-button-next{
        position:unset;
        font-size:13px;
        width:20px;
        height:20px;
        padding:.8rem;
        border-radius:5px
    }
    .swiper-button-next::after,
.swiper-button-prev::after {
    font-size: 16px !important; /* Ubah ukuran di sini */
    font-weight: bold !important; /* Ubah ukuran di sini */
    color:rgb(220 38 38);

}
.swiper-pagination-bullet-active{
    background-color:rgb(220 38 38);
}
</style>
<div class="max-w-7xl mx-auto py-12 px-4">

    <div class="bg-red-600">
        <div class="bg-gray-100 w-auto h-40"></div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 p-4 mt-[-4.2cm]">
            <!-- LEFT INFO CARD -->
            <div class="bg-white p-8 flex flex-col justify-between">
    
                <div>
                    <h2 class="text-3xl font-bold leading-tight">
                        Gallery Serah <br> Terima
                    </h2>
    
                    <p class="text-gray-500 mt-4">
                        Dokumentasi serah terima kendaraan
                        antara pihak Dealer dan Pelanggan
                    </p>
                </div>
                <div class="mt-8 flex gap-3 justify-end">
                    <div class="swiper-button-prev 
                                !static 
                                w-12 h-12 
                                border-2
                                border-red-600  
                                text-white 
                                shadow-lg
                                transition">
                    </div>
                    <div class="swiper-button-next 
                                !static 
                                w-12 h-12 
                                border-2
                                border-red-600  
                                text-white 
                                shadow-lg
                                transition">
                    </div>
                </div>
                <button class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700">
                    Lihat Semua
                </button>
                
            </div>
    
    
            <!-- SLIDER -->
            <div class="lg:col-span-2">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">

                        @foreach($ratings as $item)
                        <div class="swiper-slide">
                            <div class="bg-white p-4 rounded-xl shadow">

                                <div class="flex justify-between mb-3">
                                    <div>
                                        <!-- ⭐ Dynamic Stars -->
                                        <div class="text-red-600 text-sm">
                                            @for ($i = 1; $i <= 5; $i++)
                                                {{ $i <= $item->rating ? '★' : '☆' }}
                                            @endfor
                                        </div>

                                        <h3 class="font-semibold">
                                            {{ $item->name }}
                                        </h3>

                                        <p class="text-gray-500 text-sm">
                                            dari {{ $item->asal }}
                                        </p>
                                    </div>

                                    <!-- Avatar dummy -->
                                    <img src="{{ asset($item->image) }}"
                                        class="w-10 h-10 rounded-full">
                                </div>

                                <!-- Image -->
                                <img src="{{ asset($item->image) }}"
                                    class="w-full object-cover rounded-md">
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>

    
        </div>
    </div>

</div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
new Swiper(".mySwiper", {
    slidesPerView: 2,
    spaceBetween: 20,
    loop: true,

    // autoplay: {
    //     delay: 3000,
    //     disableOnInteraction: false,
    // },

    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },

    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    breakpoints: {
        0: { slidesPerView: 1 },
        768: { slidesPerView: 2 },
    }
});
</script>