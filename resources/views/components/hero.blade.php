<!-- Hero Section -->
<section class="hero">

    <!-- Image Slider -->
    <div id="imageSlider">
        <div class="slider-wrapper">
            <div class="slide" style="background-image: url('{{ asset('enrollment.jpg') }}');">
                <div class="slide-overlay">
                    <h2>Welcome to SPI SHS</h2>
                    <p>Providing Quality Education for a Brighter Future.</p>
                </div>
            </div>
            <div class="slide" style="background-image: url('{{ asset('enrollment1.jpg') }}');">
                <div class="slide-overlay">
                    <h2>Dedicated Faculty</h2>
                    <p>Learn from experienced and passionate teachers.</p>
                </div>
            </div>
            <div class="slide" style="background-image: url('{{ asset('SPI.png') }}');">
                <div class="slide-overlay">
                    <h2>Explore Career Pathways</h2>
                    <p>Prepare for your future career with specialized tracks.</p>
                </div>
            </div>
        </div>
        <nav class="slider-nav">
            <a href="#" data-slide="1">1</a>
            <a href="#" data-slide="2">2</a>
            <a href="#" data-slide="3">3</a>
        </nav>
    </div>

    <!-- Apply Now Button -->
    <div class="apply-now-container">
        <a href="#admission" class="apply-now-button" id="openEnrollmentForm">Apply Now</a>
    </div>

</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const sliderWrapper = document.querySelector('.slider-wrapper');
    const slides = document.querySelectorAll('.slide');
    const navLinks = document.querySelectorAll('.slider-nav a');
    const slideCount = slides.length;
    let slideIndex = 0;
    let intervalId;

    function showSlide(index) {
        if (index < 0) {
            slideIndex = slideCount - 1;
        } else if (index >= slideCount) {
            slideIndex = 0;
        } else {
            slideIndex = index;
        }

        const translateX = -slideIndex * 100 + '%';
        sliderWrapper.style.transform = 'translateX(' + translateX + ')';

        // Update active navigation link
        navLinks.forEach(link => link.classList.remove('active'));
        navLinks[slideIndex].classList.add('active');
    }

    function goToSlide(index) {
        showSlide(index);
        resetInterval(); // Reset the interval after manual navigation
    }

    function autoSlide() {
        showSlide(slideIndex + 1);
    }

    function startInterval() {
        intervalId = setInterval(autoSlide, 5000); // Change slide every 5 seconds
    }

    function resetInterval() {
        clearInterval(intervalId);
        startInterval();
    }


    // Initialize slider
    showSlide(slideIndex);
    startInterval();

    // Navigation links click handlers
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const slideNumber = parseInt(this.getAttribute('data-slide')) - 1;
            goToSlide(slideNumber);
        });
    });
});
</script>
