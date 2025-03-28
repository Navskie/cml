<!doctype html>
<html lang="en">
  <?php include 'include/head.php' ?>
  <body style="overflow-y: hidden;">
    <?php include 'include/navbar.php' ?>

    <div class="h-[350px] bg-[#662D91] w-full text-[24px] md:text-[48px] flex items-center justify-center text-[#FFFFFF] font-bold">
    Unit A - 1 Bedroom w/ Balcony
    </div>

    <div class="w-fullmax-w-full mx-[20px] md:mx-[100px] flex gap-6 my-[50px]">
        <div class="flex flex-col md:flex-row">
        <!-- Left Section: Property Info -->
            <div class="w-full md:w-13/20 md:pr-4">
                <img id="mainImage" src="img/properties/UNIT A - 1 BEDROOM/thumbnail.jpg" alt="Property Image" class="w-full">
                <div class="flex flex-wrap justify-start items-center gap-1 pb-2 mt-4">
                    <img src="img/properties/UNIT A - 1 BEDROOM/thumbnail.jpg" onclick="changeImage('img/properties/UNIT A - 1 BEDROOM/thumbnail.jpg')" class="w-24 h-16 cursor-pointer border border-gray-300 hover:border-gray-500">
                    <img src="img/properties/UNIT A - 1 BEDROOM/BR1.jpg" onclick="changeImage('img/properties/UNIT A - 1 BEDROOM/BR1.jpg')" class="w-24 h-16 cursor-pointer border border-gray-300 hover:border-gray-500">
                    <img src="img/properties/UNIT A - 1 BEDROOM/BR2.jpg" onclick="changeImage('img/properties/UNIT A - 1 BEDROOM/BR2.jpg')" class="w-24 h-16 cursor-pointer border border-gray-300 hover:border-gray-500">
                    <img src="img/properties/UNIT A - 1 BEDROOM/BR3.jpg" onclick="changeImage('img/properties/UNIT A - 1 BEDROOM/BR3.jpg')" class="w-24 h-16 cursor-pointer border border-gray-300 hover:border-gray-500">
                    <img src="img/properties/UNIT A - 1 BEDROOM/BR4.jpg" onclick="changeImage('img/properties/UNIT A - 1 BEDROOM/BR4.jpg')" class="w-24 h-16 cursor-pointer border border-gray-300 hover:border-gray-500">
                    <img src="img/properties/UNIT A - 1 BEDROOM/BR5.jpg" onclick="changeImage('img/properties/UNIT A - 1 BEDROOM/BR5.jpg')" class="w-24 h-16 cursor-pointer border border-gray-300 hover:border-gray-500">
                    <img src="img/properties/UNIT A - 1 BEDROOM/BR6.jpg" onclick="changeImage('img/properties/UNIT A - 1 BEDROOM/BR6.jpg')" class="w-24 h-16 cursor-pointer border border-gray-300 hover:border-gray-500">
                </div>
                <div class="mt-6 bg-[#EAE9EB] p-6">
                    <div class="flex justify-between items-center pb-2">
                        <h2 class="text-xl font-bold">Php 0</h2>
                        <span class="flex gap-2"><img src="img/status.png" alt=""> Pre-selling</span>
                    </div>
                    <p class="text-gray-600 text-[13px]">The 18th Hansen offers studio-type units with balconies, providing residents with a bleed of modern comfort and urban living. These studio units are thoughtfully designed to maximize space and functionality, featuring open-plan playout that seamlessly integrates living, dining and sleeping areas.</p>
                    <ul class="mt-2 text-gray-700">
                        <li class="flex items-center gap-3 py-1"><img src="img/newruler.png" alt=""> Unit Size: 25 sqm</li>
                        <li class="flex items-center gap-3 py-1"><img src="img/type.png" alt=""> Project Type: High-rise Condominium</li>
                        <li class="flex items-center gap-3 py-1"><img src="img/date.png" alt=""> Turn Over Date: 2028</li>
                    </ul>
                    <h3 class="my-[25px] font-semibold">Amenities</h3>
                    <div class="flex flex-wrap items-start gap-5 text-gray-700">
                      <div class="flex items-center w-[59px] justify-center flex-col">
                        <img src="img/swim.png" alt="">
                        <span class="text-center text-[12px]">Dipping Pool</span>
                      </div>

                      <div class="flex items-center w-[59px] justify-center flex-col">
                        <img src="img/gym.png" alt="">
                        <span class="text-center text-[12px]">Fitness Area</span>
                      </div>

                      <div class="flex items-center w-[59px] justify-center flex-col">
                        <img src="img/drinks.png" alt="">
                        <span class="text-center text-[12px]">Restobar</span>
                      </div>

                      <div class="flex items-center w-[59px] justify-center flex-col">
                        <img src="img/wifi.png" alt="">
                        <span class="text-center text-[12px]">High-speed Internet</span>
                      </div>

                      <div class="flex items-center w-[59px] justify-center flex-col">
                        <img src="img/plug.png" alt="">
                        <span class="text-center text-[12px]">No Power Interruption</span>
                      </div>

                      <div class="flex items-center w-[59px] justify-center flex-col">
                        <img src="img/smartlock.png" alt="">
                        <span class="text-center text-[12px]">Smart Lock System</span>
                      </div>
                    </div>
                </div>
                <!-- Nearby Places -->
                <div class="mt-6 bg-white md:p-6">
                    <h3 class="text-lg font-bold">Nearby Places</h3>
                    <div class="flex flex-wrap gap-5 mt-2 justify-center">
                        <img src="img/sm.png" alt="SM City" class="w-[53.88px] h-[64px] sm:w-full sm:h-auto md:w-[53.88px] md:h-[64px]">
                        <img src="img/hospital.png" alt="Hospital" class="w-[53.41px] h-[64px] sm:w-full sm:h-auto md:w-[53.41px] md:h-[64px]">
                        <img src="img/columban.png" alt="Columban" class="w-[64px] h-[64px] sm:w-full sm:h-auto md:w-[64px] md:h-[64px]">
                        <img src="img/sbma.png" alt="SBMA" class="w-[64px] h-[64px] sm:w-full sm:h-auto md:w-[64px] md:h-[64px]">
                        <img src="img/mcdo.png" alt="McDonald's" class="w-[64px] h-[64px] sm:w-full sm:h-auto md:w-[64px] md:h-[64px]">
                        <img src="img/ayala.png" alt="Ayala" class="w-[64px] h-[64px] sm:w-full sm:h-auto md:w-[64px] md:h-[64px]">
                    </div>
                </div>

                <!-- Map -->
                <div class="mt-6 bg-white py-6">
                    <h3 class="text-lg font-bold">Location</h3>
                    <p>#13A 10th Hansen St. East Tapinac, Olongapo City, Philippines, 2200</p>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d241.05738811925016!2d120.2836915215229!3d14.82984779438626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3396711b1748a04d%3A0x94ae552dcef29eed!2s13%20E%2010th%20St%2C%20Olongapo%2C%20Zambales!5e0!3m2!1sen!2sph!4v1742537932714!5m2!1sen!2sph" class="w-full h-[450px]" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <!-- Right Section: Centered Inquiry Form -->
            <div class="w-full md:w-7/20 md:pl-4">
                <div class="bg-white p-6 w-full">
                    <h3 class="text-xl font-bold">Inquiry Form</h3>
                    <p class="text-sm">Have questions? Fill out the form, and we'll get back to you soon!</p>
                    <form class="mt-4 grid gap-4">
                        <div class="form-group">
                            <label for="">Full Name *</label>
                            <input type="text" placeholder="Juan Dela Cruz" class="w-full p-3 border-[#EAE9EB] border-[1px] outline-none">
                        </div>
                        <div class="form-group">
                            <label for="">Email Address *</label>
                            <input type="email" placeholder="juandelacruz@gmail.com" class="w-full p-3 border-[#EAE9EB] border-[1px] outline-none">
                        </div>
                        <div class="form-group">
                            <label for="">Phone Number *</label>
                            <input type="text" placeholder="Whatsapp / CP Number" class="w-full p-3 border-[#EAE9EB] border-[1px] outline-none">
                        </div>
                        <div class="form-group">
                            <label for="">Property Interested In *</label>
                            <input type="text" placeholder="UNIT A - 1 BEDROOM" class="w-full p-3 border-[#EAE9EB] border-[1px] outline-none">
                        </div>

                        <div class="form-group">
                            <label for="">Message / Best time to receive a call *</label>
                            <textarea class="w-full p-3 border-[#EAE9EB] border-[1px] outline-none" rows="4" id=""></textarea>
                        </div>

                        <div class="form-group">
                            <button class="px-6 w-full h-[50px] py-2 bg-[#662D91] text-[16px] text-white hover:bg-[#552777]">SEND MY INQUIRY</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'include/footer.php' ?>

  </body>
  <script src="src/js/main.js"></script>
  <script>
        function changeImage(imageSrc) {
            document.getElementById('mainImage').src = imageSrc;
        }
    </script>
</html>
