
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM Loaded: This test work');
    console.log('script.js is running');
    //Load every doms here:
        const darkModeToggleButton = document.getElementById('darkModeToggleButton');
    const checkbox = document.getElementById('checkbox');
    const studentPortalLink = document.getElementById('studentPortalLink');
    const studentPortalModal = document.getElementById('studentPortalModal');
    const closeModal = document.getElementById('closeModal');
    const loginForm = document.getElementById('loginForm');
    const loginMessage = document.getElementById('loginMessage');
    // Dark Mode Functionality
    function toggleDarkMode() {
        const body = document.body;
        body.classList.toggle('dark-mode');
        localStorage.setItem('darkMode', body.classList.contains('dark-mode'));
        updateNavbarStyle();
    }

    function updateNavbarStyle() {
        const body = document.body;
        const navbar = document.querySelector('.navbar');
        if (!body.classList.contains('dark-mode')) {
            navbar.classList.remove('navbar-dark');
            navbar.classList.add('navbar-light');
        } else {
            navbar.classList.remove('navbar-light');
            navbar.classList.add('navbar-dark');
        }
    }

    const body = document.body;

    if (localStorage.getItem('darkMode') === 'true') {

        body.classList.add('dark-mode');

        checkbox.checked = true;
    }
    updateNavbarStyle();


    darkModeToggleButton.addEventListener('click', toggleDarkMode);
      checkbox.addEventListener('change', () => {
        toggleDarkMode();
    });
    console.log('Button to DarkMode attached!');
    //Modal DOM Functionality

     studentPortalLink.addEventListener('click', function(event) {
        event.preventDefault();
        studentPortalModal.style.display = 'block';
        console.log('Working Modal!!!')
    });

    closeModal.addEventListener('click', function() {
        studentPortalModal.style.display = 'none';
        loginMessage.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target == studentPortalModal) {
            studentPortalModal.style.display = 'none';
        }
    });

    loginForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const studentId = document.getElementById('studentId').value;
        const password = document.getElementById('password').value;
        if (studentId === 'STU12345' && password === 'PasswOrd123') {
            alert('Login Successful!');
            studentPortalModal.style.display = 'none';
            loginMessage.style.display = 'none';
        } else {
            loginMessage.style.display = 'block';
        }
    });

    // JavaScript for slider
   const sliderWrapper = document.querySelector('.slider-wrapper');
     console.log('sliderWrapper: ' + sliderWrapper);
    const slides = document.querySelectorAll('.slide');
      console.log('slides: ' + slides);
    const sliderNavLinks = document.querySelectorAll('.slider-nav a');
      console.log('sliderNavLinks: ' + sliderNavLinks);
    let slideIndex = 0;
    let intervalId;

    function moveSlide() {
        sliderWrapper.style.transform = `translateX(-${slideIndex * 100}%)`;
        updateNav();
    }

    function updateNav() {
        sliderNavLinks.forEach((link, index) => {
            if (index === slideIndex) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });
    }

    function goToSlide(index) {
        slideIndex = index;
        moveSlide();
        resetInterval();
    }

    function startSlider() {
        intervalId = setInterval(() => {
            slideIndex = (slideIndex + 1) % slides.length;
            moveSlide();
        }, 5000); // Change slide every 5 seconds
    }

    function resetInterval() {
        clearInterval(intervalId);
        startSlider();
    }

    sliderNavLinks.forEach((link, index) => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            goToSlide(index);
        });
    });

    startSlider(); // Initialize the slider
    updateNav();
});

 // Student Portal Modal Functionality
 const sliderWrapper = document.querySelector('.slider-wrapper');
 const openEnrollmentForm = document.getElementById('openEnrollmentForm');
     const studentPortalLink = document.getElementById('studentPortalLink');
  const studentPortalModal = document.getElementById('studentPortalModal');
  const closeModal = document.getElementById('closeModal');
      const enrollmentFormModal = document.getElementById('enrollmentFormModal');
          const closeEnrollmentForm = document.getElementById('closeEnrollmentForm');

  const loginForm = document.getElementById('loginForm');
  const loginMessage = document.getElementById('loginMessage');
   studentPortalLink.addEventListener('click', function(event) {
      event.preventDefault();
      studentPortalModal.style.display = 'block';
      console.log('Working Modal!!!')
  });

  closeModal.addEventListener('click', function() {
      studentPortalModal.style.display = 'none';
      loginMessage.style.display = 'none';
  });

      openEnrollmentForm.addEventListener('click', function(event) {
      event.preventDefault();
      enrollmentFormModal.style.display = 'block';
      console.log('Enrollment Modal!!!')
  });
           closeEnrollmentForm.addEventListener('click', function() {
      enrollmentFormModal.style.display = 'none';
      console.log('Enrollment Modal Closed!!!')
  });

  window.addEventListener('click', function(event) {
      if (event.target == studentPortalModal) {
          studentPortalModal.style.display = 'none';
      }

       if (event.target == enrollmentFormModal) {
          enrollmentFormModal.style.display = 'none';
      }
  });

    // Check localStorage for the user's preference (optional)
    if (localStorage.getItem('darkMode') === 'enabled') {
        document.body.classList.add('dark-mode');
        darkModeToggle.checked = true;
    }

    darkModeToggle.addEventListener('change', function () {
        if (this.checked) {
            document.body.classList.add('dark-mode');
            localStorage.setItem('darkMode', 'enabled'); // Store preference
        } else {
            document.body.classList.remove('dark-mode');
            localStorage.setItem('darkMode', 'disabled'); // Store preference
        }
    });
