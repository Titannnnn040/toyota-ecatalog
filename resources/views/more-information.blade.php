<section class="w-full py-16 px-6 bg-gray-50 flex flex-col items-center" id="contact">

    <h1 class="text-3xl md:text-4xl font-bold text-center mb-10">
        Ingin Informasi Lebih Cepat?  
        <span class="text-red-600">Hubungi Faisal Firmansyah</span>
    </h1>

    <div class="flex flex-col md:flex-row items-center gap-12">

    <!-- Image -->
    <div class="flex justify-center">
        <img src="/public/images/more-information.png"
             class="w-[260px] md:w-[380px] h-full object-contain drop-shadow-lg"
             alt="More Information">
    </div>
    <!-- Contact Cards -->
    <div class="grid gap-2 h-full content-center">
            <!-- Whatsapp -->
            @php
                $message = "Halo Admin,%0A%0ASaya tertarik dengan promo toyota tersebut:%0A%0AMohon info detailnya ya %0ATerima kasih";
                $link = "https://wa.me/62895338112656?text=".$message;
            @endphp
            <a href="{{$link}}" target="_blank" class="group flex items-center bg-white rounded-xl shadow-md hover:shadow-xl transition p-3 w-[260px]">
                <div class="bg-green-100 p-4 py-2 rounded-lg mr-4 group-hover:scale-110 transition">
                    <i class="fa-brands fa-whatsapp text-green-600 text-[20px]"></i>
                </div>

                <div>
                    <p class="text-xs text-gray-500">Terhubung</p>
                    <p class="font-semibold text-lg">WhatsApp</p>
                </div>
            </a>
            <a href="https://www.tiktok.com/@faisal_toyota?_r=1&_t=ZS-93fVegLIRVc" target="_blank" class="group flex items-center bg-white rounded-xl shadow-md hover:shadow-xl transition p-3 w-[260px]">
                <div class="bg-red-200 p-4 py-2 rounded-lg mr-4 group-hover:scale-110 transition">
                    <i class="fa-brands fa-tiktok text-red-600 text-[20px]"></i>
                </div>

                <div>
                    <p class="text-xs text-gray-500">Terhubung</p>
                    <p class="font-semibold text-lg">Tiktok</p>
                </div>
            </a>
            <a href="https://www.facebook.com/share/1AZbMsAKyv/?mibextid=wwXIfr" target="_blank" class="group flex items-center bg-white rounded-xl shadow-md hover:shadow-xl transition p-3 w-[260px]">
                <div class="bg-blue-100 p-4 py-2 rounded-lg mr-4 group-hover:scale-110 transition">
                    <i class="fa-brands fa-facebook text-blue-600 text-[20px]"></i>
                </div>

                <div>
                    <p class="text-xs text-gray-500">Terhubung</p>
                    <p class="font-semibold text-lg">Facebook</p>
                </div>
            </a>

            <!-- Instagram -->
            <a href="https://www.instagram.com/faisal_toyotaaa?igsh=YXhoZ3VmNWZ2cnY1" target="_blank" class="group flex items-center bg-white rounded-xl shadow-md hover:shadow-xl transition p-3 w-[260px]">
                <div class="bg-pink-100 p-4 py-2 rounded-lg mr-4 group-hover:scale-110 transition">
                    <i class="fa-brands fa-instagram text-pink-600 text-[20px]"></i>
                </div>

                <div>
                    <p class="text-xs text-gray-500">Terhubung</p>
                    <p class="font-semibold text-lg">Instagram</p>
                </div>
            </a>

            <!-- Email -->
            <a href="mailto:faisalfirmansyah0405@gmail.com" target="_blank" class="group flex items-center bg-white rounded-xl shadow-md hover:shadow-xl transition p-3 w-[260px]">
                <div class="bg-red-100 p-4 py-2 rounded-lg mr-4 group-hover:scale-110 transition">
                    <i class="fa-regular fa-envelope text-red-600 text-[17px]"></i>
                </div>

                <div>
                    <p class="text-xs text-gray-500">Terhubung</p>
                    <p class="font-semibold text-lg">Email</p>
                </div>
            </a>

        </div>
    </div>

</section>
