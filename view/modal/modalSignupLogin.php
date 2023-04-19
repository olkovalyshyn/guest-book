<div class="modal fade" id="modalSignupLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Some text</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="modal-btn-x"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div style="color: red" id="error-message"></div>
                    <div class="mb-3">
                        <label for="user-name" class="col-form-label lang" data-translate="username">Name:</label>
                        <input type="text" class="form-control" id="user-name">
                    </div>
                    <div class="mb-3">
                        <label for="user-email" class="col-form-label lang" data-translate="email">Email:</label>
                        <input type="email" class="form-control" id="user-email">
                    </div>
                    <div class="mb-3">
                        <label for="user-password" class="col-form-label lang" data-translate="password">Password:</label>
                        <input type="password" class="form-control" id="user-password">
                        <!--                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalForgotPassword" id="modal-btn-forgot">Forgot password?</button>-->
                        <!--
                        <a href="./view/modal/modalForgotPassword.php">Forgot password?</a>-->
                        <!--                        <button type="button" id="forgotPasswordLink">Forgot password?</button>-->

                        <button type="button" id="forgotPasswordLink" class="btn btn-primary lang"
                                data-bs-toggle="modal" data-bs-target="#modalForgotPassword" data-translate="forgotPassword">
                            Forgot password?
                        </button>

                        <!--                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#forgotPassword">-->
                        <!--                            Launch demo modal-->
                        <!--                        </button>-->
                    </div>
                    <input type="hidden" class="form-control" id="user-ip" value=<?php echo $_SERVER["REMOTE_ADDR"] ?>>
                    <input type="hidden" class="form-control" id="user-browser"
                           value=<?php echo $_SERVER["HTTP_USER_AGENT"] ?>>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary lang" data-bs-dismiss="modal" id="modal-btn-cancel" data-translate="cancel">Cancel
                </button>
                <button type="button" class="btn btn-primary lang" id="modal-btn-ok">Some text</button>
            </div>
        </div>
    </div>
</div>

