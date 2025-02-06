<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>التقديم على وثيقة</title>
    <style>
        @font-face {
            font-family: 'Sakkal';
            src: url('https://fonts.cdnfonts.com/s/740/SakkalMajalla.woff') format('woff');
        }

        body {
            font-family: 'Sakkal', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #98d8e3, #c9e8b4);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 600px;
            padding: 25px;
            border: 2px solid #d2f0ea;
        }

        h1 {
            color: #4b6584;
            margin-bottom: 20px;
            font-size: 24px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        label {
            flex: 1;
            text-align: right;
            padding: 10px;
            background: #f0f8f7;
            border: 1px solid #b5e0d9;
            border-radius: 8px;
            font-size: 18px;
            color: #34495e;
        }

        input {
            flex: 2;
            padding: 12px;
            border: 1px solid #b5e0d9;
            border-radius: 8px;
            font-size: 18px;
            transition: all 0.3s ease;
        }

        input:focus {
            border-color: #82ccdd;
            box-shadow: 0 0 8px rgba(130, 204, 221, 0.5);
            outline: none;
        }

        button {
            background: #3dc1d3;
            color: white;
            border: none;
            padding: 15px;
            font-size: 18px;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background: #34a8b6;
            transform: scale(1.05);
        }

        .message {
            margin-top: 15px;
            font-size: 16px;
            color: green;
        }

        .error {
            color: red;
        }

        @media (max-width: 768px) {
            .form-group {
                flex-direction: column;
            }
        }
    </style>
    <script>
        function confirmSubmission(event) {
            const confirmation = confirm("هل أنت متأكد من إرسال الطلب؟");
            if (!confirmation) {
                event.preventDefault();
            }
        }

        // وظيفة لتقييد الإدخال للحروف الإنجليزية والأرقام فقط
        function restrictToEnglishAndNumbers(event) {
            const regex = /^[a-zA-Z0-9\s]*$/; // يسمح بالأحرف الإنجليزية، الأرقام، والمسافات
            const input = event.target;
            if (!regex.test(input.value)) {
                input.value = input.value.replace(/[^a-zA-Z0-9\s]/g, ""); // إزالة الأحرف غير المسموح بها
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>نموذج التقديم على وثيقة</h1>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "document_application";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("<p class='message error'>فشل الاتصال بقاعدة البيانات: " . $conn->connect_error . "</p>");
            }

            $fullName = $_POST['fullName'];
            $title = $_POST['title'];
            $college = $_POST['college'];
            $department = $_POST['department'];
            $fees = $_POST['fees'];
            $submissionDate = $_POST['submissionDate'];
            $email = $_POST['email'];
            $unifiedNumber = $_POST['unifiedNumber'];
            $unifiedIssueDate = $_POST['unifiedIssueDate'];

            $sql = "INSERT INTO applications (full_name, title, college, department, fees, submission_date, email, unified_number, unified_issue_date)
                    VALUES ('$fullName', '$title', '$college', '$department', $fees, '$submissionDate', '$email', '$unifiedNumber', '$unifiedIssueDate')";

            if ($conn->query($sql) === TRUE) {
                header("Location: receipt.php?fullName=$fullName&title=$title&college=$college&department=$department&fees=$fees&submissionDate=$submissionDate&email=$email&unifiedNumber=$unifiedNumber&unifiedIssueDate=$unifiedIssueDate");
                exit();
            } else {
                echo "<p class='message error'>خطأ: " . $sql . "<br>" . $conn->error . "</p>";
            }

            $conn->close();
        }
        ?>
        <form action="" method="POST" onsubmit="confirmSubmission(event)">
            <div class="form-group">
                <label for="fullName">اسم الطالب الرباعي</label>
                <input type="text" id="fullName" name="fullName" oninput="restrictToEnglishAndNumbers(event)" required>
            </div>
            <div class="form-group">
                <label for="title">اللقب</label>
                <input type="text" id="title" name="title" oninput="restrictToEnglishAndNumbers(event)" required>
            </div>
            <div class="form-group">
                <label for="college">الكلية</label>
                <input type="text" id="college" name="college" oninput="restrictToEnglishAndNumbers(event)" required>
            </div>
            <div class="form-group">
                <label for="department">القسم</label>
                <input type="text" id="department" name="department" oninput="restrictToEnglishAndNumbers(event)" required>
            </div>
            <div class="form-group">
                <label for="fees">الرسوم</label>
                <input type="number" id="fees" name="fees" required>
            </div>
            <div class="form-group">
                <label for="submissionDate">تاريخ تقديم الطلب</label>
                <input type="date" id="submissionDate" name="submissionDate" required>
            </div>
            <div class="form-group">
                <label for="email">البريد الإلكتروني</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="unifiedNumber">رقم الموحدة</label>
                <input type="text" id="unifiedNumber" name="unifiedNumber" oninput="restrictToEnglishAndNumbers(event)" required>
            </div>
            <div class="form-group">
                <label for="unifiedIssueDate">تاريخ إصدار الموحدة</label>
                <input type="date" id="unifiedIssueDate" name="unifiedIssueDate">
            </div>
            <button type="submit">إرسال الطلب</button>
        </form>
    </div>
</body>
</html>
