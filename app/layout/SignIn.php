<div class="modal fade" id="signIn" tabindex="-1" aria-labelledby="signIn" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-0 p-4">
        <div class="container d-flex align-content-center p-0">
            <i class="bi bi-building rounded-3 p-1 fs-4 text-light" style="background-color: #0f2573;"></i>
            <div class="container">
                <p class="fs-6 fw-bolder m-0" style="color: #0f2573;">Room Rental</p>
                <p class="fs-6 text-secondary m-0" style="color: #0f2573;">Sign in to continue</p>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
        <div class="container d-flex mb-2 p-0">
          <button type="button" class="btn fw-medium d-inline w-50 me-2" id="tenant_sign_in">Tenant</button>
          <button type="button" class="btn fw-medium d-inline w-50" id="admin_sign_in">Admin</button>
        </div>

        <div class="container" id="default_form">
            <label for="client_email" class="text-secondary fw-medium mb-1">Email</label>
            <div class="input-group mb-3">
                <span class="input-group-text bg-light" style="color: #0f2573;"><i class="bi bi-person"></i></span>
                <input type="email" class="form-control bg-light" placeholder="edgar@gmail.com" name="client_email" id="client_email" required>
            </div>
            <label for="client_password" class="text-secondary fw-medium mb-1">Password</label>
            <div class="input-group">
                <span class="input-group-text bg-light" style="color: #0f2573;"><i class="bi bi-shield-lock"></i></span>
                <input type="password" class="form-control bg-light" placeholder="••••••••" name="client_password" id="client_password" required>
            </div>
        </div>

        <div class="container" id="tenant_form">
            
        </div>

        <div class="container" id="admin_form">
            
        </div>
      </div>
      <div class="modal-footer border-0">
        <button class="btn fw-medium text-light w-100" style="background-color: #0f2573;" data-bs-toggle="modal" data-bs-target="#signIn">
            Sign In<i class="bi bi-arrow-right ms-2"></i>
        </button>
      </div>
    </div>
  </div>
</div>