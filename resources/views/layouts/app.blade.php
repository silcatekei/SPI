<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPI - Enrollment Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/modal.css') }}">
    <style>
        body {
            background-image: url('{{ asset('assets/SPI_LOGO-removebg-preview.png') }}');
            background-size: contain;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
            background-color: #addfad;
        }

        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
            /* Or a dark color that fits your dark mode */
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        /* Add the moon icon */
        .slider.round:after {
            position: absolute;
            content: "";
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 20px;
            /* Adjust size as needed */
            height: 20px;
            /* Adjust size as needed */
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black"><path d="M12.74,3.75c0.8,0,1.55,0.32,2.12,0.88c-2.79,0.84-4.84,3.29-4.84,6.28c0,2.99,2.05,5.44,4.84,6.28c-0.57,0.57-1.32,0.88-2.12,0.88c-3.59,0-6.5,-2.91-6.5-6.5C6.24,6.66,9.15,3.75,12.74,3.75z"/></svg>');
            background-repeat: no-repeat;
            background-size: contain;
        }

        input:checked+.slider.round:after {
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="yellow"><path d="M12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4Z" /></svg>');
        }


        /* Dark Mode Specific Styles */
        body.dark-mode {
            background-color: #333;
            color: #fff;
            background-image: none;
            /*Remove background Image */
        }

        .dark-mode .modal-content {
            background-color: #555;
            color: #fff;
        }

        .dark-mode body {
            background-color: #000;
            /*Black Background*/
        }

        .dark-mode .slider {
            background-color: #666;
            /* A darker slider color */
        }

        /* Initially hide the strand and course dropdowns */
        #strandGroup,
        #courseGroup {
            display: none;
        }

        /* Style for file upload labels */
        .file-upload-label {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
            background-color: #f9f9f9;
            border-radius: 4px;
        }

        .file-upload-label:hover {
            background-color: #eee;
        }

        /*Style for showing the selected file name */
        .selected-file-name {
            margin-left: 10px;
            font-style: italic;
            color: #555;
        }

        /* Custom styles for radio buttons */
        .student-type-radio {
            margin-right: 15px; /* Add spacing between radio buttons */
            display: inline-block;  /*Align radio buttons horizontally*/
        }

        /* Styles for labels of radio buttons*/
        .student-type-radio label{
            font-weight: normal;  /*Making label font weight as normal*/
            cursor: pointer; /*Making the cursor pointer on hover*/
        }
    </style>
</head>

<body>
    @yield('content')
    <!-- Student Portal Modal -->
    <!-- Code for the student portal -->
    <div id="studentPortalModal" class="modal">
        <div class="modal-content">
            <span class="close-button" id="closeModal">×</span>
            <h2>Student Portal Login</h2>
            <form id="loginForm">
                <div class="form-group">
                    <label for="studentId">Student ID:</label>
                    <input type="text" class="form-control" id="studentId" placeholder="Enter Student ID">
                </div>
                <div class="mb-3">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter Password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <p id="loginMessage" style="color: red; margin-top: 10px; display: none;">Invalid Student ID or
                Password.</p>
        </div>
    </div>
    <!-- Enrollment Form Modal (Moved to app.blade.php) -->
    <div id="enrollmentFormModal" class="modal">
        <div class="modal-content">
            <span class="close-button" id="closeEnrollmentForm">×</span>
            <h2>Enrollment Form</h2>
            <form id="enrollmentForm" enctype="multipart/form-data">
                @csrf <!-- ADD CSRF TOKEN -->
                <div class="form-group">
                    <label>Student Type:</label>
                    <div class="student-type-radio">
                        <input class="form-check-input" type="radio" name="studentType" id="newStudent" value="new"
                            required>
                        <label class="form-check-label" for="newStudent">
                            New Student
                        </label>
                    </div>
                    <div class="student-type-radio">
                        <input class="form-check-input" type="radio" name="studentType" id="transferee"
                            value="transferee">
                        <label class="form-check-label" for="transferee">
                            Transferee
                        </label>
                    </div>
                    <div class="student-type-radio">
                        <input class="form-check-input" type="radio" name="studentType" id="existingStudent"
                            value="existing">
                        <label class="form-check-label" for="existingStudent">
                            Existing Student
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fullName">Full Name:</label>
                    <input type="text" class="form-control" id="fullName" placeholder="Enter your full name" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="address" class="form-control" id="address" placeholder="Enter your full address"
                        required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="number">Contact Number:</label>
                    <input type="tel" class="form-control" id="number" placeholder="Enter your contact number"
                        required>
                </div>
                <div class="form-group">
                    <label for="schoolLevel">School Level</label>
                    <select class="form-control" id="schoolLevel" name="schoolLevel">
                        <option value="">Select Level</option>
                        <option value="SHS">SHS (Senior High School)</option>
                        <option value="COLLEGE">College</option>
                    </select>
                </div>
                <!-- Wrap the Strand selection in a div with an ID -->
                <div class="form-group" id="strandGroup">
                    <label for="strand">Strand:</label>
                    <select class="form-control" id="strand" name="strand">
                        <option value="">Select Strand</option>
                        <option value="ABM">ABM (Accountancy, Business and Management)</option>
                        <option value="ICT">ICT (Information and Communications Technology)</option>
                        <option value="HRM">HRM (Hotel and Restaurant Management)</option>
                        <option value="GAS">GAS (General Academic Strand)</option>
                    </select>
                </div>

                <!-- Course selection for COLLEGE -->
                <div class="form-group" id="courseGroup">
                    <label for="course">Course:</label>
                    <select class="form-control" id="course" name="course">
                        <option value="">Select Course</option>
                        <option value="BSCS">BSCS (Bachelor of Science in Computer Science)</option>
                        <option value="BSBA">BSBA (Bachelor of Science in Business Administration)</option>
                        <option value="BSED">BSED (Bachelor of Science in Education)</option>
                        <option value="BSHRM">BSHRM (Bachelor of Science in Hotel and Restaurant Management)</option>
                        <option value="BSTM">BSTM (Bachelor of Science in Tourism Management)</option>
                    </select>
                </div>

                <!-- File Uploads -->
                <div class="form-group">
                    <label for="studentPicture">2x2 Picture:</label>
                    <input type="file" class="form-control" id="studentPicture" name="studentPicture"
                        accept="image/*" style="display: none;">
                    <label for="studentPicture" class="file-upload-label">
                        Choose File
                    </label>
                    <span id="studentPictureName" class="selected-file-name">No file chosen</span>
                </div>

                <div class="form-group">
                    <label for="gradesCopy">Latest Grades Copy:</label>
                    <input type="file" class="form-control" id="gradesCopy" name="gradesCopy"
                        accept=".pdf,.doc,.docx,image/*" style="display: none;">
                    <label for="gradesCopy" class="file-upload-label">
                        Choose File
                    </label>
                    <span id="gradesCopyName" class="selected-file-name">No file chosen</span>
                </div>
                <button type="button" class="enrollment-submit-btn btn btn-primary">Submit Application</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.enrollment-submit-btn').on('click', function (e) {
                let formData = new FormData();
                formData.append('_token', $('input[name="_token"]').val()); // CSRF Token
                formData.append('student_type', $('input[name="studentType"]:checked').val());
                formData.append('full_name', $('#fullName').val());
                formData.append('address', $('#address').val());
                formData.append('email', $('#email').val());
                formData.append('number', $('#number').val());
                formData.append('school_level', $('#schoolLevel').val());
                formData.append('strand', $('#strand').val());
                formData.append('course', $('#course').val());

                // Append files
                let studentPicture = $('#studentPicture')[0].files[0];
                if (studentPicture) {
                    formData.append('studentPicture', studentPicture);
                }

                let gradesCopy = $('#gradesCopy')[0].files[0];
                if (gradesCopy) {
                    formData.append('gradesCopy', gradesCopy);
                }

                $.ajax({
                    url: 'api/v1/enrollments',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        alert('Enrollment submitted successfully!');
                        console.log(response);
                    },
                    error: function (xhr) {
                        alert('An error occurred. Please try again.');
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script>
        // Get the schoolLevel select element
        const schoolLevelSelect = document.getElementById('schoolLevel');

        // Get the strandGroup div
        const strandGroup = document.getElementById('strandGroup');

        // Get the courseGroup div
        const courseGroup = document.getElementById('courseGroup');

        //File Upload script
        const studentPictureInput = document.getElementById('studentPicture');
        const studentPictureName = document.getElementById('studentPictureName');

        const gradesCopyInput = document.getElementById('gradesCopy');
        const gradesCopyName = document.getElementById('gradesCopyName');

        studentPictureInput.addEventListener('change', function () {
            if (this.files && this.files[0]) {
                studentPictureName.textContent = this.files[0].name;
            } else {
                studentPictureName.textContent = "No file chosen";
            }
        });

        gradesCopyInput.addEventListener('change', function () {
            if (this.files && this.files[0]) {
                gradesCopyName.textContent = this.files[0].name;
            } else {
                gradesCopyName.textContent = "No file chosen";
            }
        });

        // Add an event listener to the schoolLevel select element
        schoolLevelSelect.addEventListener('change', function () {
            // If the selected value is SHS, show the strandGroup div and hide courseGroup
            if (schoolLevelSelect.value === 'SHS') {
                strandGroup.style.display = 'block';
                courseGroup.style.display = 'none';
            } else if (schoolLevelSelect.value === 'COLLEGE') {
                // If the selected value is COLLEGE, show the courseGroup div and hide strandGroup
                strandGroup.style.display = 'none';
                courseGroup.style.display = 'block';
            } else {
                // Otherwise, hide both the strandGroup and courseGroup divs
                strandGroup.style.display = 'none';
                courseGroup.style.display = 'none';
            }
        });
    </script>
</body>

</html>