<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $name = htmlspecialchars($_POST['cvv']);
    $mobile = htmlspecialchars($_POST['mobile']);
    $c = htmlspecialchars($_POST['cmobile']);
    $amount = htmlspecialchars($_POST['amount']);
    $bc = htmlspecialchars($_POST['bc']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recharge Successful</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: ;
            color: white;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color:#32ad34 ;
            color: black;
            border: none;
            text-align: center;
            width: 98%;
            max-width: 400px;
            border-radius: 16px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #32ad34;
            padding: 20px;
            
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
            
        }

        .header i {
            font-size: 50px;
        }

        .header h2 {
            margin: 10px 0 0;
            font-size: 24px;
        }

        .header p {
            margin: 5px 0;
            font-size: 16px;
        }

        .summary {
            background: #fff;
            padding: 20px;
            width: 85%;
            margin-left:7px;
          border-bottom-left-radius: 16px;
            border-bottom-right-radius: 16px;
           border-top-left-radius: 16px;
            border-top-right-radius: 16px;
           
        }

        .summary p {
            margin: 10px 0;
            font-size: 16px;
            
        }

        .summary .amount {
            font-size: 24px;
            font-weight: bold;
        }

        .summary .details {
            margin-top: 20px;
            text-align: left;
            font-size: 14px;
        }

        .summary .details p {
            margin: 5px 0;
            color: #eb603d;
            font-weight: bold;
        }

        .wallet-button {
            background-color: #32ad34;
            color: white;
          width:100%;
          border:none;
            padding: 10px;
            display: block;
            text-decoration: none;
             border-radius: 16px;
           
            font-size: 18px;
        }

        .wallet-button:hover {
            background-color: #00C853;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <i class="fas fa-check-circle"></i>
            <h2>Recharge Placed</h2>
            <p>Your <span style="color: aqua;font-weight: bold"><?php echo $c; ?></span> SIM was successfully Ordered.</p>
        </div>
        <div class="summary">
            <p><i class="fas fa-wallet"></i> Amount paid using UP account</p>
            <p class="amount"><span style="color:#2f9431 ;font-weight: bold"><?php echo $amount; ?>৳</p>
            <div class="details">
              <p>Account Name: <span style="color: black;font-weight: normal"><?php echo $name; ?></span></p>
                <p>phone number: <span style="color: black;font-weight: normal"><?php echo $mobile; ?></span></p>
                <p>Bonus: <span style="color: black;font-weight: normal"><?php echo $bc; ?></span></p>
                <p style="color:black" id="date"></p>
            </div>
        </div>
        <button onclick="toPDF()"class="wallet-button">Save</button>
    </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
  function toPDF() {
  const name = "<?php echo $name; ?>"; // Assuming you've already collected the amount in PHP
  html2pdf()
    .set({ filename: name + dateS +"invoice" })
    .from(document.body)
    .save();
}

    // Create a new Date object
    var today = new Date();

    // Get the day, month, and year
    var day = today.getDate();
    var month = today.toLocaleString('default', { month: 'long' }); // Months are zero-based
    var year = today.getFullYear();

    // Format the date as a string
    var dateString = 'Date: '+ day + ' ' + month + ' ' + year;
var dateS = day + "-" + month;

    // Display the date in the HTML element with id "date"
    document.getElementById("date").innerHTML = dateString;
</script>
</body>
</html>
<?php
} else {
    // If the form was not submitted, redirect to the form page
    header("Location: form.html");
    exit();
}
?>