<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/SPI_LOGO-removebg-preview.png') }}" alt="School Logo" style="max-height: 40px; margin-right: 5px;">  <!-- Added style for logo size -->
            SKILL-POWER INSTITUTE
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#features">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#admission">Admission</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="studentPortalLink" data-bs-toggle="modal" data-bs-target="#studentPortalModal">Student Portal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin') }}" id="">Admin Portal</a>
                </li>
            </ul>
        </div>
    </div>
</nav>