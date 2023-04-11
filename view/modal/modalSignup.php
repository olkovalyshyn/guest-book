<div class="modal fade" id="modalSignup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Registration form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cancel-x"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div style="color: red" id="error-message"></div>
                    <div class="mb-3">
                        <label for="user-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="user-name">
                    </div>
                    <div class="mb-3">
                        <label for="user-email" class="col-form-label">Email:</label>
                        <input type="email" class="form-control" id="user-email">
                    </div>
                    <div class="mb-3">
                        <label for="user-password" class="col-form-label">Password:</label>
                        <input type="text" class="form-control" id="user-password">
                    </div>
                    <input type="hidden" class="form-control" id="user-ip" value=<?php echo $_SERVER["REMOTE_ADDR"]  ?>>
                    <input type="hidden" class="form-control" id="user-browser" value=<?php echo $_SERVER["HTTP_USER_AGENT"]  ?>>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancel-btn">Canсel</button>
                <button type="button" class="btn btn-primary" id="register-btn">Registration</button>
            </div>
        </div>
    </div>
</div>

