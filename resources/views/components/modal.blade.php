<div class="modal fade" id="studentPortalModal" tabindex="-1" aria-labelledby="studentPortalModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">  <!-- Added modal-dialog-centered -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="studentPortalModalLabel">Student Portal Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="loginForm">
          <div class="form-group">
            <label for="studentId">Student ID:</label>
            <input type="text" class="form-control" id="studentId" placeholder="Enter Student ID">
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" placeholder="Enter Password">
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <p id="loginMessage" style="color: red; margin-top: 10px; display: none;">Invalid Student ID or Password.</p>
      </div>
      <!-- Optionally add a modal-footer if you need buttons in the footer -->
    </div>
  </div>
</div>