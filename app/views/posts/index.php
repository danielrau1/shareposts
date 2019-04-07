<?php require APPROOT.'\views\inc\navbar.php'; ?>

<h1>Posts</h1>
<h3>Hi <?php echo  $_SESSION['user_name']; ?></h3>
<a href="<?php echo URLROOT; ?>/posts/add" >Add Post</a>

<?php foreach($data['posts'] as $post): ?>
    <h4><?php echo $post->title; ?></h4>
<div>
    Written by <?php echo $post->name; ?> on <?php echo $post->postCreated; ?>
</div>
<p><?php echo $post->bodt ?></p>
<a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>">More</a>

    <?php endforeach;?>
