<!--форма добавлення повідомлення-->
<!--<div class="modal fade" id="addMessageModal" tabindex="-1" role="dialog" aria-labelledby="addMessageModalLabel" aria-hidden="true">-->
<!--    <div class="modal-dialog" role="document">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <h5 class="modal-title" id="addMessageModalLabel">Add message form</h5>-->
<!--                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">-->
<!--                    <span aria-hidden="true">&times;</span>-->
<!--                </button>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
                <form method="post" action="">
                    <div class="form-group">
                        <label for="user-name" class="col-form-label">Username:</label>
                        <input type="text" class="form-control" id="user-name">
                    </div>
                    <div class="form-group">
                        <label for="user-email" class="col-form-label">E-mail:</label>
                        <input type="email" class="form-control" id="user-email">
                    </div>
                    <div class="form-group">
                        <label for="user-email" class="col-form-label">Homepage:</label>
                        <input type="url" class="form-control" id="user-email">
                    </div>

                    <div class="form-group">
                        <label for="user-captcha" class="col-form-label">Captcha: enter symbols</label>
                        <img src="../model/php/captcha.php" alt="captcha">
                        <input type="text" class="form-control" name="captcha" id="user-captcha">
<!--                        <input type="submit" value="Відправити">-->
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="message-language" class="col-form-label">Language:</label>
                        <select name="language">
                            <option value="ukrainian">Ukrainian</option>
                            <option value="english">English</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message-file" class="col-form-label">Choose file:</label>
                        <input type="file" name="photo" id="message-file">
                    </div>

                    <button type="button" class="btn btn-primary">Send message</button>

                </form>
<!--            </div>-->
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


<!--форма добавлення повідомлення-->
<!--<div class="modal fade" id="addMessageModal" tabindex="-1" role="dialog" aria-labelledby="addMessageModalLabel" aria-hidden="true">-->
<!--    <div class="modal-dialog" role="document">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <h5 class="modal-title" id="addMessageModalLabel">Add message form</h5>-->
<!--                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">-->
<!--                    <span aria-hidden="true">&times;</span>-->
<!--                </button>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                <form>-->
<!--                    <div class="form-group">-->
<!--                        <label for="user-name" class="col-form-label">Username:</label>-->
<!--                        <input type="text" class="form-control" id="user-name">-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label for="user-email" class="col-form-label">E-mail:</label>-->
<!--                        <input type="email" class="form-control" id="user-email">-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label for="user-email" class="col-form-label">Homepage:</label>-->
<!--                        <input type="url" class="form-control" id="user-email">-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label for="user-captcha" class="col-form-label">Captcha: enter symbols</label>-->
<!--                        <img src="../../model/php/captcha.php" alt="captcha">-->
<!--                        <input type="text" class="form-control" name="captcha" id="user-captcha">-->
<!--                        <!--                        <input type="submit" value="Відправити">-->-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label for="message-text" class="col-form-label">Message:</label>-->
<!--                        <textarea class="form-control" id="message-text"></textarea>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label for="message-language" class="col-form-label">Language:</label>-->
<!--                        <select name="language">-->
<!--                            <option value="ukrainian">Ukrainian</option>-->
<!--                            <option value="english">English</option>-->
<!--                        </select>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label for="message-file" class="col-form-label">Choose file:</label>-->
<!--                        <input type="file" name="photo" id="message-file">-->
<!--                    </div>-->
<!---->
<!---->
<!--                </form>-->
<!--            </div>-->
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
<!--                <button type="button" class="btn btn-primary">Send message</button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

