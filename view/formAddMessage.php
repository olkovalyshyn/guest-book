<div class="modal fade" id="addMessageModal" tabindex="-1" role="dialog" aria-labelledby="addMessageModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title lang" id="addMessageModalLabel" data-translate="addMessageForm">Add message
                    form</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data">
                    <p style="color:red" id="err-msg-general"></p>
                    <div class="form-group">
                        <label for="user-name-add-form" class="col-form-label lang"
                               data-translate="username">Username:</label>
                        <input type="text" class="form-control" name="username" id="user-name-add-form">
                    </div>
                    <div class="form-group">
                        <label for="user-email-add-form" class="col-form-label lang"
                               data-translate="email">E-mail:</label>
                        <input type="email" class="form-control" name="email" id="user-email-add-form">
                    </div>
                    <div class="form-group">
                        <label for="user-homepage-add-form" class="col-form-label lang"
                               data-translate="homepage">Homepage:</label>
                        <input type="url" class="form-control" name="homepage" id="user-homepage-add-form">
                    </div>

                    <div class="form-group">
                        <label for="user-captcha" class="col-form-label lang" data-translate="captcha">Captcha: enter
                            symbols</label>
                        <img src="../../model/php/captcha.php" alt="captcha">
                        <input type="text" class="form-control" name="captcha" id="user-captcha">
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label lang" data-translate="message">Message:</label>
                        <textarea class="form-control" name="message" id="message-text"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="message-language" class="col-form-label lang"
                               data-translate="language">Language:</label>
                        <div class="form-control">
                            <button type="button" id="eng" class="btn  translate">ENG</button>
                            <button type="button" id="ua" class="btn  translate">UA</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-file" class="col-form-label lang" data-translate="chooseFile">Choose
                            file:</label>
                        <input type="file" name="photo" id="message-file">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary lang" data-bs-dismiss="modal" data-translate="close">
                    Close
                </button>
                <button type="button" class="btn btn-primary lang" id="btn-send-msg" data-translate="sendMessage">Send
                    message
                </button>
            </div>
        </div>
    </div>
</div>

