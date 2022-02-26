<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card bg-light mt-5">
                    <div class="card-header card-text">
                        <div class="row">
                            <div class="col">
                                <h2 class="card-text">Add New Transaction</h2>
                            </div>
                            <div class="col">
                                <a href="<?php echo URLROOT; ?>/transaction" class="btn btn-light pull-right"><i
                                            class="fa fa-backward"></i> Back</a>
                            </div>

                        </div>
                    </div>

                    <div class="card-body">
                        <form id="form_transaction" method="post" onsubmit="submitTransaction();return false;">
                            <!--                    action="--><?php //echo URLROOT ;?><!--/transaction/add"-->
                            <div class="form-group">
                                <label for="amount">Amount <sub>*</sub></label>
                                <input type="text" name="amount" id="amount"
                                       class="form-control form-control-lg <?php echo (!empty($data['err_amount'] ?? '')) ? 'is-invalid' : ''; ?>"
                                       value="<?php echo $data['amount'] ?? ''; ?>"
                                       oninput="this.value=this.value.replace(/\D/g, '')"
                                       onkeyup="this.value=this.value.replace(/\D/g, '')"
                                       onmouseleave="this.value=this.value.replace(/\D/g, '')">
                                <span class="invalid-feedback  amount"><?php echo $data['err_amount'] ?? ''; ?> </span>
                                <span class=" text-muted pull-right">Amount: only numbers. </span>
                            </div>

                            <div class="form-group">
                                <label for="buyer">Buyer<sub>*</sub></label>
                                <input type="text" name="buyer" id="buyer"
                                       class="form-control form-control-lg <?php echo (!empty($data['err_buyer'] ?? '')) ? 'is-invalid' : ''; ?>"
                                       value="<?php echo $data['buyer'] ?? ''; ?>"
                                       oninput="this.value=this.value.replace(/[^A-Za-z0-9\s]/g, '')"
                                       onkeyup="this.value=this.value.replace(/[^A-Za-z0-9\s]/g, '')"
                                       onmouseleave="this.value=this.value.replace(/[^A-Za-z0-9\s]/g, '')"><span
                                        class="invalid-feedback  buyer"><?php echo $data['err_buyer'] ?? ''; ?> </span>
                                <span class=" text-muted pull-right">Buyer: only text, spaces and numbers, not more than 20 characters.
 </span>
                            </div>
                            <div class="form-group">
                                <label for="receipt_id">Receipt ID <sub>*</sub></label>
                                <input type="text" name="receipt_id" id="receipt_id"
                                       class="form-control form-control-lg <?php echo (!empty($data['err_receipt_id'] ?? '')) ? 'is-invalid' : ''; ?>"
                                       value="<?php echo $data['receipt_id'] ?? ''; ?>"
                                       oninput="this.value=this.value.replace(/[^A-Za-z]/g, '')"
                                       onkeyup="this.value=this.value.replace(/[^A-Za-z]/g, '')"
                                       onmouseleave="this.value=this.value.replace(/[^A-Za-z]/g, '')"><span
                                        class="invalid-feedback receipt_id"><?php echo $data['err_receipt_id'] ?? ''; ?> </span>
                                <span class=" text-muted pull-right">Receipt_id: only text.</span>
                            </div>
                            <div class="form-group">
                                <label for="items">Items <sub>*</sub></label>
                                <input type="text" name="items" id="items"
                                       class="form-control form-control-lg <?php echo (!empty($data['err_items'] ?? '')) ? 'is-invalid' : ''; ?>"
                                       value="<?php echo $data['items'] ?? ''; ?>"
                                       oninput="this.value=this.value.replace(/[^A-Za-z]/g, '')"
                                       onkeyup="this.value=this.value.replace(/[^A-Za-z]/g, '')"
                                       onmouseleave="this.value=this.value.replace(/[^A-Za-z]/g, '')">
                                <span class="invalid-feedback items"><?php echo $data['err_items'] ?? ''; ?> </span>
                                <span class=" text-muted pull-right">Items: only text</span>
                            </div>

                            <div class="form-group">
                                <label for="buyer_email">Buyer Email <sub>*</sub></label>
                                <input type="text" name="buyer_email" id="buyer_email"
                                       class="form-control form-control-lg <?php echo (!empty($data['err_buyer_email'] ?? '')) ? 'is-invalid' : ''; ?>"
                                       value="<?php echo $data['buyer_email '] ?? ''; ?>"
                                       oninput="this.value=this.value.replace(/[^A-Za-z@.\-_0-9]/g, '')"
                                       onkeyup="this.value=this.value.replace(/[^A-Za-z@.\-_0-9]/g, '')"
                                       onmouseleave="this.value=this.value.replace(/[^A-Za-z@.\-_0-9]/g, '')"><span
                                        class="invalid-feedback buyer_email"
                                        id="err_buyer_email"><?php echo $data['err_buyer_email'] ?? ''; ?> </span>
                                <span class=" text-muted pull-right">Buyer_email: only emails.</span>
                            </div>
                            <div class="form-group">
                                <label for="note">Note <sub>*</sub></label>
                                <textarea type="text" name="note" id="note"
                                          class="form-control form-control-lg <?php echo (!empty($data['err_note'] ?? '')) ? 'is-invalid' : ''; ?>"><?php echo $data['note'] ?? ''; ?></textarea><span
                                        class="invalid-feedback note"><?php echo $data['err_note'] ?? ''; ?> </span>
                                <span class=" text-muted pull-right">Note: anything, not more than 30 words, and can be input unicode characters too.</span>
                            </div>
                            <div class="form-group">
                                <label for="city">City <sub>*</sub></label>
                                <input type="text" name="city" id="city"
                                       class="form-control form-control-lg <?php echo (!empty($data['err_city'] ?? '')) ? 'is-invalid' : ''; ?>"
                                       value="<?php echo $data['city'] ?? ''; ?>"
                                       oninput="this.value=this.value.replace(/[^A-Za-z\s]/g, '')"
                                       onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g, '')"
                                       onmouseleave="this.value=this.value.replace(/[^A-Za-z\s]/g, '')">
                                <span class="invalid-feedback city"><?php echo $data['err_city'] ?? ''; ?> </span>
                                <span class=" text-muted pull-right">City: only text and spaces.</span>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone<sub>*</sub></label>
                                <input type="text" name="phone" id="phone"
                                       class="form-control form-control-lg <?php echo (!empty($data['err_phone'] ?? '')) ? 'is-invalid' : ''; ?>"
                                       value="<?php echo $data['phone'] ?? ''; ?>"
                                       oninput="this.value=this.value.replace(/\D/g, '')"
                                       onkeyup="this.value=this.value.replace(/\D/g, '')"
                                       onmouseleave="this.value=this.value.replace(/\D/g, '')"><span
                                        class="invalid-feedback phone"><?php echo $data['err_phone'] ?? ''; ?> </span>
                                <span class=" text-muted pull-right">Phone: only numbers and start with 880</span>
                            </div>
                            <div class="form-group">
                                <label for="entry_by">Entry By <sub>*</sub></label>
                                <input type="text" name="entry_by" id="entry_by"
                                       class="form-control form-control-lg <?php echo (!empty($data['err_entry_by'] ?? '')) ? 'is-invalid' : ''; ?>"
                                       value="<?php echo $data['entry_by'] ?? ''; ?>"
                                       oninput="this.value=this.value.replace(/\D/g, '')"
                                       onkeyup="this.value=this.value.replace(/\D/g, '')"
                                       onmouseleave="this.value=this.value.replace(/\D/g, '')"><span
                                        class="invalid-feedback entry_by"><?php echo $data['err_entry_by'] ?? ''; ?> </span>
                                <span class=" text-muted pull-right">Entry_by: only numbers.</span>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <input type="button" class="btn btn-primary btn-block pull-left" value="Submit"
                                               onclick="submitTransaction();return false;" id="formSubmitButton">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer_script.php'; ?>
    <script type="text/javascript">
        function ValidateEmail(email) {
            const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }

        function phoneValidation(val) {
            var phoneno = /^(?:\+?88)?01[13-9]\d{8}$/;
            if (val.match(phoneno)) {
                return true;
            } else {
                return false;
            }
        }

        function checkNumber(val) {
            val = val.toString();
            var str = /^[0-9]+$/i;
            if (val.match(str)) {
                return true;
            } else {
                return false;
            }
        }

        function checkText(val) {
            val = val.toString();
            var str = /^[a-zA-Z0-9 \s]+$/i;
            if (val.match(str)) {
                return true;
            } else {
                return false;
            }
        }

        function checkTextOnly(val) {
            val = val.toString();
            var str = /^[a-zA-Z]+$/i;
            if (val.match(str)) {
                return true;
            } else {
                return false;
            }
        }

        function checkTextOnlyWithSpace(val) {
            val = val.toString();
            var str = /^[a-zA-Z \s]+$/i;
            if (val.match(str)) {
                return true;
            } else {
                return false;
            }
        }


        function postFormData(id, service_url, callBack) {
            var formData = new FormData(document.getElementById(id));
            var xhr = new XMLHttpRequest();
            xhr.open('POST', service_url, true);
            xhr.send(formData);
            xhr.onreadystatechange = function () {
                callBack(xhr);
            };
        }

        function countWords(str) {
            str = str.replace(/(^\s*)|(\s*$)/gi, "");
            str = str.replace(/[ ]{2,}/gi, " ");
            str = str.replace(/\n /, "\n");
            return str.split(' ').length;
        }

        function formValidation() {
            var noError = true;
            var selector = 'amount';
            var message = 'Please enter valid amount';
            if (!checkNumber(document.getElementById(selector).value) || (document.getElementById(selector).value).length > 10) {
                noError = false;
                setMessage(selector, message);
            } else {
                resetMessage(selector);
            }
            selector = 'buyer';
            message = 'Please enter valid buyer';
            if (!checkText(document.getElementById(selector).value) || (document.getElementById(selector).value).length > 20) {
                noError = false;
                setMessage(selector, message);
            } else {
                resetMessage(selector);
            }
            selector = 'items';
            message = 'Please enter valid items';
            if (!checkTextOnly(document.getElementById(selector).value) || (document.getElementById(selector).value).length > 255) {
                noError = false;
                setMessage(selector, message);
            } else {
                resetMessage(selector);
            }
            selector = 'receipt_id';
            message = 'Please enter valid receipt id';
            if (!checkTextOnly(document.getElementById(selector).value) || (document.getElementById(selector).value).length > 20) {
                noError = false;
                setMessage(selector, message);
            } else {
                resetMessage(selector);
            }

            selector = 'buyer_email';
            message = 'Please enter valid buyer email';
            if (!ValidateEmail(document.getElementById(selector).value) || (document.getElementById(selector).value).length > 50) {
                noError = false;
                setMessage(selector, message);
            } else {
                resetMessage(selector);
            }
            selector = 'note';
            message = 'Please enter valid note';
            if (countWords(document.getElementById(selector).value) > 30) {
                noError = false;
                setMessage(selector, message);
            } else {
                resetMessage(selector);
            }
            if (document.getElementById(selector).value == '') {
                noError = false;
                setMessage(selector, message);
            } else {
                resetMessage(selector);
            }
            selector = 'city';
            message = 'Please enter valid city';
            if (!checkTextOnlyWithSpace(document.getElementById(selector).value) || (document.getElementById(selector).value).length > 20) {
                noError = false;
                setMessage(selector, message);
            } else {
                resetMessage(selector);
            }
            selector = 'phone';
            message = 'Please enter valid phone';
            if (!checkNumber(document.getElementById(selector).value) || (document.getElementById(selector).value).length > 20 || (document.getElementById(selector).value).length < 7 || (document.getElementById(selector).value).substr(0, 3) != '880') {
                noError = false;
                setMessage(selector, message);
            } else {
                resetMessage(selector);
            }
            /*            if (!phoneValidation(document.getElementById(selector).value)) {
                            noError = false;
                            setMessage(selector, message);
                        } else {
                            resetMessage(selector);
                        }*/

            selector = 'entry_by';
            message = 'Please enter valid entry by';
            if (!checkNumber(document.getElementById(selector).value) || (document.getElementById(selector).value).length > 10) {
                noError = false;
                setMessage(selector, message);
            } else {
                resetMessage(selector);
            }
            return noError;
        }

        function resetMessage(selector) {
            document.getElementsByClassName(selector)[0].innerHTML = "";
            document.getElementById(selector).classList.remove('is-invalid');
        }

        function setMessage(selector, message) {
            document.getElementsByClassName(selector)[0].innerHTML = message;
            document.getElementById(selector).classList.add('is-invalid');
        }

        function submitTransaction() {
            document.getElementById("formSubmitButton").disabled = true;
            var noError = formValidation();
            if (noError) {
                var url = "<?php echo URLROOT;?>" + "/transaction/store";
                postFormData('form_transaction', url, function (data) {
                    console.log(data);
                    if (data.readyState == 4) {
                        console.log(data.response);
                        var responseResult = JSON.parse(data.responseText);
                        document.getElementById("form_transaction").reset();
                        alert(responseResult);
                    }
                    document.getElementById("formSubmitButton").disabled = false;
                });
            } else {
                document.getElementById("formSubmitButton").disabled = false;
                return false;
            }
        }


        function check_words(e) {
            var BACKSPACE = 8;
            var DELETE = 46;
            var MAX_WORDS = 30;
            var valid_keys = [BACKSPACE, DELETE];
            var words = this.value.split(' ');

            if (words.length > MAX_WORDS && valid_keys.indexOf(e.keyCode) == -1) {
                e.preventDefault();
                words.length = MAX_WORDS;
                this.value = words.join(' ');
            }
        }

        $(document).ready(function () {
            var phone = document.getElementById('phone').value;
            if (phone.substr(0, 3) != "880") {
                document.getElementById('phone').value = "880";
            }
        });

        var textarea = document.getElementById('note');
        textarea.addEventListener('keydown', check_words);
        textarea.addEventListener('keyup', check_words);
    </script>
<?php require APPROOT . '/views/inc/footer.php'; ?>