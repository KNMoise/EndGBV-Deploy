<?php
include '../includes/db.php';

      if (isset($_POST['save_question'])) {

         $question = mysqli_escape_string($conn, $_POST['question']);
         $answer = mysqli_escape_string($conn, $_POST['answer']);

            if (empty($question) || empty($answer)) {
               header("location: ../client_side_pages.php?error=noquestions");
            }else{
               $query = "INSERT INTO faqs(question, answer) VALUES('$question', '$answer');";
               mysqli_query($conn, $query);
               header("location: ../client_side_pages.php?error=faqssuccess");
            }
      }
?>