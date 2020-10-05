<?php
    session_start();
    $amount = $_POST['amount'];
    $recip = $_POST['recipient'];
    $myid = $_SESSION['userid'];

    if(!is_numeric($amount)){
        header('Location: transfer.php?error=3');
    }else{
        $conn = new mysqli('localhost', 'kristaluser', 'Welkom01', 'kristalbank');
        $sql1 = "SELECT * FROM `kb_useraccounts` WHERE id=?";

        $stmt = $conn->prepare($sql1);
        $stmt->bind_param("s", $myid);
        $stmt->execute();
        $result = $stmt->get_result();
        $user1 = $result->fetch_assoc();

        $sql3 = "SELECT * FROM `kb_useraccounts` WHERE id=?";
        $stmt3 = $conn->prepare($sql3);
        $stmt3->bind_param("s", $recip);
        $stmt3->execute();
        $result3 = $stmt3->get_result();
        $user2 = $result3->fetch_assoc();
        $recipname = $user2['fName'] . " " . $user2['lName'];

        if($result3->num_rows > 0){
            if($amount < $user1['balance'] && $amount > 0){
                $newbalance = $user1['balance'] - $amount;
                $sql2 = "UPDATE `kb_useraccounts` SET balance=? WHERE id=?";
                $sql4 = "UPDATE `kb_useraccounts` SET balance=? WHERE id=?";


                $stmt2 = $conn->prepare($sql2);
                $stmt2->bind_param("ss", $newbalance, $myid);
                $stmt2->execute();

                $newbalance2start = $result3;
                $newbalance2start2 = $newbalance2start->fetch_assoc();
                $newbalance2 = $newbalance2start2['balance'] + $amount;

                $stmt4 = $conn->prepare($sql4);
                $stmt4->bind_param("ss", $newbalance2, $recip);
                $stmt4->execute();

                $today = date("Y/m/d");
                $sql5 = "INSERT INTO `kb_payments` (user, amount, posneg, reason, date) VALUES (?, ?, 'pos', ?, NOW())";
                $stmt5 = $conn->prepare($sql5);

                if($stmt5 === false) {
                    die("Could not prepare statement: " . $conn->error);
                }
                $reason = "Van " . $user1['fName'] . " " . $user1['lName'];
                $stmt5->bind_param("iis", $recip, $amount, $reason);
                $stmt5->execute();

                $sql6 = "INSERT INTO `kb_payments` (user, amount, posneg, reason, date) VALUES (?, ?, 'neg', ?, NOW())";
                $stmt6 = $conn->prepare($sql6);

                if($stmt6 === false) {
                    die("Could not prepare statement: " . $conn->error);
                }
                $reason = "Naar " . $recipname;
                $stmt6->bind_param("iis", $myid, $amount, $reason);
                $stmt6->execute();
                header('Location: transfer.php?error=0'); 
            }else{
                header('Location: transfer.php?error=1'); 
            }
        }else{
            header('Location: transfer.php?error=2'); 
        }


    }
?>


        