<div class="modal fade" id="modalForgotPassword" tabindex="-1" role="dialog" aria-labelledby="modalForgotPasswordLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalForgotPasswordLabel">Forgot Password?</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" id="modal-btn-x-recover">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


<form id="forgotPassword" method="post" action="../model/php/forgotPassword.php" >
    <p style="color:red" id="error-message-recover"></p>
    <label for="user-email-recover-pswd">Email:</label>
    <input type="email" name="email" id="user-email-recover-pswd">

<!--    <button type="button" name="recover" id="btn-send-mail-recover">Send me mail</button>-->

</form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="modal-btn-cancel-recover">Close</button>
                <button type="button" name="recover" class="btn btn-primary" id="btn-send-mail-recover">Send me mail</button>
            </div>
        </div>
    </div>
</div>