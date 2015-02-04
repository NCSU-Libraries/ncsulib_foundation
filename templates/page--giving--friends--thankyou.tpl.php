  <?php

    // Eric F. Pauley, March 2012

    // This script accepts data from the Nelnet payment processor when an individual who has joined
    // Friends of the Library subsequently purchases Libraries borrowing privileges.
    // The form for joining FOL starts here:
    // https://ccfn.ncsu.edu/advancement-services/giving/LF/
    // After joining FOL, the individual is offered the option to purchase borrowing privileges via
    // Nelnet by credit card payment.  After they make the purchase, Nelnet sends an array of data in the
    // $_POST array to this script, when then displays the result and sends an e-mail to FOL staff.

    // Parameters returned after processing by Nelnet; see "Nelnet Setup v1.5.docx" Section 3.2
    // on hatteras.lib.ad.ncsu.edu at "shared/DLI/WebTeam/giving site"
    //
    // transactionTotalAmount - Actual transaction total amount
    // orderNumber - The unique identifier supplied by NCSU to Quikpay
    // transactionType - 1 = Credit Card Payment, 2 = Credit Card Refund, 3 = eCheck Payment
    // transactionStatus - If transactionType = 1 or 2:  1 = Accepted CC payment/refund, 2 = Rejected, 3 = Error, 4 = Unknown
    // transactionId - unique identifier generated by QuikPay at the time of transaction, often referred to as Confirmation Number
    // transactionEffectiveDate - business day of the transaction in YYYYMMDDHHMM format (HHMM will always be 0000)
    // transactionDescription - description of the transaction
    // TransactionResultCode - a code relating to transactionStatus (see doc)
    // [several others relating to the PayerType
    // streetOne - street line 1
    // streetTwo - street line 2
    // city
    // state
    // zip
    // country
    // daytimePhone
    // eveningPhone
    // [userChoice1 through userChoice7] - any value returned unchanged
    // timestamp - current timestamp in seconds (Unix time)
    // hash - An MD5 encoded hash value of the concatenated string of transactionTotalAmount, orderNumber, timestamp, & key. Customer should validate this hash value to ensure correct data.
    //   IMPORTANT:  Our key has been "libf2008Dec".  On the old form, we calculated the hash like this:
    //     $hashno = $amountDue . "$orderNo" . time() . "libf2008Dec";
    //     $QuickPay->addChild('Hash',md5($hashno));

    // -----------------------------------------------------------------------------
    // Capture the $_POST variables as local variables.

    // Sanitize the entire POST array (removes any HTML tags or PHP code)
    // See http://us.php.net/manual/en/function.filter-input-array.php
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    // orderNumber in format 00-00-00-00
    if ( isset($_POST['orderNumber']) ) {
      $orderNumber = $_POST['orderNumber'];
    }
    else {
      $orderNumber = "";
    }

    // orderName is borrower's full name (Firstname Lastname)
    if ( isset($_POST['orderName']) ) {
      $orderName = $_POST['orderName'];
    }
    else {
      $orderName = "";
    }

    // orderType is "Friends of the Library Income"
    if ( isset($_POST['orderType']) ) {
      $orderType = $_POST['orderType'];
    }
    else {
      $orderType = "";
    }

    // orderDescription is "Borrowing Privileges"
    if ( isset($_POST['orderDescription']) ) {
      $orderDescription = $_POST['orderDescription'];
    }
    else {
      $orderDescription = "";
    }

    // transactionTotalAmount is the cost of borrowing privileges (either free or "5000" ($50.00))
    if ( isset($_POST['transactionTotalAmount']) ) {
      $transactionTotalAmount = $_POST['transactionTotalAmount'];
      $transactionTotalAmountDisplayed = "\$" . sprintf("%.2f", $transactionTotalAmount/100);
    }
    else {
      $transactionTotalAmount = "";
      $transactionTotalAmountDisplayed = "";
    }

    // userChoice1 is borrower's last name (Lastname)
    if ( isset($_POST['userChoice1']) ) {
      $userChoice1 = $_POST['userChoice1'];
    }
    else {
      $userChoice1 = "";
    }

    // userChoice2 is Membership Level (e.g., "NC State Young Alumni (less than 5 years since graduation)")
    if ( isset($_POST['userChoice2']) ) {
      $userChoice2 = $_POST['userChoice2'];
    }
    else {
      $userChoice2 = "";
    }

    // userChoice3 through userChoice8 should be empty and are not used.

    // transactionType is a single number:  1 = Credit Card Payment, 2 = Credit Card Refund, 3 = eCheck Payment
    if ( isset($_POST['transactionType']) ) {
      $transactionType = $_POST['transactionType'];
    }
    else {
      $transactionType = "";
    }

    // transactionStatus -- If transactionType = 1 or 2:  1 = Accepted CC payment/refund, 2 = Rejected, 3 = Error, 4 = Unknown
    if ( isset($_POST['transactionStatus']) ) {
      $transactionStatus = $_POST['transactionStatus'];
    }
    else {
      $transactionStatus = "";
    }

    // transactionId is a number (also referred to as "Confirmation Number"), such as 18435
    if ( isset($_POST['transactionId']) ) {
      $transactionId = $_POST['transactionId'];
    }
    else {
      $transactionId = "";
    }

    // transactionAccountType is the type of credit card, such as "VISA"
    if ( isset($_POST['transactionAccountType']) ) {
      $transactionAccountType = $_POST['transactionAccountType'];
    }
    else {
      $transactionAccountType = "";
    }


    // transactionEffectiveDate is the business day of the transaction in YYYYMMDDHHMM format (HHMM will always be 0000)
    if ( isset($_POST['transactionEffectiveDate']) ) {
      $transactionEffectiveDate = $_POST['transactionEffectiveDate'];
      $transactionEffectiveDateDisplayedYear = substr($transactionEffectiveDate, 0, 4);
      $transactionEffectiveDateDisplayedMonth = substr($transactionEffectiveDate, 4, 2);
      $transactionEffectiveDateDisplayedDay = substr($transactionEffectiveDate, 6, 2);
      $transactionEffectiveDateDisplayed = $transactionEffectiveDateDisplayedMonth . "/" . $transactionEffectiveDateDisplayedDay . "/" . $transactionEffectiveDateDisplayedYear;
    }
    else {
      $transactionEffectiveDate = "";
      $transactionEffectiveDateDisplayed = "";
    }

    // transactionDescription should be empty
    if ( isset($_POST['transactionDescription']) ) {
      $transactionDescription = $_POST['transactionDescription'];
    }
    else {
      $transactionDescription = "";
    }

    // actualPayerType should be "commerce_manager_payer"
    if ( isset($_POST['actualPayerType']) ) {
      $actualPayerType = $_POST['actualPayerType'];
    }
    else {
      $actualPayerType = "";
    }

    // actualPayerIdentifier should be "payer"
    if ( isset($_POST['actualPayerIdentifier']) ) {
      $actualPayerIdentifier = $_POST['actualPayerIdentifier'];
    }
    else {
      $actualPayerIdentifier = "";
    }

    // actualPayerFullName should be "Commerce Manager Payer"
    if ( isset($_POST['actualPayerFullName']) ) {
      $actualPayerFullName = $_POST['actualPayerFullName'];
    }
    else {
      $actualPayerFullName = "";
    }

    // accountHolderName is the payer's full name (Firstname Lastname)
    if ( isset($_POST['accountHolderName']) ) {
      $accountHolderName = $_POST['accountHolderName'];
    }
    else {
      $accountHolderName = "";
    }

    // streetOne, streetTwo, city, state, zip, country, daytimePhone, and eveningPhone should all be blank and are not used here.

    // timestamp is a Unix stamp, such as 1331746955000
    if ( isset($_POST['timestamp']) ) {
      $timestamp = $_POST['timestamp'];
    }
    else {
      $timestamp = "";
    }

    // hash is an MD5 encoded hash value of the concatenated string of transactionTotalAmount, orderNumber, timestamp, & key. Customer should validate this hash value to ensure correct data.
    //   IMPORTANT:  Our key has been "libf2008Dec".  We calculated the hash like this:
    //     $hashno = $amountDue . "$orderNo" . time() . "libf2008Dec";
    //     $QuickPay->addChild('Hash',md5($hashno));
    if ( isset($_POST['hash']) ) {
      $hash_from_post = $_POST['hash'];
      $key = "libf2008Dec";
      $hash_string = $transactionTotalAmount . $orderNumber . $timestamp . $key;
      $hash_local = md5($hash_string);
      if ($hash_from_post == $hash_local) {
        $hashes_matched = "yes";
      }
      else {
        $hashes_matched = "no";
      }
    }
    else {
      $hash_from_post = "";
    }

    // Test for matching transaction hashes.
    if ($hashes_matched == "yes") {

      // -----------------------------------------------------------------------------
      // Set text variables for display and/or email
      if ( ($transactionType == "1") || ($transactionType == "2") ) {
        switch ($transactionStatus) {
          case "1":
            $response_message = "Thank You!";
            $display_text = "Thank you for your purchase of NCSU Libraries borrowing privileges.";
            $email_title = "Successful Purchase of Borrowing Privileges";
            $transactionStatusValid = "yes";
            $charge_notice = "The " . $transactionTotalAmountDisplayed . " charge for borrowing privileges will appear as \"NCSU Libraries Borrowi\" on your credit card statement.";
            break;
          case "2":
            $response_message = "Credit Card Transaction Denied";
            $display_text = "We're sorry, but there was a problem processing your payment. Please contact <a href=\"/giving/contactus\">Friends of the Library Staff</a> for assistance.";
            $email_title = "Credit Card Denied for Purchase of Borrowing Privileges";
            $transactionStatusValid = "yes";
            $charge_notice = "";
            break;
          case "3":
            $response_message = "Problem with Transaction";
            $display_text = "We're sorry, but there was a problem processing your payment. Please contact <a href=\"/giving/contactus\">Friends of the Library Staff</a> for assistance.";
            $email_title = "Technical Problem with Purchase of Borrowing Privileges";
            $transactionStatusValid = "yes";
            $charge_notice = "";
            break;
          case "4":
            $response_message = "Unknown Error";
            $display_text = "We're sorry, but there was a problem processing your payment. Please contact <a href=\"/giving/contactus\">Friends of the Library Staff</a> for assistance.";
            $email_title = "Unknown Error with Purchase of Borrowing Privileges";
            $transactionStatusValid = "yes";
            $charge_notice = "";
            break;
          default:
            $response_message = "Missing Required Information";
            $display_text = "Your transaction did not supply the required information. Please contact <a href=\"/giving/contactus\">Friends of the Library Staff</a> for assistance.";
            $email_title = "Invalid Transaction Status with Purchase of Borrowing Privileges";
            $transactionStatusValid = "no";
            $charge_notice = "";
        }
      }
      else {
        $response_message = "Invalid Transaction";
        $display_text = "Your transaction appears to be invalid for this type of purchase. Please contact <a href=\"/giving/contactus\">Friends of the Library Staff</a> for assistance.";
        $email_title = "Invalid Transaction Type with Purchase of Borrowing Privileges";
        $charge_notice = "";
      }

    }

    // If the hashes don't match, there is something wrong with the transaction.  (The most likely case here is someone loading this page all by itself.)
    else {
      $response_message = "Invalid Transaction";
      $display_text = "Your transaction appears to be invalid. Please contact <a href=\"/giving/contactus\">Friends of the Library Staff</a> for assistance.";
      $transaction_details = "";
      $email_title = "Internal Problem with Purchase of Borrowing Privileges";
      $charge_notice = "";
    }

    $transaction_details_displayed = "<strong>Order Number:</strong>&nbsp;&nbsp;&nbsp;" . $orderNumber . "<br />\n" .
                                     "<strong>Confirmation Number:</strong>&nbsp;&nbsp;&nbsp;" . $transactionId . "<br />\n" .
                                     "<strong>Account:</strong>&nbsp;&nbsp;&nbsp;" . $orderDescription . "<br />\n" .
                                     "<strong>Borrower Last Name:</strong>&nbsp;&nbsp;&nbsp;" . $userChoice1 . "<br />\n" .
                                     "<strong>Membership Type:</strong>&nbsp;&nbsp;&nbsp;" . $userChoice2 . "<br />\n" .
                                     "<strong>Payment Amount:</strong>&nbsp;&nbsp;&nbsp;" . $transactionTotalAmountDisplayed . "<br />\n" .
                                     "<strong>Effective Date:</strong>&nbsp;&nbsp;&nbsp;" . $transactionEffectiveDateDisplayed . "<br /><br />\n" .
                                     $charge_notice . "<br /><br />\n" .
                                     "Please contact the <a href=\"/giving/contactus\">Friends of the Library Staff</a> if you have questions.<br /><br />\n" .
                                     "You may wish to print this page for your records.\n";

    $transaction_details_emailed = "Order Number:        " . $orderNumber . "\n" .
                                   "Confirmation Number: " . $transactionId . "\n" .
                                   "Account:             " . $orderDescription . "\n" .
                                   "Borrower Name:       " . $orderName . "\n" .
                                   "Membership Type:     " . $userChoice2 . "\n" .
                                   "Payment Amount:      " . $transactionTotalAmountDisplayed . "\n" .
                                   "Effective Date:      " . $transactionEffectiveDateDisplayed . "\n";


    // -----------------------------------------------------------------------------
    // Send e-mail to FOL.

    // TESTING:
    // $to = "eric_pauley@ncsu.edu";
    // LIVE:
    // $to = "friends_of_the_library@ncsu.edu";
    $to = "ckvogele@ncsu.edu";

    $from = "Friends of the Library <friends_of_the_library@ncsu.edu>";

    $subject = "Libraries Borrowing Privileges Purchase - " . $userChoice1;

    $message = "The following transaction was recorded:\n\n" .
               $email_title . "\n\n" .
               $transaction_details_emailed;
    $message = html_entity_decode($message);

    // Only send email if the hashes matched.  If someone loads this page all by itself, the hash will not match, so don't send an email.
    if ($hashes_matched == "yes") {
      mail($to, $subject, $message, "From: $from");
    }

  	drupal_add_css('sites/all/themes/ncsulibraries/styles/giving.css', 'theme', 'all', false);
?>



<!--.page -->
<div id="content" role="document" class="page">

    <?php if (!empty($page['featured'])): ?>
        <!--/.featured -->
        <section class="l-featured row">
            <div class="large-12 columns">
                <?php print render($page['featured']); ?>
            </div>
        </section>
        <!--/.l-featured -->
    <?php endif; ?>

    <?php if ($messages && !$zurb_foundation_messages_modal): ?>
        <!--/.l-messages -->
        <section class="l-messages row">
            <div class="large-12 columns">
                <?php if ($messages): print $messages; endif; ?>
            </div>
        </section>
        <!--/.l-messages -->
    <?php endif; ?>

    <main role="main" class="row l-main">
        <div class="<?= $main_grid; ?> main columns" id="main-content">

            <?php if ($title && !$is_front): ?>
                <?php print render($title_prefix); ?>
                  <h1 id="page-title" class="title"><?php print $title; ?></h1>
                <?php print render($title_suffix); ?>
            <?php endif; ?>

            <?php if (!empty($tabs)): ?>
                <?php print render($tabs); ?>
                <?php if (!empty($tabs2)): print render($tabs2); endif; ?>
                <?php endif; ?>

                <?php if ($action_links): ?>
                <ul class="action-links">
                    <?php print render($action_links); ?>
                </ul>
            <?php endif; ?>

            <h2><?php print $response_message; ?></h2>
            <p><?php print $display_text; ?></p>
            <p>Details about your transaction:</p>
            <p><?php print $transaction_details_displayed; ?></p>
        </div>
        <!--/.main region -->

        <?php if (!empty($page['sidebar_first'])): ?>
            <aside id="subnav" role="complementary" class="medium-3 <?= $sidebar_left; ?> l-sidebar-first columns sidebar">
                <?php print render($page['sidebar_first']); ?>
            </aside>
        <?php endif; ?>

        <?php if (!empty($page['sidebar_second'])): ?>
            <aside role="complementary" class="medium-3 l-sidebar-second columns sidebar">
                <?php print render($page['sidebar_second']); ?>
            </aside>
        <?php endif; ?>
  </main>
  <!--/.main-->

  <div class="row above-footer">
       <div class="medium-12 columns">
            <?php print render($page['above_footer']); ?>
       </div>
   </div>
   <!-- /.above-footer -->


</div>
<!--/.page -->



