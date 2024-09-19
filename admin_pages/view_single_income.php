<?php
require 'includes/db.php';
require 'session.php';
$result = mysqli_query($conn, "SELECT * FROM users WHERE user_id='$session_id'") or DIE('Error In Session');
$row = mysqli_fetch_array($result);
// Check if 'id' is set in the URL, if not show an error or redirect
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Error: Case ID is missing!";
    exit(); // Stop the script if id is not provided
}

// Get the case ID from the URL
$caseId = $_GET['id'];

// Fetch case details from the database (from case_submissions table)
$sql = "SELECT id, names, gender, marriage_status, education_level, religion_beliefs, display_name, residence, phone, email, case_type, case_overview, attachments, assistance_suggestion, submission_date, status 
        FROM case_submissions 
        WHERE id = $caseId";
$result = mysqli_query($conn, $sql);

// Check if the case exists
if (!$result || mysqli_num_rows($result) == 0) {
    echo "Case not found!";
    exit();
}

$case = mysqli_fetch_assoc($result);

require 'main_pages/top_nav.php';
?>

<div class="container-fluid">
    <h3 class="text-dark mb-4">Case Details</h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="m-0 fw-bold" style="color: rgb(14, 69, 58);">Case Details for
                <?php echo $case['display_name'] ? $case['names'] : 'Anonymous'; ?>
            </p>
        </div>
        <div class="card-body" style="margin-top: -3px;">
            <form style="margin-top: 15px;" action="" method="POST">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="names">
                                <strong>Full Name</strong>
                            </label>
                            <input class="form-control" type="text" placeholder="Full Name"
                                value="<?php echo $case['names']; ?>" readonly="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="gender">
                                <strong>Gender</strong>
                            </label>
                            <input class="form-control" type="text" placeholder="Gender"
                                value="<?php echo $case['gender']; ?>" readonly="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="marriage_status">
                                <strong>Marriage Status</strong>
                            </label>
                            <input class="form-control" type="text" placeholder="Marriage Status"
                                value="<?php echo $case['marriage_status']; ?>" readonly="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="education_level">
                                <strong>Education Level</strong>
                            </label>
                            <input class="form-control" type="text" placeholder="Education Level"
                                value="<?php echo $case['education_level']; ?>" readonly="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="religion_beliefs">
                                <strong>Religion Beliefs</strong>
                            </label>
                            <input class="form-control" type="text" placeholder="Religion Beliefs"
                                value="<?php echo $case['religion_beliefs']; ?>" readonly="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="residence">
                                <strong>Residence</strong>
                            </label>
                            <input class="form-control" type="text" placeholder="Residence"
                                value="<?php echo $case['residence']; ?>" readonly="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="phone">
                                <strong>Phone Number</strong>
                            </label>
                            <input class="form-control" type="text" placeholder="Phone"
                                value="<?php echo $case['phone']; ?>" readonly="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="email">
                                <strong>Email</strong>
                            </label>
                            <input class="form-control" type="email" placeholder="Email"
                                value="<?php echo $case['email']; ?>" readonly="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="case_type">
                                <strong>Case Type</strong>
                            </label>
                            <input class="form-control" type="text" placeholder="Case Type"
                                value="<?php echo $case['case_type']; ?>" readonly="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="case_overview">
                                <strong>Case Overview</strong>
                            </label>
                            <textarea class="form-control" rows="5"
                                readonly=""><?php echo $case['case_overview']; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="assistance_suggestion">
                                <strong>Suggested Assistance</strong>
                            </label>
                            <textarea class="form-control" rows="5"
                                readonly=""><?php echo $case['assistance_suggestion']; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="submission_date">
                                <strong>Submission Date</strong>
                            </label>
                            <input class="form-control" type="text" value="<?php echo $case['submission_date']; ?>"
                                readonly="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="status">
                                <strong>Status</strong>
                            </label>
                            <input ccalass="form-control" type="text" value="<?php echo $case['status']; ?>"
                                readonly="">
                        </div>
                    </div>
                </div>

                <!-- Display Attachments if any -->
                <?php if (!empty($case['attachments'])): ?>
                    <p><strong>Attachments:</strong></p>
                    <ul>
                        <?php
                        $attachments = explode(',', $case['attachments']); // Assuming multiple files are stored as comma-separated values
                        foreach ($attachments as $file):
                            $file = trim($file); // Trim any extra spaces from the file name
                            ?>
                            <!-- Correct file path with '/' separator and referencing casesDoc folder under admin_pages -->
                            <li><a href="casesDoc/<?php echo $file; ?>" target="_blank">View Attachment</a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>No attachments available.</p>
                <?php endif; ?>



                <div class="mb-3">
                    <a class="btn btn-primary btn-sm" role="button" href="incomes.php">Back to Cases List</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require 'main_pages/footer.php';
?>