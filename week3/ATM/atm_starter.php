<?php
// Include necessary files for account handling
require_once "checking.php";
require_once "savings.php";

// If the form is submitted, retrieve balances from the form, otherwise set initial balances
$checkingBalance = isset($_POST['checkingBalance']) ? floatval($_POST['checkingBalance']) : 1300;
$savingsBalance = isset($_POST['savingsBalance']) ? floatval($_POST['savingsBalance']) : 5000;

// Initialize accounts with the balance retrieved from the form
$checking = new CheckingAccount('C123', $checkingBalance, '12-20-2019');
$savings = new SavingsAccount('S123', $savingsBalance, '03-20-2020');

// Handle POST requests for checking account
if (isset($_POST['withdrawChecking'])) {
    $amount = floatval($_POST['checkingWithdrawAmount']);
    if ($checking->withdrawal($amount)) {
        echo "<p>Checking Account: Withdrawal of $$amount was successful!</p>";
    } else {
        echo "<p>Checking Account: Withdrawal failed. Insufficient funds or exceeded overdraft limit. Current balance: $" . $checking->getBalance() . "</p>";
    }
} elseif (isset($_POST['depositChecking'])) {
    $amount = floatval($_POST['checkingDepositAmount']);
    $checking->deposit($amount);
    echo "<p>Checking Account: Deposit of $$amount was successful! New balance: $" . $checking->getBalance() . "</p>";
}

// Handle POST requests for savings account
if (isset($_POST['withdrawSavings'])) {
    $amount = floatval($_POST['savingsWithdrawAmount']);
    if ($savings->withdrawal($amount)) {
        echo "<p>Savings Account: Withdrawal of $$amount was successful!</p>";
    } else {
        echo "<p>Savings Account: Withdrawal failed. Insufficient funds. Current balance: $" . $savings->getBalance() . "</p>";
    }
} elseif (isset($_POST['depositSavings'])) {
    $amount = floatval($_POST['savingsDepositAmount']);
    $savings->deposit($amount);
    echo "<p>Savings Account: Deposit of $$amount was successful! New balance: $" . $savings->getBalance() . "</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
            margin: auto;
            padding-top: 30px;
        }
        .accountWrapper {
            display: flex;
            justify-content: space-between;
        }
        .accountSection {
            border: 1px solid black;
            padding: 20px;
            width: 45%;
            text-align: left;
        }
        h1 {
            text-align: center;
        }
        .accountInner {
            margin-bottom: 10px;
        }
        .accountInner input[type=text] {
            width: 80px;
        }
        .accountInner input[type=submit] {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <h1>ATM</h1>

    <div class="accountWrapper">
        <div class="accountSection">
            <h2>Checking Account</h2>
            <p>Account ID: <?php echo $checking->getAccountId(); ?></p>
            <p>Balance: $<?php echo number_format($checking->getBalance(), 2); ?></p>
            <p>Account Opened: <?php echo $checking->getStartDate(); ?></p>
            <form method="post">
                <input type="hidden" name="checkingBalance" value="<?php echo $checking->getBalance(); ?>" />
                <input type="hidden" name="savingsBalance" value="<?php echo $savings->getBalance(); ?>" />
                <div class="accountInner">
                    <label>Withdraw:</label>
                    <input type="text" name="checkingWithdrawAmount" value="" />
                    <input type="submit" name="withdrawChecking" value="Withdraw" />
                </div>
                <div class="accountInner">
                    <label>Deposit:</label>
                    <input type="text" name="checkingDepositAmount" value="" />
                    <input type="submit" name="depositChecking" value="Deposit" /><br />
                </div>
            </form>
        </div>

        <div class="accountSection">
            <h2>Savings Account</h2>
            <p>Account ID: <?php echo $savings->getAccountId(); ?></p>
            <p>Balance: $<?php echo number_format($savings->getBalance(), 2); ?></p>
            <p>Account Opened: <?php echo $savings->getStartDate(); ?></p>
            <form method="post">
                <input type="hidden" name="checkingBalance" value="<?php echo $checking->getBalance(); ?>" />
                <input type="hidden" name="savingsBalance" value="<?php echo $savings->getBalance(); ?>" />
                <div class="accountInner">
                    <label>Withdraw:</label>
                    <input type="text" name="savingsWithdrawAmount" value="" />
                    <input type="submit" name="withdrawSavings" value="Withdraw" />
                </div>
                <div class="accountInner">
                    <label>Deposit:</label>
                    <input type="text" name="savingsDepositAmount" value="" />
                    <input type="submit" name="depositSavings" value="Deposit" /><br />
                </div>
            </form>
        </div>
    </div>
</body>
</html>
