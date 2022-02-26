<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="container mt-5">
        <h2 class="text-center mb-5">Simple PHP form submission script with frontend validation
        </h2>
        <h5 class="text-center mb-5"> <a class="nav-link" href="<?php echo URLROOT; ?>/transaction/add">To add new data click here</a> </h5>

        <!-- Select dropdown -->
        <div class="">
            <form action="<?php echo URLROOT; ?>/transaction" method="get">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Filter and change limit</h5>
                        <!--Grid row-->
                        <div class="row">
                            <!--Grid column-->
                            <div class="col-md-6 mb-4">
                                <div class="md-form">
                                    <!--The "from" Date Picker -->
                                    <label for="startDate">Starting date</label>
                                    <input placeholder="Selected starting date" type="text" id="startDate"
                                           name="startDate"
                                           class="form-control datepicker"
                                           value="<?php if (isset($_SESSION['startDate'])) echo $_SESSION['startDate']; ?>">
                                </div>
                            </div>
                            <!--Grid column-->
                            <!--Grid column-->
                            <div class="col-md-6 mb-4">
                                <div class="md-form">
                                    <!--The "to" Date Picker -->
                                    <label for="endDate">Ending date</label>
                                    <input placeholder="Selected ending date" type="text" id="endDate" name="endDate"
                                           class="form-control datepicker"
                                           value="<?php if (isset($_SESSION['endDate'])) echo $_SESSION['endDate']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="md-form">
                                    <!--The "to" Date Picker -->
                                    <label for="endDate">User ID</label>
                                    <input placeholder="User ID" type="text" id="userID"
                                           class="form-control " name="userID"
                                           value="<?php if (isset($_SESSION['userID'])) echo $_SESSION['userID']; ?>"
                                           oninput="this.value=this.value.replace(/\D/g, '')"
                                           onkeyup="this.value=this.value.replace(/\D/g, '')"
                                           onmouseleave="this.value=this.value.replace(/\D/g, '')">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="md-form">
                                    <!--The "to" Date Picker -->
                                    <label for="recordsLimit">Set Record Limit</label>
                                    <select name="recordsLimit" id="recordsLimit" class="custom-select">
                                        <option disabled selected>Records Limit</option>
                                        <?php foreach ([5, 7, 10, 12] as $limit) : ?>
                                            <option
                                                <?php if (isset($_SESSION['recordsLimit']) && $_SESSION['recordsLimit'] == $limit) echo 'selected'; ?>
                                                    value="<?= $limit; ?>">
                                                <?= $limit; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <!--Grid column-->
                            <div class="col-md-6 mb-4">
                                <div class="md-form">
                                    <!--The "from" Date Picker -->
                                    <button type="submit" class="btn btn-primary btn-block pull-left">Submit</button>
                                </div>
                            </div>
                        </div>
                        <!--Grid row-->
                    </div>
                </div>
            </form>
        </div>
        <!-- Datatable -->
        <table class="table table-bordered table-responsive mb-5">
            <thead>
            <tr class="table-success">
                <th scope="col">ID</th>
                <th scope="col">Amount</th>
                <th scope="col">Buyer</th>
                <th scope="col">Receipt id</th>
                <th scope="col">Items</th>
                <th scope="col">Buyer email</th>
                <th scope="col">Buyer ip</th>
                <th scope="col">Note</th>
                <th scope="col">City</th>
                <th scope="col">Phone</th>
                <th scope="col" >Hash key</th>
                <th scope="col">Entry at</th>
                <th scope="col">Entry by</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data['transactionData'] as $tr): ?>
                <tr>
                    <td scope="row"><?php echo $tr->id; ?></td>
                    <td><?php echo $tr->amount; ?></td>
                    <td scope="row"><?php echo $tr->buyer; ?></td>
                    <td><?php echo $tr->receipt_id; ?></td>
                    <td scope="row"><?php echo $tr->items; ?></td>
                    <td><?php echo $tr->buyer_email; ?></td>
                    <td scope="row"><?php echo $tr->buyer_ip; ?></td>
                    <td><?php echo $tr->note; ?></td>
                    <td scope="row"><?php echo $tr->city; ?></td>
                    <td><?php echo $tr->phone; ?></td>
                    <td scope="row"><?php echo $tr->hash_key; ?></td>
                    <td><?php echo showDate($tr->entry_at); ?></td>
                    <td scope="row"><?php echo $tr->entry_by; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Pagination -->
        <nav aria-label="Page navigation example mt-5">
            <ul class="pagination justify-content-center">
                <li class="page-item <?php if ($data['page'] <= 1) {
                    echo 'disabled';
                } ?>">
                    <a class="page-link"
                       href="<?php if ($data['page'] <= 1) {
                           echo '#';
                       } else {
                           echo "?page=" . $data['prev'] . '&startDate=' . $_SESSION['startDate'] . '&endDate=' . $_SESSION['endDate'] . '&userID=' . $_SESSION['userID'];
                       } ?>">Previous</a>
                </li>
                <?php for ($i = 1; $i <= $data['totoalPages']; $i++): ?>
                    <li class="page-item <?php if ($data['page'] == $i) {
                        echo 'active';
                    } ?>">
                        <a class="page-link"
                           href="<?php echo URLROOT; ?>/transaction/index?page=<?= $i; ?>&startDate=<?= $_SESSION['startDate'] ?? ''; ?>&endDate=<?= $_SESSION['endDate'] ?? ''; ?>&userID=<?= $_SESSION['userID'] ?? ''; ?>"> <?= $i; ?> </a>
                    </li>
                <?php endfor; ?>
                <li class="page-item <?php if ($data['page'] >= $data['totoalPages']) {
                    echo 'disabled';
                } ?>">
                    <a class="page-link"
                       href="<?php if ($data['page'] >= $data['totoalPages']) {
                           echo '#';
                       } else {
                           echo "?page=" . $data['next'] . '&startDate=' . $_SESSION['startDate'] . '&endDate=' . $_SESSION['endDate'] . '&userID=' . $_SESSION['userID'];
                       } ?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>
<?php require APPROOT . '/views/inc/footer_script.php'; ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#recordsLimit').change(function () {
                $('form').submit();
            })
        });
        var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        $('#startDate').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            maxDate: function () {
                return $('#endDate').val();
            }
        });
        $('#endDate').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: function () {
                return $('#startDate').val();
            }
        });
    </script>
<?php require APPROOT . '/views/inc/footer.php'; ?>