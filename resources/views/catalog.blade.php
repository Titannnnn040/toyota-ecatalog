<section id="catalog">
<div class="max-w-7xl mx-auto py-12 px-4">

    <!-- HEADER -->
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold">
            Toyota Car Catalog
        </h1>
        <p class="text-gray-500 mt-2">
            Temukan kendaraan impian Anda
        </p>
    </div>

    <!-- FILTER -->
    <div class="flex justify-center gap-4 mb-10">
        <button onclick="filterCars(event,'all')" 
            class="filter-btn bg-red-600 text-white px-6 py-2 rounded-full">
            All
        </button>

        @foreach ($category as $item)
            <button onclick="filterCars(event, '{{$item->name}}')" 
                class="filter-btn bg-white px-6 py-2 rounded-full shadow">
                {{$item->name}}
            </button>
        @endforeach
    </div>

    <!-- GRID -->
    <div id="carGrid" 
         class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

        @foreach($cars as $car)
        <div class="car-card group"
             data-category="{{ $car['category'] }}">
            <div class="bg-white/80 backdrop-blur 
                        rounded-2xl shadow-xl 
                        hover:shadow-2xl 
                        transition overflow-hidden border border-xl">

                <!-- IMAGE -->
                <div class="relative bg-gradient-to-br 
                            from-gray-50 to-gray-100">

                    <!-- Badge -->
                    {{-- <span class="absolute top-4 right-0
                                 bg-red-600
                                 text-white text-sm 
                                 font-semibold 
                                 px-5 py-1 
                                 rounded-l-full shadow">
                        {{ $car['badge'] }}
                    </span> --}}

                    <img src="{{ $car['image'] }}" class="w-100 object-contain">
                </div>

                <!-- CONTENT -->
                <div class="p-6">
                   @php
                    $message = "Halo Admin,%0A%0ASaya tertarik dengan mobil berikut:%0A".
                            "Nama Mobil: ".$car['name']."%0A".
                            "Tipe: ".$car['slug']."%0A".
                            "Harga: ".number_format($car['price'], 0, ',', '.')."%0A".
                            "DP: ".number_format($car['dp'], 0, ',', '.')."%0A%0A".
                            "Mohon info detailnya ya.%0ATerima kasih.";

                    $link = "https://wa.me/62895338112656?text=".$message;
                    @endphp

                    <div class="flex justify-between items-center">

                        <div>
                            <h3 class="text-xl font-bold">
                                {{ $car['name'] }}
                            </h3>

                            <p class="text-gray-500 text-sm">
                                {{ $car['slug'] }}
                            </p>
                        </div>

                        <div>
                            <a href="{{ $link }}"
                            target="_blank"
                            class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-lg flex items-center gap-2 h-fit">

                                <i class="fa-brands fa-whatsapp text-lg"></i>
                                WhatsApp
                            </a>
                        </div>

                    </div>
                    <!-- PRICE GLASS BAR -->
                    <div class="mt-5 grid grid-cols-2 
                            bg-white/70 backdrop-blur 
                            border rounded-xl 
                            overflow-hidden shadow">

                    <div class="px-4 py-3 border-b border-r">
                        <p class="text-xs text-gray-500">Harga</p>
                        <p class="font-bold text-red-600">
                            {{ number_format($car['price'], 0, ',', '.') }}
                        </p>
                    </div>

                    <div class="px-4 py-3 border-b">
                        <p class="text-xs text-gray-500">DP</p>
                        <p class="font-bold">
                            {{ number_format($car['dp'], 0, ',', '.') }}
                        </p>
                    </div>

                    <div class="px-4 py-3 border-r">
                        <p class="text-xs text-gray-500">Tenor</p>
                        <p class="font-bold">
                            {{ number_format($car['tenor'], 0, ',', '.') }}
                        </p>
                    </div>

                    <div class="px-4 py-3">
                        <p class="text-xs text-gray-500">Cicilan</p>
                        <p class="font-bold">
                            {{ number_format($car['cicilan'], 0, ',', '.') }}
                        </p>
                    </div>

                </div>

                </div>

            </div>
        </div>
        @endforeach

    </div>

</div>

<!-- JS FILTER -->
<script>
function filterCars(e, category) {

    // reset semua tombol
    document.querySelectorAll('.filter-btn')
        .forEach(btn => {
            btn.classList.remove('bg-red-600','text-white');
            btn.classList.add('bg-white','shadow');
        });

    // aktifkan tombol diklik
    e.target.classList.remove('bg-white','shadow');
    e.target.classList.add('bg-red-600','text-white');

    // filter mobil
    document.querySelectorAll('.car-card')
        .forEach(card => {
            if(category === 'all' || 
               card.dataset.category === category){
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
}
</script>
</section>