<?php
require 'includes/db.php';
require 'session.php';

$result = mysqli_query($conn, "SELECT * FROM users WHERE user_id='$session_id'") or DIE('Error In Session');
$row = mysqli_fetch_array($result);

require 'main_pages/top_nav.php';
?>

<div class="container-fluid">
    <h3 class="text-dark mb-4">CASES</h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">New Case&nbsp;</p>
        </div>
        <div class="card-body" style="margin-top: -3px;">
            <div class="row">
                <?php
                $full_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                if (strpos($full_url, "error=emptyfields") !== false) {
                    echo "
                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            Empty Fields Or No Data Provided!!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    ";
                }
                ?>
                <div class="col-md-6 text-nowrap">
                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"
                        style="text-align: left;">
                        <a class="btn btn-success btn-icon-split" role="button" href="view_cases.php">
                            <span class="text-white-50 icon">
                                <i class="fas fa-eye"></i>
                            </span>
                            <span class="text-white text">View Cases</span>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-md-end dataTables_filter" id="dataTable_filter"></div>
                </div>
            </div>

            <!-- New Case Submission Form -->
            <form style="margin-top: 15px" action="operations/send_case_to_db.php" id="multiStepForm"
                method="POST" enctype="multipart/form-data">

                <div class="row">
                    <!-- Personal Information -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="names">
                                <strong> Name</strong>
                            </label>
                            <input class="form-control" type="text" placeholder="Full Name" name="names" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="gender">
                                <strong>Gender</strong>
                            </label>
                            <select class="form-control" name="gender" id="gender" required>
                                <option value="" disabled selected>Select your gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="not-specified">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="marriage-status">
                                <strong>Marriage Status</strong>
                            </label>
                            <select class="form-control" id="marriage-status" name="marriage-status" required>
                                <option value="" disabled selected>Select your status</option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="divorced">Divorced</option>
                                <option value="widowed">Widowed</option>
                                <option value="relationship">Relationship</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="education-level">
                                <strong>Education Level</strong>
                            </label>
                            <select class="form-control" id="education-level" name="education-level" required>
                                <option value="" disabled selected>Select your education level</option>
                                <option value="no-formal-education">No Formal Education</option>
                                <option value="primary-education">Primary Education</option>
                                <option value="secondary-education">Secondary Education</option>
                                <option value="bachelor-degree">Bachelor's Degree</option>
                                <option value="master-degree">Master's Degree</option>
                                <option value="doctorate">Doctorate</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="religion-beliefs">
                                <strong>Religion Beliefs</strong>
                            </label>
                            <select class="form-control" id="religion-beliefs" name="religion-beliefs" required>
                                <option value="" disabled selected>Select your religion</option>
                                <option value="christianity">Christianity</option>
                                <option value="islam">Islam</option>
                                <option value="hinduism">Hinduism</option>
                                <option value="buddhism">Buddhism</option>
                                <option value="judaism">Judaism</option>
                                <option value="atheism">Atheism</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="display-name">
                                <strong>Display Name</strong>
                            </label>
                            <select class="form-control" id="display-name" name="display-name" required>
                                <option value="1">Yes, display my name</option>
                                <option value="0">No, keep me anonymous</option>
                            </select>
                        </div>
                    </div>
                    <!-- Contact Information -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="residence">
                                <strong>Residence</strong>
                            </label>
                            <input class="form-control" type="text" placeholder="Residence" name="residence" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="phone">
                                <strong>Contact Info</strong>
                            </label>
                            <input class="form-control" type="tel" placeholder="Contact" name="phone" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="email">
                                <strong>Email</strong>
                            </label>
                            <input class="form-control" type="email" placeholder="Email" name="email">
                        </div>
                    </div>
                    <!-- Case Details -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="case-type">
                                <strong>Case Type</strong>
                            </label>
                            <select class="form-control" id="case-type" name="case-type" required>
                                <option value="physical-violence">Physical Violence</option>
                                <option value="sexual-violence">Sexual Violence</option>
                                <option value="emotional-psychological-violence">Emotional Psychological Violence
                                </option>
                                <option value="harmful-traditional-practices">Harmful Traditional Practices and Customs
                                </option>
                                <option value="online-digital-violence">Online and Digital Violence</option>
                                <option value="structural-violence">Structural Violence</option>
                                <option value="economic-violence">Economic Violence</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="submission_date">
                                <strong>Case Date</strong>
                            </label>
                            <input class="form-control" type="date" name="submission_date"
                                value="<?php echo date('Y-m-d'); ?>" disabled>
                        </div>
                    </div>
                    <!-- Case Overview and Assistance Suggestion -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="case-overview">
                                <strong>Case Overview</strong>
                            </label>
                            <textarea class="form-control" rows="5" placeholder="Case Overview" name="case-overview"
                                required></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="assistance-suggestion">
                                <strong>Assistance Suggestion</strong>
                            </label>
                            <textarea class="form-control" rows="5" placeholder="Suggested Assistance"
                                name="assistance_suggestion" required></textarea>
                        </div>
                    </div>
                    <!-- Attachments -->
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="attachments">Attachments:</label>
                            <input type="file" id="attachments" name="attachments" multiple />
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                <button type="submit" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require 'main_pages/footer.php';
?>