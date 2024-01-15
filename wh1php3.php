<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حساب المجموع</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
            background-color: #f4f4f4;
        }

        h2 {
            color: #333;
        }

        #gradeForm {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        #result {
            margin-top: 20px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>

<h2>حساب المجموع</h2>

<?php
class GradeCalculator {
    public $subject;
    public $test1;
    public $test2;
    public $finalExam;
    public $total;
    public $grade;

    public function __construct($subject, $test1, $test2, $finalExam) {
        $this->subject = $subject;
        $this->test1 = floatval($test1);
        $this->test2 = floatval($test2);
        $this->finalExam = floatval($finalExam);
    }

    public function calculateTotal() {
        $this->total = $this->test1 + $this->test2 + $this->finalExam;
    }

    public function calculateGrade() {
        if ($this->total >= 90) {
            $this->grade = "A";
        } else if ($this->total >= 80) {
            $this->grade = "B";
        } else if ($this->total >= 70) {
            $this->grade = "C";
        } else if ($this->total >= 60) {
            $this->grade = "D";
        } else {
            $this->grade = "F";
        }
    }

    public function displayResult() {
        echo "اسم {$this->subject}: <br>المجموع: {$this->total} <br>التقدير: {$this->grade}";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $subject = $_POST['subject'];
    $test1 = $_POST['test1'];
    $test2 = $_POST['test2'];
    $finalExam = $_POST['finalExam'];

    
    $calculator = new GradeCalculator($subject, $test1, $test2, $finalExam);

  
    $calculator->calculateTotal();
    $calculator->calculateGrade();

    $calculator->displayResult();
}?>

<div id="gradeForm">
    <form action="" method="post">
        <label for="subject">اسم المادة:</label>
        <input type="text" name="subject">

        <label for="test1">درجة الاختبار الأول:</label>
        <input type="text" name="test1">

        <label for="test2">درجة الاختبار الثاني:</label>
        <input type="text" name="test2">

        <label for="finalExam">درجة الاختبار النهائي:</label>
        <input type="text" name="finalExam">

        <button type="submit">احسب المجموع</button>
    </form>
</div>

</body>
</html>
