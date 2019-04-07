<?php require APPROOT.'\views\inc\navbar.php'; ?>

<h1>The ADD POST page</h1>

<a href="<?php echo URLROOT; ?>/posts/" >BACK</a>

<form action = "<?php echo URLROOT; ?>/posts/add" method="post">

    Title <input type="text" name="title" value="<?php echo $data['title']; ?>"><br>
    <span style="color:red"><?php echo $data['title_err']; ?></span><br>

    BODY <textarea name="bodt"><?php echo $data['bodt']; ?></textarea><br>
    <span style="color:red"><?php echo $data['bodt_err']; ?></span><br>

    <input type="submit"  >

</form>
