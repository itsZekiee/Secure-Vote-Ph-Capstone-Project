<header class="bg-white shadow-lg fixed top-0 left-0 right-0 z-50">
    <div class="container mx-auto px-4 py-3">
        <div class="flex items-center justify-between">
            <!-- Logo and Title Section -->
            <div class="flex items-center space-x-3">
                <div class="text-3xl" style="color: #1B1B1B;">
                    <i class="ri-shield-keyhole-fill"></i>
                </div>
                <div class="leading-tight">
                    <h1 class="text-xl font-bold mb-0" style="color: #1B1B1B;">Secure Vote Ph</h1>
                    <p class="text-sm mt-0" style="color: #1B1B1B;">Trusted Democracy</p>
                </div>
            </div>

            <!-- Navigation Items -->
            <nav class="hidden md:flex">
                <ul class="flex space-x-8">
                    <li>
                        <a href="#geo" class="nav-link font-medium transition-colors duration-200" style="color: #1B1B1B;" onmouseover="this.style.color='#003153'" onmouseout="this.style.color='#1B1B1B'">
                            Geo
                        </a>
                    </li>
                    <li>
                        <a href="#security" class="nav-link font-medium transition-colors duration-200" style="color: #1B1B1B;" onmouseover="this.style.color='#003153'" onmouseout="this.style.color='#1B1B1B'">
                            Security
                        </a>
                    </li>
                    <li>
                        <a href="#analytics" class="nav-link font-medium transition-colors duration-200" style="color: #1B1B1B;" onmouseover="this.style.color='#003153'" onmouseout="this.style.color='#1B1B1B'">
                            Analytics
                        </a>
                    </li>
                    <li>
                        <a href="#faqs" class="nav-link font-medium transition-colors duration-200" style="color: #1B1B1B;" onmouseover="this.style.color='#003153'" onmouseout="this.style.color='#1B1B1B'">
                            FAQs
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="transition-all duration-300" style="color: #1B1B1B;" onmouseover="this.style.color='#003153'" onmouseout="this.style.color='#1B1B1B'">
                    <i class="ri-menu-line text-xl transition-transform duration-300"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden overflow-hidden transition-all duration-300 ease-in-out" style="max-height: 0; opacity: 0;">
            <nav class="mt-4 pb-4">
                <ul class="space-y-3">
                    <li>
                        <a href="#geo" class="nav-link block py-2 px-4 font-medium transition-all duration-200 rounded-lg text-center" style="color: #1B1B1B;" onmouseover="this.style.color='#003153'; this.style.backgroundColor='#f8f9fa'" onmouseout="this.style.color='#1B1B1B'; this.style.backgroundColor='transparent'">
                            Geo
                        </a>
                    </li>
                    <li>
                        <a href="#security" class="nav-link block py-2 px-4 font-medium transition-all duration-200 rounded-lg text-center" style="color: #1B1B1B;" onmouseover="this.style.color='#003153'; this.style.backgroundColor='#f8f9fa'" onmouseout="this.style.color='#1B1B1B'; this.style.backgroundColor='transparent'">
                            Security
                        </a>
                    </li>
                    <li>
                        <a href="#analytics" class="nav-link block py-2 px-4 font-medium transition-all duration-200 rounded-lg text-center" style="color: #1B1B1B;" onmouseover="this.style.color='#003153'; this.style.backgroundColor='#f8f9fa'" onmouseout="this.style.color='#1B1B1B'; this.style.backgroundColor='transparent'">
                            Analytics
                        </a>
                    </li>
                    <li>
                        <a href="#faqs" class="nav-link block py-2 px-4 font-medium transition-all duration-200 rounded-lg text-center" style="color: #1B1B1B;" onmouseover="this.style.color='#003153'; this.style.backgroundColor='#f8f9fa'" onmouseout="this.style.color='#1B1B1B'; this.style.backgroundColor='transparent'">
                            FAQs
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            const menuIcon = this.querySelector('i');
            const isOpen = mobileMenu.style.maxHeight !== '0px' && mobileMenu.style.maxHeight !== '';

            if (!isOpen) {
                mobileMenu.style.maxHeight = '300px';
                mobileMenu.style.opacity = '1';
                menuIcon.classList.remove('ri-menu-line');
                menuIcon.classList.add('ri-close-line');
                menuIcon.style.transform = 'rotate(180deg)';
            } else {
                mobileMenu.style.maxHeight = '0px';
                mobileMenu.style.opacity = '0';
                menuIcon.classList.remove('ri-close-line');
                menuIcon.classList.add('ri-menu-line');
                menuIcon.style.transform = 'rotate(0deg)';
            }
        });

        // Smooth scroll functionality
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);

                if (targetElement) {
                    const headerHeight = document.querySelector('header').offsetHeight;
                    const targetPosition = targetElement.offsetTop - headerHeight - 20;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });

                    // Close mobile menu if open
                    const mobileMenu = document.getElementById('mobile-menu');
                    if (mobileMenu.style.maxHeight !== '0px' && mobileMenu.style.maxHeight !== '') {
                        document.getElementById('mobile-menu-button').click();
                    }
                }
            });
        });
    </script>
</header>
