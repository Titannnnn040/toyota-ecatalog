<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Toyota Dealership</title>
	<script src="https://kit.fontawesome.com/c96216a310.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="icon" href="/public/images/logo-nobg.png" type="image/x-icon">
    
</head>
<body class="font-sans antialiased bg-gradient-to-b from-gray-100 to-gray-200">
    <a href="https://wa.me/62895338112656" 
        target="_blank"
        class="fixed bottom-6 right-6 
                bg-green-500 hover:bg-green-600 
                text-white 
                w-14 h-14 
                rounded-full 
                flex items-center justify-center 
                shadow-lg hover:shadow-xl 
                transition duration-300 z-50">

            <!-- Icon WhatsApp (SVG) -->
            <i class="fa-brands fa-whatsapp text-[30px]"></i>
            
        </a>

   <nav class="bg-white shadow-md relative">

    <div class="max-w-7xl mx-auto px-4">

        <div class="flex justify-between items-center h-16">

            <!-- Logo (Left) -->
            <img src="public/images/logo.png" class="h-10" alt="Logo">

            <!-- Center Menu (Desktop) -->
            <ul class="hidden md:flex gap-10 font-bold text-gray-700 absolute left-1/2 -translate-x-[30%]">
                <li><a href="#home" class="hover:text-red-600">Home</a></li>
                <li><a href="#catalog" class="hover:text-red-600">Models</a></li>
                <li><a href="#contact" class="hover:text-red-600">Contact</a></li>
            </ul>

            <!-- Right Side -->
            <div class="flex items-center gap-5">

                <!-- Social (Desktop) -->
                <ul class="hidden md:flex gap-5 text-lg text-gray-700">
                    <li><a href="https://www.instagram.com/faisal_toyotaaa?igsh=YXhoZ3VmNWZ2cnY1" target="_blank"><i class="fa-brands fa-instagram hover:text-red-600"></i></a></li>
                    <li><a href="https://www.facebook.com/share/1AZbMsAKyv/?mibextid=wwXIfr" target="_blank"><i class="fa-brands fa-facebook hover:text-red-600"></i></a></li>
                    <li><a href="https://wa.me/62895338112656" target="_blank"><i class="fa-brands fa-whatsapp hover:text-red-600"></i></a></li>
                    <li><a href="https://www.tiktok.com/@faisal_toyota?_r=1&_t=ZS-93fVegLIRVc" target="_blank"><i class="fa-brands fa-tiktok hover:text-red-600"></i></a></li>
                </ul>

                <!-- Hamburger -->
                <button id="menuBtn" class="md:hidden text-2xl">
                    ☰
                </button>

            </div>

        </div>

    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden bg-white border-t">

        <ul class="flex flex-col items-center gap-6 py-6 font-bold text-gray-700">
            <li><a href="#home">Home</a></li>
            <li><a href="#catalog">Models</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>

        <div class="flex justify-center gap-6 pb-6 text-xl">
            <a href="https://www.instagram.com/faisal_toyotaaa?igsh=YXhoZ3VmNWZ2cnY1"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://www.facebook.com/share/1AZbMsAKyv/?mibextid=wwXIfr"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://wa.me/62895338112656"><i class="fa-brands fa-whatsapp"></i></a>
            <a href="https://www.tiktok.com/@faisal_toyota?_r=1&_t=ZS-93fVegLIRVc"><i class="fa-brands fa-youtube"></i></a>
        </div>

    </div>

</nav>




    <main>
        @include('banner')
        @include('catalog')
        @include('more-information')
        @include('program-benefit')
        @include('gallery')
    </main>
    <footer class="bg-gray-200 text-gray-600 p-4 mt-4 text-center">
        <p>© 2026 Toyota Pusat All Rights Reserved.</p>
    </footer>
    <script>
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    
    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
    </script>
    <script>
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();

    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      target.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
    }
  });
});
</script>
</body>

</html>