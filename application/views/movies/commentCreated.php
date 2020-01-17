<form action="/movies/comment/" method="post">
    <input class="hidden" type="input" name="user_id">
    <input class="hidden" type="input" name="movie_id">

    <div class="form-group">
      <textarea class="form-control" name="comment_text"></textarea>
    </div>
</form>

<?php redirect($this->session->flashdata('redirect')); ?>