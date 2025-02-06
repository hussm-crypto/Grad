<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إيصال دفع</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .receipt {
            background: #fff;
            border: 2px solid #d2f0ea;
            border-radius: 15px;
            padding: 25px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            font-size: 18px;
        }

        h1 {
            font-size: 26px;
            color: #34495e;
            margin-bottom: 20px;
            font-weight: bold;
        }

        p {
            font-size: 18px;
            color: #2c3e50;
            margin: 10px 0;
        }

        .receipt .label {
            font-weight: bold;
            color: #2980b9;
            text-align: right;
        }

        .receipt .value {
            color: #7f8c8d;
            text-align: left;
            margin-bottom: 10px;
        }

        .btn {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 18px;
            background: #3dc1d3;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: #34a8b6;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .receipt {
                width: 90%;
            }
        }
    </style>
    <script>
        function printReceipt() {
            window.print();
        }
    </script>
</head>
<body>
    <div class="receipt">
        <h1>إيصال دفع</h1>
        <p class="label">اسم الطالب:</p>
        <p class="value"><?= htmlspecialchars($_GET['fullName']); ?></p>

        <p class="label">اللقب:</p>
        <p class="value"><?= htmlspecialchars($_GET['title']); ?></p>

        <p class="label">الكلية:</p>
        <p class="value"><?= htmlspecialchars($_GET['college']); ?></p>

        <p class="label">القسم:</p>
        <p class="value"><?= htmlspecialchars($_GET['department']); ?></p>

        <p class="label">الرسوم:</p>
        <p class="value"><?= htmlspecialchars($_GET['fees']); ?> د.ع</p>

        <p class="label">تاريخ تقديم الطلب:</p>
        <p class="value"><?= htmlspecialchars($_GET['submissionDate']); ?></p>

        <p class="label">البريد الإلكتروني:</p>
        <p class="value"><?= htmlspecialchars($_GET['email']); ?></p>

        <p class="label">رقم الموحدة:</p>
        <p class="value"><?= htmlspecialchars($_GET['unifiedNumber']); ?></p>

        <p class="label">تاريخ إصدار الموحدة:</p>
        <p class="value"><?= htmlspecialchars($_GET['unifiedIssueDate']); ?></p>

        <button class="btn" onclick="printReceipt()">طباعة</button>
    </div>
</body>
</html>
