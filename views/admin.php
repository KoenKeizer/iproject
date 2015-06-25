<div id="imageWrapper">
  <!-- <div class="input-form">
    <form id="homepage">
      <input type="text" name="title">
      <textarea name="content" form="homepage"></textarea>
    </form>
  </div> -->
    <div class="formfield">
      <form id="homepage" action="views/insert.php" method="POST">
        <label>Title</label><br>
        <input type="text" name="title"><br><br>
        <label>Content</label><br>
        <textarea name="content" form="homepage"></textarea><br><br>
        <input type="submit" name="submit" value="Post">
      </form>
    </div>
</div>