<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="<?= base_url('adminprocess') ?>" method="post">
    
        <label for="username">Username</label>
        <input type="text" name="username" value="<?= set_value('username'); ?>">
        <?php echo form_error('username'); ?>
        <label for="password">Password</label>
        <input type="password" name="password" value="<?= set_value('password'); ?>">
        <?php echo form_error('password'); ?>
        <button type="submit" name="submit">Simpan</button>
    
    </form>
</body>
</html>