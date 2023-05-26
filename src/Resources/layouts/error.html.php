<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<h1>Ошибка</h1>
<div>
    <div><?php echo $this->code ?: '' ?></div>
    <div><?php echo $this->message ?></div>
    <pre><?php echo json_encode($this->errorData, JSON_PRETTY_PRINT) ?></pre>
</div>
</body>
</html>